<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class Login extends Controller
{
    public function authLogin($username, $passuser, $check)
    {
        try
        {
        // Lấy dữ liệu
        $user = $username;
        $password = $passuser;
            // Kiểm tra mật khẩu trước khi vào trang chủ
            $checkUser = DB::select("SELECT * FROM khachhang WHERE EMAIL = ? OR USERNAME = ?", [$user,$user]);
            $pass = $checkUser[0]->PASSWORD;
            if($checkUser && Hash::check($password, $pass))
            {
                if($checkUser[0]->ISDELETE == 0)
                {
                    return view("User.Account.lockaccount");
                }
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
                if($check == true)
                {
                    $cookieValue = json_encode([ 
                        "user" => $user,
                        "password" => $password,
                    ]);
                    Session::flash("pass",$password);
                    $cookie = Cookie::make('remember', $cookieValue, 3600 * 24 * 30);
                    return redirect()->route("home")->withCookie($cookie);
                }
                else
                {
                    $cookieValue = json_encode([ 
                        "user" => $user,
                        "password" => $password,
                    ]);
                    Session::flash("pass",$password);
                    $cookie = Cookie::make('remember_notSave', $cookieValue, 0);
                    return redirect()->route("home")->withCookie($cookie);
                }
            }
            else
            {
                // Thông báo lỗi nếu nhập sai mật khẩu hoặc email
                Session::flash('error', 'Bạn đã nhập sai tên tài khoản hoặc sai mật khẩu!');
                return redirect()->route("Formlogin");
            }
        }
        catch(Exception $e)
        {
            Session::flash('error', 'Bạn đã nhập sai email hoặc sai mật khẩu!');
            return redirect()->route("Formlogin");
        }
    }
    //
    public function showLoginForm()
    {
        // Kiểm tra cookie xem xét có đã đăng nhập chưa
        $cookie = request()->cookie('remember');
        $cookie2 = request()->cookie('remember_notSave');
        $cookie3 = request()->cookie('remember_google');
        if ($cookie) {
            return redirect()->route("home");
        }
        else if($cookie2)
        {
            return redirect()->route("home");
        }
        else if($cookie3)
        {
            return redirect()->route("home");
        }
        else
        {
            return view("Account.login");
        }
    }
    public function login(Request $request)
    {
        // Xác thực đăng nhập
        $user = $request->input("username");
        $password = $request->input("password");
        $check = false;
        if($request->has("remember"))
        {
            $check = true;
        }
        return $this->authLogin($user,$password,$check);
    }
    public function logout()
    {
        // Xóa phiên đăng nhập
        Cookie::queue(Cookie::forget('remember'));
        Cookie::queue(Cookie::forget('remember_notSave'));
        Cookie::queue(Cookie::forget('remember_google'));
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route("home");
    }
    public function loginByGoogle()
    {
        // báo lỗi with -> kệ
        //return Socialite::driver('google')->with(["prompt" => "select_account"])->redirect();
        return Socialite::driver('google')->redirect();
    }
    public function callBackGoogle()
    {
        try {
            // lấy dữ liệu từ google
            $user = Socialite::driver('google')->user();
            $email = $user->getEmail();
            $name = $user->getName();
            $username = $user->getName();
            $avatar = $user->getAvatar();
            
            // kiểm tra và tạo tài khoản từ google và database
            $checkUser = DB::select("SELECT * FROM khachhang WHERE EMAIL = ?",[$email]);
            if($checkUser != null)
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
                if($checkUser[0]->ISDELETE == 0)
                {
                    return view("User.Account.lockaccount");
                }
                $cookieValue = json_encode([ 
                    "user" => $username,
                    "password" => $email,
                ]);
                $sql = "UPDATE khachhang SET AVATAR = ? WHERE EMAIL = ?";
                DB::statement($sql,[$avatar,$email]);
                $cookie = Cookie::make('remember_google', $cookieValue, 3600 * 24 * 30);
                return redirect()->route("home")->withCookie($cookie);
            }
            else
            {
                $now = Carbon::now();
                $year = date("Y");
                $minute = $now->minute; // Lấy phút hiện tại
                $second = $now->second; // Lấy giây hiện tại
                $hour = $now->hour; // Lấy giờ hiện tại
                
                $sql = "INSERT INTO khachhang (MAKH,HOTEN,GIOITINH,NGAYSINH,DIACHI,SDT,EMAIL,PASSWORD,DIEMTINNHIEM,AVATAR,CCCD,USERNAME,GHICHU,ISDELETE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                DB::statement($sql, [$year.$hour.$minute.$second, $name, "Chưa rõ", "2024-01-01", "Chưa rõ", NULL, $email, Hash::make($email), 100, $avatar, "Chưa rõ", $username, NULL,1]);

                $cookieValue = json_encode([ 
                    "user" => $username,
                    "password" => $email,
                ]);

                $cookie = Cookie::make('remember_google', $cookieValue, 3600 * 24 * 30);
                return redirect()->route("home")->withCookie($cookie);
            }
        } catch (Exception $e) {
            return redirect()->route("Formlogin");
        }
    }
}
