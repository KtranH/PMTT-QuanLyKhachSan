<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class informationAdmin extends Controller
{
    //
    public function informationadmin()
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $occlusive = DB::select("SELECT * FROM khachhang WHERE LUUTRU = ?",["YES"]);
            $account = DB::select("SELECT * FROM khachhang WHERE EMAIL IS NOT NULL");
            $subcription = DB::select("SELECT * FROM phieudangky INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP");
            $reception = DB::select("SELECT * FROM hoadon WHERE NGAYLAP IS NOT NULL");
            return view("Admin.Information.informationAdmin",compact("occlusive","account","subcription","reception"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function unlockorlockaccountkh(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idkh = $request->input("idkh");
            $check = $request->input("check");
            if($check == "true")
            {
                $updatekh = DB::update("UPDATE khachhang set DIEMTINNHIEM = 100, ISDELETE = 1 WHERE MAKH = ?",[$idkh]);
                return redirect()->route("informationadmin");
            }
            else
            {
                $updatekh = DB::update("UPDATE khachhang set DIEMTINNHIEM = 0, ISDELETE = 0 WHERE MAKH = ?",[$idkh]);
                Cookie::queue(Cookie::forget('remember'));
                Cookie::queue(Cookie::forget('remember_notSave'));
                Cookie::queue(Cookie::forget('remember_google'));
                return redirect()->route("informationadmin");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
