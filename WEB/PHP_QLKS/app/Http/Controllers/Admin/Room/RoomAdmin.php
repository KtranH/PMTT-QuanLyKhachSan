<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoomAdmin extends Controller
{
    //
    public function roomadmin()
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $room = DB::select("SELECT * FROM phong INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP");
            $category = DB::select("SELECT * FROM loaiphong");
            return view("Admin.Room.roomAdmin",compact("room","category"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function addmoreroom(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $category = $request->input("category");
            $roomname = $request->input("roomname");
            $location = $request->input("location");
            try
            {
                $insertRoom = DB::insert("INSERT INTO phong (MAPHONG, TENPHONG, TRANGTHAI, MALP, VITRI) VALUES (?,?,?,?,?)",[$location.$category,$roomname,0,$category,$location]);
                return redirect()->route("roomAdmin");
            }
            catch(Exception $e)
            {
                Session::flash("erroraddmoreroom","Đã có lỗi không thể thêm!");
                return redirect()->route("roomAdmin");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function updateroom(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idroom = $request->input("idroom");
            $selectRoom = DB::select("SELECT * FROM phong WHERE MAPHONG =?",[$idroom]);
            $category = DB::select("SELECT * FROM loaiphong");
            return view("Admin.Room.updateRoomAdmin",compact("selectRoom","idroom","category"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function finupdateroom(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idroom = $request->input("idroom");
            $category = $request->input("category");
            $roomname = $request->input("roomname");
            $location = $request->input("location");
            try
            {
                $updateRoom = DB::update("UPDATE phong SET TENPHONG = ?, MALP = ?, VITRI = ? WHERE MAPHONG = ?",[$roomname,$category,$location,$idroom]);
                return redirect()->route("roomAdmin");
            }
            catch(Exception $e)
            {
                Session::flash("errorupdateroom","Đã có lỗi không thể chỉnh sửa!");
                return redirect()->route("updateroom");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function deleteroomorrecoveryroom(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
             $check = $request->input("check");
             $idroom = $request->input("idroom");
             if($check == "true")
             {
                $recovery = DB::update("UPDATE phong SET TRANGTHAI = 0 WHERE MAPHONG = ?",[$idroom]);
                return redirect()->route("roomAdmin");
             }
             else
             {
                $delete = DB::update("UPDATE phong SET TRANGTHAI = 3 WHERE MAPHONG = ?",[$idroom]);
                return redirect()->route("roomAdmin");
             }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
