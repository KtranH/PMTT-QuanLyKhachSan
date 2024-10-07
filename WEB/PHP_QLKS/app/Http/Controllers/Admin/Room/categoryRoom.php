<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class categoryRoom extends Controller
{
    //
    public function categoryAdmin()
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $category = DB::select("SELECT * FROM loaiphong");
            return view("Admin.Room.categoryAdmin",compact("category"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function addmorecate(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $namecategory = $request->input("namecategory");
            $capacity = $request->input("capacity");
            $area = $request->input("area");
            $price = $request->input("price");
            $service = $request->input("service");
            $interior = $request->input("interior");
            $regulations = $request->input("regulations");
            $about = $request->input("about");
            $img1 = $request->input("image1");
            $img2 = $request->input("image2");
            try
            {
                $img = $img1."|".$img2;
                $insert = DB::insert("INSERT INTO loaiphong (MALP,TENLOAIPHONG,MOTA,SUCCHUA,SOLUONG,ANH,GIATHUE,DIENTICH,TIENICH,NOITHAT,QUYDINH,ISDELETE) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",["TESTNEW",$namecategory,$about,$capacity,0,$img,$price,$area,$service,$interior,$regulations,1]);
                return redirect()->route("categoryAdmin");
            }
            catch(Exception $e)
            {
                Session::flash("erroraddmorecate","Đã có lỗi không thể thêm!");
                return redirect()->route("categoryAdmin");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function updatecate(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idcate = $request->input("idcate");
            $selectcate = DB::select("SELECT * FROM loaiphong WHERE MALP = ?",[$idcate]);
            $img = explode("|",$selectcate[0]->ANH);
            $img1 = $img[0];
            $img2 = $img[1];
            return view("Admin.Room.addmoreCateAdmin",compact("selectcate","img1","img2","idcate"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function finupdatecate(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idcate = $request->input("idcate");
            $namecategory = $request->input("namecategory");
            $capacity = $request->input("capacity");
            $area = $request->input("area");
            $price = $request->input("price");
            $service = $request->input("service");
            $interior = $request->input("interior");
            $regulations = $request->input("regulations");
            $about = $request->input("about");
            $img1 = $request->input("image1");
            $img2 = $request->input("image2");
            try
            {
                $img = $img1."|".$img2;
                $updatecate = DB::update("UPDATE loaiphong SET TENLOAIPHONG = ?, MOTA = ?,SUCCHUA = ?,ANH = ?,GIATHUE = ?,DIENTICH = ?,TIENICH = ?,NOITHAT = ?,QUYDINH = ? WHERE MALP = ?",[$namecategory,$about,$capacity,$img,$price,$area,$service,$interior,$regulations,$idcate]);
                return redirect()->route("categoryAdmin");
            }
            catch(Exception $e)
            {
                Session::flash("errorupdatecate","Đã có lỗi không thể chỉnh sửa!");
                return redirect()->route("updatecate",["idcate" => $idcate]);
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function deletecateorrecoverycate (Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
             $check = $request->input("check");
             $idcate = $request->input("idcate");
             if($check == "true")
             {
                $recovery = DB::update("UPDATE loaiphong SET ISDELETE = 1 WHERE MALP = ?",[$idcate]);
                $updateroom = DB::update("UPDATE phong SET TRANGTHAI = 0 WHERE MALP = ? AND TRANGTHAI != 1",["$idcate"]);
                return redirect()->route("categoryAdmin");
             }
             else
             {
                $delete = DB::update("UPDATE loaiphong SET ISDELETE = 0 WHERE MALP = ?",[$idcate]);
                return redirect()->route("categoryAdmin");
             }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
