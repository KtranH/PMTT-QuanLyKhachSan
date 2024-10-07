<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReserveAdmin extends Controller
{
    //
    public function reserveAdmin()
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $selectPDKT = DB::select("SELECT * FROM phieudangky INNER JOIN phong on phieudangky.MAPHONG = phong.MAPHONG WHERE TINHTRANG = ?",["Đặt trước"]);
            $room = DB::select("SELECT * FROM phong INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE TRANGTHAI = ?",[0]);
            return view("Admin.Room.seserveAdmin",compact("selectPDKT","room"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function rentAdmin(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $DateR = $request->input("dater");
            $DateP = $request->input("datep");
            $roomname = $request->input("roomname");
            $room = DB::select("SELECT * FROM phong INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE MAPHONG = ?",[$roomname]);
            if($room == null)
            {
                Session::flash("errorRoomPDK","Mã phòng không khớp với bất kì phòng nào!");
                return redirect()->route("reserveAdmin");
            }
            $date1 = new DateTime($DateR);
            $date2 = new DateTime($DateP);
            $duration = 0;
            if($date1 >= $date2)
            {
                Session::flash("errorDayPDK","Ngày nhận và đặt phòng không hợp lệ!");
                return redirect()->route("reserveAdmin");
            }
        else
            {
                $cookie = request()->cookie('accountadmin');
                if($cookie)
                {
                    $takeName = "";
                    $data = json_decode($cookie, true);
                    $takeName = $data['user'];
                    $checkUser = DB::select("SELECT * FROM nhanvien WHERE EMAIL = ?",[$takeName]);
                }
                $currentTime = date('His');
                $timeDay = date_diff($date1,$date2);
                $duration = $timeDay->days;
                $sumPay = $duration * $room[0]->GIATHUE;
                $PDK = DB::insert("INSERT INTO phieudangky (MAPHIEU,MANV,MAPHONG,NGAYDAT,TINHTRANG,TRAPHONG,THANHTOAN,TT_NHANPHONG) VALUES (?,?,?,?,?,?,?,?)",["1111".$room[0]->MAPHONG.$currentTime,$checkUser[0]->MANV,$room[0]->MAPHONG,$DateR,"Đã xác nhận",$DateP,$sumPay,"Đang đợi"]);
                $updateRoom = DB::update("UPDATE phong set TRANGTHAI = 1 WHERE MAPHONG = ?",[$room[0]->MAPHONG]);
                $currentTime2 = date('His');
                Session::put("idphieu","1111".$room[0]->MAPHONG.$currentTime);
                return redirect()->route("ct_reserve");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
