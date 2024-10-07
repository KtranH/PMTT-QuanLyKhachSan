<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginAdmin extends Controller
{
    //
    public function loginadmin()
    {
        return view("Admin.Account.loginAdmin");
    }
    public function authAdmin(Request $request)
    {
         // Xác thực đăng nhập
         $user = $request->input("username");
         $password = $request->input("password");
         try
         {
            $now = new DateTime();
            $DateN = $now->format('Y-m-d');
            $checkPDK = DB::select("SELECT * FROM phieudangky");
            foreach($checkPDK as $x)
            {
                $checkDate = new DateTime($x->NGAYDAT);
                if($DateN > $checkDate)
                {
                    $selectroom = DB::select("SELECT * FROM phieudangky WHERE MAPHIEU =?",["$x->MAPHIEU"]);
                    $updateDelete = DB::update("UPDATE phieudangky SET TINHTRANG = ?, TT_NHANPHONG = ? WHERE MAPHIEU = ?",["Đã hủy","Đã hủy",$x->MAPHIEU]);
                    $updateRoom = DB::update("UPDATE phong set TRANGTHAI = 0 WHERE MAPHONG = ?",[$selectroom[0]->MAPHONG]);
                    $selectKH = DB::select("SELECT * FROM phieudangky INNER JOIN chitiet_phieudangky ON chitiet_phieudangky.MAPHIEU = phieudangky.MAPHIEU");
                    $updatekh = DB::update("UPDATE khachhang SET DIEMTINNHIEM = DIEMTINNHIEM - 20 WHERE MAKH = ?",[$selectKH[0]->MAKH]);
                }
            }
            $checkUser = DB::select("SELECT * FROM nhanvien WHERE EMAIL = ?", [$user]);
            $pass = $checkUser[0]->PASSWORD;
            if($checkUser && Hash::check($password, $pass))
            {
                if($checkUser[0]->ISDELETE == 0)
                {
                    return view("User.Account.lockaccount");
                }
                $cookieValue = json_encode([ 
                    "user" => $user,
                    "password" => $password,
                ]);
                Session::flash("pass",$password);
                $cookie = Cookie::make('accountadmin', $cookieValue, 0);
                return redirect()->route("homeAdmin")->withCookie($cookie);
            }
            else
            {
                Session::flash('errorAdmin', 'Bạn đã nhập sai email hoặc sai mật khẩu!');
                return redirect()->route("loginadmin");
            }
         }
         catch(Exception $e)
         {
            Session::flash('errorAdmin', 'Bạn đã nhập sai email hoặc sai mật khẩu!');
            return redirect()->route("loginadmin");
         }
    }
    public function logoutAdmin()
    {
        // Xóa phiên đăng nhập
        Cookie::queue(Cookie::forget('accountadmin'));
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route("loginadmin");
    }
}
