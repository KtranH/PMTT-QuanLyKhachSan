<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class serviceAdmin extends Controller
{
    //
    public function serviceadmin()
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $service = DB::select("SELECT * FROM dichvu");
            return view("Admin.Service.serviceAdmin",compact("service"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function addmoreservice(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $servicename = $request->input("servicename");
            $price = $request->input("price");
            $about = $request->input("about");
            $img = $request->input("image1");
            try
            {
                $insertService = DB::insert("INSERT INTO dichvu (MADV, TENDV, GIA, MOTA, HINHANH, ISDELETE) VALUES (?,?,?,?,?,?)",["TESTDV",$servicename,$price,$about,$img,1]);
                return redirect()->route("serviceadmin");
            }
            catch(Exception $e)
            {
                Session::flash("erroraddmoreservice","Đã có lỗi không thể thêm!");
                return redirect()->route("serviceadmin");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function updateservice(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idservice = $request->input("idservice");
            $selectService = DB::select("SELECT * FROM dichvu WHERE MADV = ?",[$idservice]);
            return view("Admin.Service.updateServiceAdmin",compact("selectService","idservice"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function finupdateservice(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idservice = $request->input("idservice");
            $servicename = $request->input("servicename");
            $price = $request->input("price");
            $about = $request->input("about");
            $img = $request->input("image1");
            try
            {
                $updateService = DB::update("UPDATE dichvu SET TENDV = ?, GIA = ?, MOTA = ?, HINHANH = ? WHERE MADV = ?",[$servicename,$price,$about,$img,$idservice]);
                return redirect()->route("serviceadmin");
            }
            catch(Exception $e)
            {
                dd($e);
                Session::flash("errorupdateservice","Đã có lỗi không thể chỉnh sửa!");
                return redirect()->route("updateservice");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function deleteroomorrecoveryservice(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
             $check = $request->input("check");
             $idservice = $request->input("idservice");
             if($check == "true")
             {
                $recovery = DB::update("UPDATE dichvu SET ISDELETE = 1 WHERE MADV = ?",[$idservice]);
                return redirect()->route("serviceadmin");
             }
             else
             {
                $delete = DB::update("UPDATE dichvu SET ISDELETE = 0 WHERE MADV = ?",[$idservice]);
                return redirect()->route("serviceadmin");
             }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
