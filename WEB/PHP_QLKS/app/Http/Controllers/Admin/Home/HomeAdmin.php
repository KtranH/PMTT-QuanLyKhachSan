<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeAdmin extends Controller
{
    //
    public function homeAdmin()
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $SelectPDK = DB::select("SELECT * FROM phieudangky INNER JOIN chitiet_phieudangky ON phieudangky.MAPHIEU = chitiet_phieudangky.MAPHIEU INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE TINHTRANG = ?",["Đặt trước"]);
            $selectRoom = DB::select("SELECT * FROM loaiphong");
            return view("Admin.Home.homeAdmin",compact("SelectPDK","selectRoom"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
