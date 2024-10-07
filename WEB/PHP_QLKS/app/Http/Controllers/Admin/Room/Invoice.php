<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Invoice extends Controller
{
    //
    public function selectinvoice()
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $select = DB::select("SELECT * FROM hoadon INNER JOIN phieudangky ON hoadon.MAPHIEU = phieudangky.MAPHIEU INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG INNER JOIN loaiphong ON phong.MALP = loaiphong.MALP WHERE NGAYLAP IS NULL");
            return view("Admin.Room.invoiceAdmin",compact("select"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function ct_invoice(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $invoice = $request->input("idinvoice");
            if($invoice != null)
            {
                Session::put("invoice",$invoice);
            }
            else
            {
                $invoice = Session::get("invoice");
            }
            $infinvoice = DB::select("SELECT * FROM hoadon INNER JOIN phieudangky ON hoadon.MAPHIEU = phieudangky.MAPHIEU INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG WHERE MAHD = ?",[$invoice]);
            $dateR = $infinvoice[0]->NGAYDAT;
            $dateP = $infinvoice[0]->TRAPHONG;
            $date1 = new DateTime($dateR);
            $date2 = new DateTime($dateP);
            $timeDay = date_diff($date1,$date2);
            $duration = $timeDay->days;
            $select = DB::select("SELECT * FROM dichvu");
            $selectService = DB::select("SELECT * FROM ct_hoa_don INNER JOIN dichvu ON ct_hoa_don.MADV = dichvu.MADV WHERE MAHD = ?",[$invoice]);
            return view("Admin.Room.ct_invoice",compact("selectService","invoice","select","infinvoice","duration"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function addServiceInvoice(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idservice = $request->input("service");
            $SL =  $request->input("quanlity");
            $idinvoice = Session::get("invoice");
            try
            {
                $selectServiceInInvoice = DB::select("SELECT * FROM ct_hoa_don WHERE MAHD = ? AND MADV = ?",[$idinvoice,$idservice]);
                if($selectServiceInInvoice != null)
                {
                    $SL = $SL + $selectServiceInInvoice[0]->SOLUONG;
                    $update = DB::update("UPDATE ct_hoa_don SET SOLUONG = ? WHERE MAHD = ? AND MADV = ?",[$SL,$idinvoice,$idservice]);
                    return redirect()->route("ct_invoice");
                }
                else
                {
                    $add = DB::insert("INSERT INTO ct_hoa_don (MAHD,MADV,SOLUONG) VALUES(?,?,?)",[$idinvoice,$idservice,$SL]);
                    return redirect()->route("ct_invoice");
                }
            }
            catch(Exception $e)
            {
                Session::flash("errorservice","Dịch vụ không hợp lệ!");
                return redirect()->route("ct_invoice");
            }
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function removeServiceInvoice(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {
            $idinvoice = Session::get("invoice");
            $idservice = $request->input("service");
            $remove = DB::delete("DELETE FROM ct_hoa_don WHERE MADV = ? AND MAHD = ?",[$idservice,$idinvoice]);
            return redirect()->route("ct_invoice");
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function completeInvoice(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {  
            $takeName = "";
            $data = json_decode($cookie, true);
            $takeName = $data['user'];
            $checkUser = DB::select("SELECT * FROM nhanvien WHERE EMAIL = ?",[$takeName]);
            $now = new DateTime();
            $DateN = $now->format('Y-m-d');
            $idinvoice = $request->input("invoice");
            $sum = $request->input("sum");
            $updateInvoice = DB::update("UPDATE hoadon SET NGAYLAP = ?, TONGTIEN = ?, MANV = ? WHERE MAHD =?",[$DateN,$sum,$checkUser[0]->MANV, $idinvoice]);
            $selectpdk = DB::select("SELECT * FROM hoadon INNER JOIN phieudangky ON hoadon.MAPHIEU = phieudangky.MAPHIEU WHERE MAHD =?",[$idinvoice]);
            $updatePdk = DB::select("UPDATE phieudangky SET TT_NHANPHONG = ? WHERE MAPHIEU = ?",["Đã trả phòng",$selectpdk[0]->MAPHIEU]);
            $updateRoom = DB::update("UPDATE phong SET TRANGTHAI = ? WHERE MAPHONG = ?",[2,$selectpdk[0]->MAPHONG]);
            return redirect()->route("selectinvoice");
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
    public function detailInvoice(Request $request)
    {
        $cookie = request()->cookie('accountadmin');
        if($cookie)
        {  
            $invoice = $request->input("invoice");
            $infinvoice = DB::select("SELECT * FROM hoadon INNER JOIN phieudangky ON hoadon.MAPHIEU = phieudangky.MAPHIEU INNER JOIN phong ON phieudangky.MAPHONG = phong.MAPHONG WHERE MAHD = ?",[$invoice]);
            $dateR = $infinvoice[0]->NGAYDAT;
            $dateP = $infinvoice[0]->TRAPHONG;
            $date1 = new DateTime($dateR);
            $date2 = new DateTime($dateP);
            $timeDay = date_diff($date1,$date2);
            $duration = $timeDay->days;
            $select = DB::select("SELECT * FROM dichvu");
            $selectService = DB::select("SELECT * FROM ct_hoa_don INNER JOIN dichvu ON ct_hoa_don.MADV = dichvu.MADV WHERE MAHD = ?",[$invoice]);
            return view("Admin.Room.detail_invoice",compact("selectService","invoice","select","infinvoice","duration"));
        }
        else
        {
            return redirect()->route("loginadmin");
        }
    }
}
