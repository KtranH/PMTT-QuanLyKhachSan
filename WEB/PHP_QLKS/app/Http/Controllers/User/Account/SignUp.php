<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;

use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SignUp extends Controller
{
    //
    public function showSignUpForm()
    {
        return view("Account.signUp");
    }
    public function signup(Request $request)
    {
        try
        {
             // Nhận giá trị
            $name = $request->input('name');
            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');
            $phone = $request->input('phone');
            $cccd = $request->input('cccd');
            $year = date("Y");
                        
            // Thêm khách hàng vào database
            $sql = "INSERT INTO khachhang (MAKH,HOTEN,GIOITINH,NGAYSINH,DIACHI,SDT,EMAIL,PASSWORD,DIEMTINNHIEM,AVATAR,CCCD,USERNAME,GHICHU,ISDELETE, LUUTRU) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            DB::statement($sql, [$year + $phone, $name, "Chưa rõ", "2024-01-01", "Chưa rõ", $phone, $email, Hash::make($password), 100, "user.png", $cccd, $username, NULL,1, "NO"]);

            // Đăng ký thành công chuyển sang trang đăng nhập
            return redirect()->route("Formlogin");
            
        }
        catch(Exception $e)
        {
            $selectaccountexist = DB::select("SELECT * FROM khachhang WHERE CCCD = ? AND SDT = ? AND USERNAME IS NULL AND PASSWORD IS NULL AND EMAIL IS NULL",[$cccd,$phone]);
            if($selectaccountexist != null)
            {
                $update = DB::update("UPDATE khachhang SET HOTEN = ?, GIOITINH = ?, NGAYSINH = ?, DIACHI = ?, EMAIL = ?, PASSWORD = ?, DIEMTINNHIEM = ?, AVATAR = ?, USERNAME = ?, GHICHU = ?, ISDELETE = ? WHERE CCCD = ? AND SDT = ?",[$name,"Chưa rõ","2024-01-01","Chưa rõ", $email,Hash::make($password),100,"user.png",$username,NULL,1,$cccd,$phone]);
                // Đăng ký thành công chuyển sang trang đăng nhập
                return redirect()->route("Formlogin");
            }
            Session::flash('errorSignUp', 'Thông tin đã tồn tại!');
            return redirect()->route("FormSignUp");
        }
    }
}
