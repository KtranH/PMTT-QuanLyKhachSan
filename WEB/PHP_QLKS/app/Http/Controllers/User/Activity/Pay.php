<?php

namespace App\Http\Controllers\User\Activity;

use App\Http\Controllers\Controller;
use App\Mail\SendMail\RoomBookingConfirmation;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Pay extends Controller
{
    //
    public function payment(Request $request)
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
            $pay = $request->input("sumPay");
            $more = 0;
            $takeName = "";
            $DateR = $request->input("DateR");
            $DateP = $request->input("DateP");
            $now = new DateTime();
            $DateN = $now->format('Y-m-d');
            $duration = 0;
            if($DateR && $DateP)
            {
                $date1 = new DateTime($DateR);
                $date2 = new DateTime($DateP);
                $date3 = new DateTime($DateN);
                if($date1 < $date2 && $date1 > $date3)
                {
                    $timeDay = date_diff($date1,$date2);
                    $duration = $timeDay->days;
                }
                else
                {
                    $DateR = null;
                    $DateP = null;
                }
            }
            $takeIdRoom = $request->input("takeIdRoom");
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
            if($checkUser[0]->SDT == null || $checkUser[0]->CCCD == "Chưa rõ")
            {
                Session::flash("updateaccount","Hãy cập nhật số điện thoại hoặc CCCD của bạn! trước khi đặt phòng.");
                return redirect()->route("overviewProduct",["idroom"=>$takeIdRoom]);
            }
            $idUser = $checkUser[0]->MAKH;
            $selectPay = DB::select("SELECT * FROM loaiphong WHERE MALP = ? AND ISDELETE = ?",[$takeIdRoom,1]);
            if($selectPay == null)
            {
                Session::flash("notfoundroom","Đã có lỗi xảy ra! Vui lòng thử lại.");
                return redirect()->route("overviewProduct",["idroom"=>$takeIdRoom]);
            }
            if($DateR == null || $DateP == null)
            {
                Session::flash("failDate","Ngày nhận phòng và trả phòng không hợp lệ.");
            }
            return view("User.Pay.pay",compact("selectPay","checkUser","duration","DateR","DateP","takeIdRoom","more","pay"));
        }
    }
    public function paymentCart(Request $request)
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
            $pay = $request->input("sumPay");
            $more = 1;
            $DateR = $request->input("DateR");
            $DateP = $request->input("DateP");
            $now = new DateTime();
            $DateN = $now->format('Y-m-d');
            $duration = 0;
            if($DateR && $DateP)
            {
                $date1 = new DateTime($DateR);
                $date2 = new DateTime($DateP);
                $date3 = new DateTime($DateN);
                if($date1 < $date2 && $date1 > $date3)
                {
                    $timeDay = date_diff($date1,$date2);
                    $duration = $timeDay->days;
                }
                else
                {
                    $DateR = null;
                    $DateP = null;
                }
            }
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
            if($checkUser[0]->SDT  == null || $checkUser[0]->CCCD == null)
            {
                Session::flash("updateaccountcart","Hãy cập nhật số điện thoại hoặc CCCD của bạn! trước khi đặt phòng.");
                return redirect()->route("cartUser");
            }
            $idUser = $checkUser[0]->MAKH;
            $selectPay = DB::select("SELECT * FROM giohang INNER JOIN loaiphong ON giohang.MALP = loaiphong.MALP WHERE ISDELETE = ? AND MAKH = ?",[1,$idUser]);
            if($selectPay == null)
            {
                Session::flash("notfoundroomcart","Đã có lỗi xảy ra! Vui lòng thử lại.");
                return redirect()->route("cartUser");
            }
            if($DateR == null || $DateP == null)
            {
                Session::flash("failDate","Ngày nhận phòng và trả phòng không hợp lệ.");
            }
            return view("User.Pay.pay",compact("selectPay","checkUser","duration","DateR","DateP","more","pay"));
        }
    }
}
