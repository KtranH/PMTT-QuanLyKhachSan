<?php

namespace App\Http\Controllers\User\Activity;

use App\Http\Controllers\Controller;
use App\Mail\SendMail\RoomBookingConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;

class ConfirmPay extends Controller
{
    //
    public function confirmpay(Request $request)
    {
        $cookie = request()->cookie('remember');
        $cookie2 = request()->cookie('remember_notSave');
        $cookie3 = request()->cookie('remember_google');
        if(!$cookie && !$cookie2 && !$cookie3)
        {
            return redirect()->route("Formlogin");
        }
        else
        {
            $takeName = "";
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
            $checkUser = DB::select("SELECT * from khachhang WHERE EMAIL = ? OR USERNAME = ?",[$takeName,$takeName]);
            $idUser = $checkUser[0]->MAKH;
            $email = $checkUser[0]->EMAIL;
            $sumPay = $request->input("sumPay");
            $DateR = $request->input("dater");
            $DateP = $request->input("datep");
            $Idroom = $request->input("idroom");
            $currentTime = date('His');
            $room = DB::select("SELECT * FROM phong WHERE MALP = ? AND TRANGTHAI = 0 ORDER BY RAND() LIMIT 1",[$Idroom]);
            if($room != null)
            {
                $updateRoom = DB::update("UPDATE phong set TRANGTHAI = 1 WHERE MAPHONG = ?",[$room[0]->MAPHONG]);
                $PDK = DB::insert("INSERT INTO phieudangky (MAPHIEU,MANV,MAPHONG,NGAYDAT,TINHTRANG,TRAPHONG,THANHTOAN,TT_NHANPHONG) VALUES (?,?,?,?,?,?,?,?)",[$idUser.$Idroom.$currentTime,null,$room[0]->MAPHONG,$DateR,"Đặt trước",$DateP,$sumPay,"Đang đợi"]);
                $CT_PDK = DB::insert("INSERT INTO chitiet_phieudangky (MAPHIEU,MAKH) VALUES (?,?)",[$idUser.$Idroom.$currentTime,$idUser]);
                $data = DB::select("SELECT * FROM phieudangky INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE TINHTRANG = ? AND khachhang.MAKH = ? AND phieudangky.MAPHIEU = ?",["Đặt trước",$idUser,$idUser.$Idroom.$currentTime]);
                $pusher = new Pusher(
                    env('PUSHER_APP_KEY'),
                    env('PUSHER_APP_SECRET'),
                    env('PUSHER_APP_ID'),
                    [
                        'cluster' => env('PUSHER_APP_CLUSTER'),
                        'useTLS' => true,
                    ]
                );
                $pusher->trigger('data-channel', 'data-updated',  $data);

                // phần gửi email chỉ chạy nếu ngày nhận và trả phòng hợp lệ
                $details = [
                    'customerEmail' => $email,
                    'userName' => $checkUser[0]->HOTEN,
                    'checkInDate' => $DateR,
                    'checkOutDate' => $DateP,
                ];
                $mailableClass = new RoomBookingConfirmation($details);
                Mail::to($email)->send($mailableClass);
               
                return redirect()->route("reserve");
            }
            else
            {
                Session::flash("notfoundroom","Đã có lỗi xảy ra! Vui lòng thử lại.");
                return redirect()->route("overviewProduct",["idroom"=>$Idroom]);
            }
        }
    }
    public function confirmpaycart(Request $request)
    {
        $cookie = request()->cookie('remember');
        $cookie2 = request()->cookie('remember_notSave');
        $cookie3 = request()->cookie('remember_google');
        if(!$cookie && !$cookie2 && !$cookie3)
        {
            return redirect()->route("Formlogin");
        }
        else
        {
            $takeName = "";
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
            $sumPay = $request->input("sumPay");
            $DateR = $request->input("dater");
            $DateP = $request->input("datep");
            $checkUser = DB::select("SELECT MAKH from khachhang WHERE EMAIL = ? OR USERNAME = ?",[$takeName,$takeName]);
            $idUser = $checkUser[0]->MAKH;
            $selectcart = DB::select("SELECT * FROM giohang WHERE MAKH = ?",[$idUser]);
            foreach($selectcart as $item)
            {
                $currentTime = date('His');
                $room = DB::select("SELECT * FROM phong WHERE MALP = ? AND TRANGTHAI = 0 ORDER BY RAND() LIMIT 1",[$item->MALP]);
                $Idroom = $item->MALP;
                if($room != null)
                {
                    $updateRoom = DB::update("UPDATE phong set TRANGTHAI = 1 WHERE MAPHONG = ?",[$room[0]->MAPHONG]);
                    $PDK = DB::insert("INSERT INTO phieudangky (MAPHIEU,MANV,MAPHONG,NGAYDAT,TINHTRANG,TRAPHONG,THANHTOAN,TT_NHANPHONG) VALUES (?,?,?,?,?,?,?,?)",[$idUser.$Idroom.$currentTime,null,$room[0]->MAPHONG,$DateR,"Đặt trước",$DateP,$sumPay,"Đang đợi"]);
                    $CT_PDK = DB::insert("INSERT INTO chitiet_phieudangky (MAPHIEU,MAKH) VALUES (?,?)",[$idUser.$Idroom.$currentTime,$idUser]);
                    $data = DB::select("SELECT * FROM phieudangky INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE TINHTRANG = ? AND khachhang.MAKH = ? AND phieudangky.MAPHIEU = ?",["Đặt trước",$idUser,$idUser.$Idroom.$currentTime]);
                    $pusher = new Pusher(
                        env('PUSHER_APP_KEY'),
                        env('PUSHER_APP_SECRET'),
                        env('PUSHER_APP_ID'),
                        [
                            'cluster' => env('PUSHER_APP_CLUSTER'),
                            'useTLS' => true,
                        ]
                    );
                    $pusher->trigger('data-channel', 'data-updated',  $data);
                }
                else
                {
                    $PDK = DB::insert("INSERT INTO phieudangky (MAPHIEU,MANV,MAPHONG,NGAYDAT,TINHTRANG,TRAPHONG,THANHTOAN,TT_NHANPHONG) VALUES (?,?,?,?,?,?,?,?)",[$idUser.$Idroom.$currentTime,null,"Hết phòng",$DateR,"Đã hủy",$DateP,0,"Đã hủy"]);
                    $CT_PDK = DB::insert("INSERT INTO chitiet_phieudangky (MAPHIEU,MAKH) VALUES (?,?)",[$idUser.$Idroom.$currentTime,$idUser]);
                }
            }
            $delete = DB::select("DELETE FROM giohang WHERE MAKH = ?",[$idUser]);
            return redirect()->route("reserve");
        }
    }
}
