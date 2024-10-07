<?php

namespace App\Http\Controllers\User\Activity;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Reserve extends Controller
{
    //
    public function reserve()
    {
        $takeName = "";
        $cookie = request()->cookie('remember');
        $cookie2 = request()->cookie('remember_notSave');
        $cookie3 = request()->cookie('remember_google');
        if ($cookie) {
            $data = json_decode($cookie, true);
            $takeName = $data['user'];
        }
        else if($cookie2)
        {
            $data = json_decode($cookie2, true);
            $takeName = $data['user'];
        }
        else if($cookie3)
        {
            $data = json_decode($cookie3, true);
            $takeName = $data['user'];
        }
        if($takeName == "")
        {
            return redirect()->route("Formlogin");
        }
        else
        {
            $checkUser = DB::select("SELECT * FROM phieudangky INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP INNER JOIN hoadon ON phieudangky.MAPHIEU = hoadon.MAPHIEU WHERE (USERNAME = ? OR EMAIL = ?) AND (TINHTRANG = ? OR TINHTRANG = ?)", [$takeName,$takeName,"Đã xác nhận","Đã hủy"]);
            $checkUser3 = DB::select("SELECT * FROM phieudangky INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE (USERNAME = ? OR EMAIL = ?) AND TINHTRANG = ?", [$takeName,$takeName,"Đã hủy"]);
            $checkUser2 = DB::select("SELECT * FROM phieudangky INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE (USERNAME = ? OR EMAIL = ?) AND phieudangky.TINHTRANG = ?", [$takeName,$takeName,"Đặt trước"]);
            return view("User.Room.reserveRoom",compact("checkUser","checkUser2","checkUser3"));
        }
    }
    public function cancel_seserve(Request $request)
    {
        $takeName = "";
        $cookie = request()->cookie('remember');
        $cookie2 = request()->cookie('remember_notSave');
        $cookie3 = request()->cookie('remember_google');
        if ($cookie) {
            $data = json_decode($cookie, true);
            $takeName = $data['user'];
        }
        else if($cookie2)
        {
            $data = json_decode($cookie2, true);
            $takeName = $data['user'];
        }
        else if($cookie3)
        {
            $data = json_decode($cookie3, true);
            $takeName = $data['user'];
        }
        if($takeName == "")
        {
            return redirect()->route("Formlogin");
        }
        else
        {
            $idphieu = $request->input("idphieu");
            $selectroom = DB::select("SELECT * FROM phieudangky WHERE MAPHIEU =?",["$idphieu"]);
            $now = new DateTime();
            $DateN = $now->format('Y-m-d');
            $DateR = $selectroom[0]->NGAYDAT;
            $Date1 = new DateTime($DateR);
            if($DateN == $Date1)
            {
                Session::flash("errorCancel","Đã quá thời gian hủy phòng! Không thể hủy");
                return redirect()->route("reserve");
            }
            $updateDelete = DB::update("UPDATE phieudangky SET TINHTRANG = ?, TT_NHANPHONG = ? WHERE MAPHIEU = ?",["Đã hủy","Đã hủy",$idphieu]);
            $updateRoom = DB::update("UPDATE phong set TRANGTHAI = 0 WHERE MAPHONG = ?",[$selectroom[0]->MAPHONG]);
            $updatekh = DB::update("UPDATE khachhang SET DIEMTINNHIEM = DIEMTINNHIEM - 20 WHERE EMAIL = ? OR USERNAME = ?",[$takeName,$takeName]);
            $selectkh = DB::select("SELECT * FROM khachhang WHERE EMAIL = ? OR USERNAME = ?",[$takeName,$takeName]);
            if($selectkh[0]->DIEMTINNHIEM < 20)
            {
                $deletekh = DB::update("UPDATE khachhang SET ISDELETE = 0 WHERE EMAIL = ? OR USERNAME = ?",[$takeName,$takeName]);
            }
            $customerName = $takeName ?? 'Khách hàng';
            $checkInDate = 'ngày check in';
            $checkOutDate = 'Ngày check out';


            $adminEmail = 'thuhanguyeen16122003@gmail.com';
            $userEmail = $selectkh[0]->EMAIL;

            Mail::send('User.Email.cancel_room_customer', [
                'customerName' => $customerName,
                'checkInDate' => $checkInDate,
                'checkOutDate' => $checkOutDate
            ], function ($message) use ($adminEmail, $userEmail, $customerName) {
                $message->from($userEmail, $customerName);
                $message->sender($userEmail, $customerName);
                $message->to($adminEmail, 'Admin');
                $message->subject('Hủy đặt phòng');
            });

            return redirect()->route("reserve");
        }
    }
}
