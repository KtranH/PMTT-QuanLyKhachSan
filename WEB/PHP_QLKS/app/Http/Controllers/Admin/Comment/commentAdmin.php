<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class commentAdmin extends Controller
{
    //
    public function commentadmin()
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $takeName = "";
            $data = json_decode($cookie, true);
            $takeName = $data['user'];
            $checkUser = DB::select("SELECT * FROM nhanvien INNER JOIN nhomquyen ON nhanvien.MANHOM = nhomquyen.MANHOM INNER JOIN phanquyen ON nhomquyen.MAPHANQUYEN = phanquyen.MAPHANQUYEN WHERE EMAIL = ?",[$takeName]);
            if($checkUser[0]->CHUCNANG == "Admin")
            {
                $commentsChecked = DB::select("SELECT * FROM danhgia INNER JOIN phieudangky ON danhgia.MAPHIEU = phieudangky.MAPHIEU INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN hoadon ON phieudangky.MAPHIEU = hoadon.MAPHIEU INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE danhgia.ISDELETE = 0");
                $check = DB::select("SELECT danhgia.ISDELETE,MADG FROM danhgia INNER JOIN phieudangky ON danhgia.MAPHIEU = phieudangky.MAPHIEU INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN hoadon ON phieudangky.MAPHIEU = hoadon.MAPHIEU INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE danhgia.ISDELETE = 0");
                $commentsNotChecked = DB::select("SELECT * FROM danhgia INNER JOIN phieudangky ON danhgia.MAPHIEU = phieudangky.MAPHIEU INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN hoadon ON phieudangky.MAPHIEU = hoadon.MAPHIEU INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE danhgia.ISDELETE = 1 OR danhgia.ISDELETE = 2");
                $checknot = DB::select("SELECT danhgia.ISDELETE,MADG FROM danhgia INNER JOIN phieudangky ON danhgia.MAPHIEU = phieudangky.MAPHIEU INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN hoadon ON phieudangky.MAPHIEU = hoadon.MAPHIEU INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE danhgia.ISDELETE = 1 OR danhgia.ISDELETE = 2");
                return view("Admin.Comment.commentAdmin",compact("commentsChecked","commentsNotChecked","check","checknot"));
            }
            else
            {
                return view("Admin.Room.refushAdmin");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function checkcomment(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $check = $request->input("check");
            $iddg = $request->input("iddg");
            if($check == "true")
            {
                $updatedg = DB::update("UPDATE danhgia SET ISDELETE = 0 WHERE MADG =?",[$iddg]);
            }
            else
            {
                $updatedg = DB::update("UPDATE danhgia SET ISDELETE = 2 WHERE MADG =?",[$iddg]);
            }
            return redirect()->route("commentadmin");
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
