<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class emloyee extends Controller
{
    //
    public function emloyeeAdmin()
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
                $employee = DB::select("SELECT * FROM nhanvien INNER JOIN nhomquyen ON nhanvien.MANHOM = nhomquyen.MANHOM INNER JOIN phanquyen ON nhomquyen.MAPHANQUYEN = phanquyen.MAPHANQUYEN");
                return view("Admin.Employee.employeeAdmin",compact("employee"));
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
    public function addmoreemloyee(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $fullname = $request->input("fullname");
            $birth = $request->input("birth");
            $phone = $request->input("phone");
            $address = $request->input("address");
            $position = $request->input("position");
            $email = $request->input("email");
            $pass = $request->input("pass");
            $gender = $request->input("gender");
            try
            {
                $insertEmloyee = DB::insert("INSERT INTO nhanvien (MANV, HOTEN, GIOITINH, NGAYSINH, DIACHI, SDT,EMAIL,PASSWORD,MANHOM,ISDELETE) VALUES (?,?,?,?,?,?,?,?,?,?)",["2024".$phone,$fullname,$gender,$birth,$address,$phone,$email,Hash::make($pass),$position,1]);
                return redirect()->route("emloyeeAdmin");
            }
            catch(Exception $e)
            {
                Session::flash("erroraddmoreemployee","Đã có lỗi không thể thêm!");
                return redirect()->route("emloyeeAdmin");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function updateemloyee(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idemployee = $request->input("idemployee");
            $selectEmloyee = DB::select("SELECT * FROM nhanvien WHERE MANV = ?",[$idemployee]);
            return view("Admin.Employee.updateemloyeeAdmin",compact("selectEmloyee","idemployee"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function finupdateemloyee(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idemployee = $request->input("idemployee");
            $fullname = $request->input("fullname");
            $birth = $request->input("birth");
            $phone = $request->input("phone");
            $address = $request->input("address");
            $position = $request->input("position");
            $email = $request->input("email");
            $gender = $request->input("gender");
            try
            {
                $updateEmloyee = DB::update("UPDATE nhanvien SET HOTEN = ?, GIOITINH = ?, NGAYSINH = ?, DIACHI = ?, SDT = ?,EMAIL = ?,MANHOM = ? WHERE MANV = ?",[$fullname,$gender,$birth,$address,$phone,$email,$position,$idemployee]);
                return redirect()->route("emloyeeAdmin");
            }
            catch(Exception $e)
            {
                Session::flash("errorupdateemployee","Đã có lỗi không thể chỉnh sửa!");
                return redirect()->route("updateemloyee");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function deleteroomorrecoveryemloyee(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
             $check = $request->input("check");
             $idemployee = $request->input("idemployee");
             if($check == "true")
             {
                $recovery = DB::update("UPDATE nhanvien SET ISDELETE = 1 WHERE MANV = ?",[$idemployee]);
                return redirect()->route("emloyeeAdmin");
             }
             else
             {
                $delete = DB::update("UPDATE nhanvien SET ISDELETE = 0 WHERE MANV = ?",[$idemployee]);
                return redirect()->route("emloyeeAdmin");
             }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
