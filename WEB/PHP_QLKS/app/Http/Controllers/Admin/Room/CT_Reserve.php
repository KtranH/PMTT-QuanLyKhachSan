<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use App\Mail\SendMail\BookingSuccessfull;
use App\Mail\SendMail\Cancel_Room_Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\select;

class CT_Reserve extends Controller
{
    // 
    public function ct_pdkdt(Request $request)
    { 
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idPhieu = $request->input("idphieuurl");
            if($idPhieu != null)
            {
                Session::put("idphieu",$idPhieu);
            }
            else
            {
                $idPhieu = Session::get("idphieu");
            }
            $phieu = DB::select("SELECT * FROM phieudangky INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE MAPHIEU = ?",[$idPhieu]);
            $makh = $request->input("makh");
            if($makh != null)
            {
                $kh = DB::select("SELECT * FROM khachhang WHERE CCCD = ?",[$makh]);
                $ct = DB::select("SELECT * FROM chitiet_phieudangky INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE MAPHIEU = ?",[$idPhieu]);
                return view("Admin.Room.ct_seserve",compact("kh","ct","phieu"));
            }
            else
            {
                $kh = DB::select("SELECT * FROM khachhang WHERE CCCD = ?",["none"]);
                $ct = DB::select("SELECT * FROM chitiet_phieudangky INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE MAPHIEU = ?",[$idPhieu]);
                return view("Admin.Room.ct_seserve",compact("kh","ct","phieu"));
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function ct_reserve(Request $request)
    { 
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $takeID = $request->input("idphieuurl");
            $t = $request->input("tt");
            if($takeID != null)
            {
                Session::put("idphieu",$takeID);
            }
            $idPhieu = Session::get("idphieu");
            if($t == "Đặt trước")
            {
                return redirect()->route("ct_pdkdt");
            }
            $phieu = DB::select("SELECT * FROM phieudangky INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE MAPHIEU = ?",[$idPhieu]);
            $makh = $request->input("makh");
            if($makh != null)
            {
                $kh = DB::select("SELECT * FROM khachhang WHERE CCCD = ?",[$makh]);
                $ct = DB::select("SELECT * FROM chitiet_phieudangky INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE MAPHIEU = ?",[$idPhieu]);
                return view("Admin.Room.ct_room",compact("kh","ct","phieu"));
            }
            else
            {
                $kh = DB::select("SELECT * FROM khachhang WHERE CCCD = ?",["none"]);
                $ct = DB::select("SELECT * FROM chitiet_phieudangky INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE MAPHIEU = ?",[$idPhieu]);
                return view("Admin.Room.ct_room",compact("kh","ct","phieu"));
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function addkh(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $dt = $request->input("dt");
            $makh = $request->input("makh");
            $idPhieu = request()->cookie('idphieu');  
            if($idPhieu == null)
            {
                $idPhieu = Session::get("idphieu");
            }     
            $checkSL = DB::select("SELECT * FROM phieudangky INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE MAPHIEU = ?",[$idPhieu]);
            $sl = $checkSL[0]->SUCCHUA;
            $slroom = DB::table("chitiet_phieudangky")->where("MAPHIEU",$idPhieu)->count();
            if($slroom === $sl)
            {
                Session::flash("errorsl","Đã đầy không thể thêm khách hàng!");
                if($dt != null)
                {
                    return redirect()->route("ct_pdkdt");
                }
                return redirect()->route("ct_reserve");
            }
            else
            {
                try
                {
                    $addkh = DB::insert("INSERT INTO chitiet_phieudangky (MAPHIEU,MAKH) VALUES (?,?)",[$idPhieu,$makh]);
                    $updatekh = DB::update("UPDATE khachhang SET LUUTRU = ? WHERE MAKH = ?",["YES",$makh]);
                    if($dt != null)
                    {
                        return redirect()->route("ct_pdkdt");
                    }
                    return redirect()->route("ct_reserve");
                }
                catch(Exception $e)
                {
                    Session::flash("errorsame","Có lỗi không thể thêm khách hàng này!");
                    if($dt != null)
                    {
                        return redirect()->route("ct_pdkdt");
                    }
                    return redirect()->route("ct_reserve");
                }
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function addkh2(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $dt = $request->input("dt");
            $tenkh = $request->input("name");
            $cccdkh = $request->input("cccd");
            $sdt = $request->input("sdt");
            $idPhieu = request()->cookie('idphieu');    
            if($idPhieu == null)
            {
                $idPhieu = Session::get("idphieu");
            }      
            $checkSL = DB::select("SELECT * FROM phieudangky INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE MAPHIEU = ?",[$idPhieu]);
            $sl = $checkSL[0]->SUCCHUA;
            $slroom = DB::table("chitiet_phieudangky")->where("MAPHIEU",$idPhieu)->count();
            $currentTime = date('His');
            if($slroom === $sl)
            {
                Session::flash("errorsl","Đã đầy không thể thêm khách hàng!");
                if($dt != null)
                {
                    return redirect()->route("ct_pdkdt");
                }
                return redirect()->route("ct_reserve");
            }
            else
            {
                try
                {
                    $kh = DB::insert("INSERT INTO khachhang (MAKH,HOTEN,GIOITINH,NGAYSINH,DIACHI,SDT,EMAIL,PASSWORD,DIEMTINNHIEM,AVATAR,CCCD,USERNAME,GHICHU,ISDELETE,LUUTRU) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",[$sdt.$currentTime,$tenkh,"Chưa rõ","2000-1-1",null,$sdt,null,null,100,null,$cccdkh,null,null,1,"YES"]);
                    $addkh = DB::insert("INSERT INTO chitiet_phieudangky (MAPHIEU,MAKH) VALUES (?,?)",[$idPhieu,$cccdkh.$currentTime]);
                    if($dt != null)
                    {
                        return redirect()->route("ct_pdkdt");
                    }
                    return redirect()->route("ct_reserve");
                }
                catch(Exception $e)
                {
                    Session::flash("errorsame","Có lỗi không thể thêm khách hàng này!");
                    if($dt != null)
                    {
                        return redirect()->route("ct_pdkdt");
                    }
                    return redirect()->route("ct_reserve");
                }
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function removekh(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $dt = $request->input("dt");
            $makh = $request->input("makh");
            $idPhieu = request()->cookie('idphieu');    
            if($idPhieu == null)
            {
                $idPhieu = Session::get("idphieu");
            } 
            if($makh != null)
            {
                try
                {
                    $delete = DB::delete("DELETE FROM chitiet_phieudangky WHERE MAKH =? AND MAPHIEU = ?",[$makh,$idPhieu]);
                    if($dt != null)
                    {
                        return redirect()->route("ct_pdkdt");
                    }
                    return redirect()->route("ct_reserve");
                }
                catch(Exception $e)
                {
                    Session::flash("errorpdk_tt","Có lỗi xảy ra!");
                    if($dt != null)
                    {
                        return redirect()->route("ct_pdkdt");
                    }
                    return redirect()->route("ct_reserve");
                }
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function deletepdk(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
           try
           {
            $takeName = "";
            $data = json_decode($cookie, true);
            $takeName = $data['user'];
            $checkUser = DB::select("SELECT * FROM nhanvien WHERE EMAIL = ?",[$takeName]);
            $idPhieu = $request->input("idphieuurl");
            if($idPhieu != null)
            {
                Session::put("idphieu",$idPhieu);
            }
            else
            {
                $idPhieu = Session::get("idphieu");
            }
            $selectroom = DB::select("SELECT * FROM phieudangky WHERE MAPHIEU =?",[$idPhieu]);
            $updateDelete = DB::update("UPDATE phieudangky SET MANV = ?, TINHTRANG = ?, TT_NHANPHONG = ? WHERE MAPHIEU = ?",[$checkUser[0]->MANV,"Đã hủy","Đã hủy",$idPhieu]);
            $updateRoom = DB::update("UPDATE phong set TRANGTHAI = 0 WHERE MAPHONG = ?",[$selectroom[0]->MAPHONG]);

            ///gửi mail hủy phòng admin//
            $roomTypeCode = $selectroom[0]->MAPHONG;
            $result = DB::table('phong')
                ->join('loaiphong', 'phong.MALP', '=', 'loaiphong.MALP')
                ->where('phong.MAPHONG', $roomTypeCode)
                ->select('loaiphong.TENLOAIPHONG')
                ->first();

            if ($result) {
                $roomTypeName = $result->TENLOAIPHONG;
            }


            $cookie = request()->cookie('remember');
            $cookie2 = request()->cookie('remember_notSave');
            $cookie3 = request()->cookie('remember_google');

            $customer_name = "";
            $DateR = $request->input("DateR");
            $DateP = $request->input("DateP");

            if ($cookie) {
                $data = json_decode($cookie, true);
                $customer_name = $data['user'];
            } else if ($cookie2) {
                $data = json_decode($cookie2, true);
                $customer_name = $data['user'];
            } else if ($cookie3) {
                $data = json_decode($cookie3, true);
                $customer_name = $data['user'];
            }

            $customer_data = DB::select("SELECT * FROM khachhang WHERE EMAIL = ? OR USERNAME = ?", [$customer_name, $customer_name]);

            $email = $customer_data[0]->EMAIL;
            $name = $customer_data[0]->HOTEN;


            $details = [
                'customerEmail' => $email,
                'userName' => $customer_data[0]->HOTEN,
                'checkInDate' => $DateR,
                'checkOutDate' => $DateP,
                'roomTypeName' => $roomTypeName,
            ];
            $mailableClass = new Cancel_Room_Admin($details);
            Mail::to($email)->send($mailableClass);


            return redirect()->route("reserveAdmin");
           }
           catch (Exception $e)
           {
                Session::flash("errorpdk_tt","Có lỗi xảy ra!");
                return redirect()->route("ct_pdkdt");
           }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function completepdkdt(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
           try
           {
            $takeName = "";
            $data = json_decode($cookie, true);
            $takeName = $data['user'];
            $checkUser = DB::select("SELECT * FROM nhanvien WHERE EMAIL = ?",[$takeName]);
            $idPhieu = $request->input("idphieuurl");
            $count = DB::table("chitiet_phieudangky")->where("MAPHIEU",$idPhieu)->count();
            if($count === 0)
            {
                Session::flash("errorpdk_tt","Có lỗi xảy ra!");
                return redirect()->route("ct_pdkdt");
            }
            if($idPhieu != null)
            {
                Session::put("idphieu",$idPhieu);
            }
            else
            {
                $idPhieu = Session::get("idphieu");
            }
            $selectKH = DB::select("SELECT * FROM chitiet_phieudangky WHERE MAPHIEU = ?",[$idPhieu]);
            foreach($selectKH as $x)
            {
                $updatekh = DB::update("UPDATE khachhang SET LUUTRU = ? WHERE MAKH =?",["YES",$x->MAKH]);
            }
            $complete = DB::update("UPDATE phieudangky SET TINHTRANG = ?, TT_NHANPHONG = ?, MANV = ? WHERE MAPHIEU = ?",["Đã xác nhận","Đã nhận phòng",$checkUser[0]->MANV,$idPhieu]);
            $currentTime2 = date('His');
            $insertInvoice = DB::insert("INSERT INTO hoadon (MAHD,MANV,MAPHIEU,NGAYLAP,TONGTIEN,ISDELETE) VALUES(?,?,?,?,?,?)",[$idPhieu.$currentTime2,null,$idPhieu,null,0,1]);

              /// xử lý phần gửi mail//
              $cookie = request()->cookie('remember');
              $cookie2 = request()->cookie('remember_notSave');
              $cookie3 = request()->cookie('remember_google');

              $customer_name = "";
              $DateR = $request->input("DateR");
              $DateP = $request->input("DateP");

              if ($cookie) {
                  $data = json_decode($cookie, true);
                  $customer_name = $data['user'];
              } else if ($cookie2) {
                  $data = json_decode($cookie2, true);
                  $customer_name = $data['user'];
              } else if ($cookie3) {
                  $data = json_decode($cookie3, true);
                  $customer_name = $data['user'];
              }

              $customer_data = DB::select("SELECT * from khachhang WHERE EMAIL = ? OR USERNAME = ?", [$customer_name, $customer_name]);
              $email = $customer_data[0]->EMAIL;
              $name = $customer_data[0]->HOTEN;


              $details = [
                  'customerEmail' => $email,
                  'userName' => $customer_data[0]->HOTEN,
                  'checkInDate' => $DateR,
                  'checkOutDate' => $DateP,
              ];
              $mailableClass = new BookingSuccessfull($details);
              Mail::to($email)->send($mailableClass);

            return redirect()->route("reserveAdmin");
           }
           catch(Exception $e)
           {
                dd($e);
                Session::flash("errorpdk_tt","Có lỗi xảy ra!");
                return redirect()->route("ct_pdkdt");
           }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function completepdk(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            try
            {
                $idPhieu = $request->input("idphieuurl");
                if($idPhieu != null)
                {
                    Session::put("idphieu",$idPhieu);
                }
                else
                {
                    $idPhieu = Session::get("idphieu");
                }
                $count = DB::table("chitiet_phieudangky")->where("MAPHIEU",$idPhieu)->count();
                if($count === 0)
                {
                    Session::flash("errorpdk_tt","Có lỗi xảy ra!");
                    return redirect()->route("ct_pdkdt");
                }
                else
                {
                    $sumPay = DB::select("SELECT * FROM phieudangky WHERE MAPHIEU = ?",[$idPhieu]);
                    $currentTime2 = date('His');
                    $insertInvoice = DB::insert("INSERT INTO hoadon (MAHD,MANV,MAPHIEU,NGAYLAP,TONGTIEN,ISDELETE) VALUES(?,?,?,?,?,?)",[$idPhieu.$currentTime2,null,$idPhieu,null,$sumPay[0]->THANHTOAN,1]);
                    $complete = DB::update("UPDATE phieudangky SET TT_NHANPHONG = ? WHERE MAPHIEU = ?",["Đã nhận phòng",$idPhieu]);
                    return redirect()->route("reserveAdmin");
                }
            }
            catch(Exception $e)
            {
                Session::flash("errorpdk_tt","Có lỗi xảy ra!");
                return redirect()->route("ct_pdkdt");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function detailroom(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idPhieu = $request->input("idphieuurl");
            $ct = DB::select("SELECT * FROM chitiet_phieudangky INNER JOIN khachhang ON chitiet_phieudangky.MAKH = khachhang.MAKH WHERE MAPHIEU = ?",[$idPhieu]);
            $phieu = DB::select("SELECT * FROM phieudangky INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE MAPHIEU = ?",[$idPhieu]);
            return view("Admin.Room.detail_room",compact("phieu","ct"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function editctroom(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $subcription = DB::select("SELECT * FROM phieudangky INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP");
            return view("Admin.Room.edit_ct_room",compact("subcription"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
