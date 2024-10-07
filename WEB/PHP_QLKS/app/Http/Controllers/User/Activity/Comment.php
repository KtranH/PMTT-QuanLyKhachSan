<?php

namespace App\Http\Controllers\User\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Comment extends Controller
{
    //
    public function comment()
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
            $checkUser = DB::select("SELECT * FROM danhgia INNER JOIN phieudangky ON danhgia.MAPHIEU = phieudangky.MAPHIEU INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE USERNAME = ? OR EMAIL = ?", [$takeName,$takeName]);
            $check = DB::select("SELECT danhgia.ISDELETE,MADG FROM danhgia INNER JOIN phieudangky ON danhgia.MAPHIEU = phieudangky.MAPHIEU INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE USERNAME = ? OR EMAIL = ?", [$takeName,$takeName]);
            $checkUser2 = DB::select("SELECT * FROM phieudangky INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE (USERNAME = ? OR EMAIL = ?) AND TT_NHANPHONG = ? AND phieudangky.ISDELETE = 1",[$takeName,$takeName,"Đã trả phòng"]);
            return view("User.Room.comment",compact("checkUser","checkUser2","check"));
        }
    }
    public function pushComment(Request $request)
    {
        $idkh = $request->input("idkh");
        $idphong = $request->input("idphong");
        $idphieu = $request->input("idphieu");
        $roomname = DB::select("SELECT * FROM phong INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE MAPHONG =?",[$idphong]);
        return view("User.Room.pushcmt",compact("idkh","idphong","roomname","idphieu"));
    }
    public function writeComment(Request $request)
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
            $idkh = $request->input("idkh");
            $star = $request->input("start");
            $content = $request->input("content");
            $currentTime = date('His');
            $updatepdk = DB::update("UPDATE phieudangky SET ISDELETE = 0 WHERE MAPHIEU =?",[$idphieu]);
            $comment = DB::insert("INSERT INTO danhgia (MADG,MAPHIEU,BINHLUAN,SOSAO,ISDELETE) VALUES (?,?,?,?,?)",[$currentTime.$idkh,$idphieu,$content,$star,1]);
            return redirect()->route("comment");
        }
    }
}
