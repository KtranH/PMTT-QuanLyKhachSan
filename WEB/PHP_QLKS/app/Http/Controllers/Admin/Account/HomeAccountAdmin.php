<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeAccountAdmin extends Controller
{
    //
    public function homeaccountadmin()
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $takeName = "";
            $data = json_decode($cookie, true);
            $takeName = $data['user'];
            $checkUser = DB::select("SELECT * FROM nhanvien INNER JOIN nhomquyen ON nhanvien.MANHOM = nhomquyen.MANHOM INNER JOIN phanquyen ON nhomquyen.MAPHANQUYEN = phanquyen.MAPHANQUYEN WHERE EMAIL = ?",[$takeName]);
            return view("Admin.Account.homeaccountAdmin",compact("checkUser"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function updateaccountadmin(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $fullname = $request->input("fullName");
            $address = $request->input("address");
            $phone = $request->input("phone");
            $email = $request->input("email");
            $birthday = $request->input("birthday");
            $gender = $request->input("gender");
            if($gender == "Chưa rõ")
            {
                Session::flash("errorgender","Giới tính không hợp lệ");
                return redirect()->route("homeaccountadmin");
            }
            else
            {
                try
                {
                    $takeName = "";
                    $data = json_decode($cookie, true);
                    $takeName = $data['user'];
                    $update = DB::update("UPDATE nhanvien SET HOTEN = ?, GIOITINH = ?, NGAYSINH = ?, DIACHI =?, SDT = ?, EMAIL = ? WHERE EMAIL = ?",[$fullname,$gender,$birthday,$address,$phone,$email,$takeName]);
                    return redirect()->route("homeaccountadmin");
                }
                catch(Exception $e)
                {
                    Session::flash("errorupdateaccount","Email hoặc số điện thoại đã tồn tại!");
                    return redirect()->route("homeaccountadmin");
                }
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function updateaccountadminpass(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            try
            {
                $takeName = "";
                $data = json_decode($cookie, true);
                $takeName = $data['user'];
                $pass = $request->input("password");
                $newPass = $request->input("newpassword");
                $reNewPass = $request->input("renewpassword");
                $checkUser = DB::select("SELECT * FROM nhanvien WHERE EMAIL = ?",[$takeName]);
                $password = $checkUser[0]->PASSWORD;
                if(Hash::check($pass,$password))
                {
                    if($newPass != $reNewPass)
                    {
                        Session::flash("errorNewPass","Mật khẩu không trùng khớp!");
                        return redirect()->route("homeaccountadmin");
                    }
                    else
                    {
                        $update = DB::update("UPDATE nhanvien SET PASSWORD = ? WHERE EMAIL = ?",[Hash::make($newPass),$takeName]);
                        return redirect()->route("homeaccountadmin");
                    }
                }
                else
                {
                    Session::flash("errorPass","Mật khẩu không đúng!");
                    return redirect()->route("homeaccountadmin");
                }
            }
            catch(Exception $e)
            {
                Session::flash("errorPass","Mật khẩu không đúng!");
                return redirect()->route("homeaccountadmin");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
