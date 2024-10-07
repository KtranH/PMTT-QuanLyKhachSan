<?php

namespace App\Http\Controllers\User\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cart extends Controller
{
    //
    public function cartUser(Request $request)
    {
        $takeID = $request->input("takeIdRoom");
        $cookie = request()->cookie('remember');
        $cookie2 = request()->cookie('remember_notSave');
        $cookie3 = request()->cookie('remember_google');
        if(!$cookie && !$cookie2 && !$cookie3)
        {
            return redirect()->route("Formlogin");
        }
        else
        {
            $takeName = "";
            if ($cookie) {
                $data = json_decode($cookie, true);
                $takeName = $data['user'];
            }
            else if($cookie2)
            {
                $data = json_decode($cookie2, true);
                $takeName = $data['user'];
            }
            else if($cookie3)
            {
                $data = json_decode($cookie3, true);
                $takeName = $data['user'];
            }
            $checkUser = DB::select("SELECT MAKH from khachhang WHERE EMAIL = ? OR USERNAME = ?",[$takeName,$takeName]);
            $idUser = $checkUser[0]->MAKH;
            if($takeID != null)
            {
                $insertUserCart = DB::insert("INSERT INTO giohang (MAKH, MALP) VALUES (?, ?)",[$idUser,$takeID]);
            }
            $selectCart = DB::select("SELECT * FROM giohang INNER JOIN loaiphong ON giohang.MALP = loaiphong.MALP WHERE MAKH = ? AND ISDELETE = ?",[$idUser,1]);
            return view("User.Cart.cart",compact("idUser","selectCart"));
        }
    }
    public function updateCart(Request $request)
    {
        $takeID = $request->input("idroom");
        $cookie = request()->cookie('remember');
        $cookie2 = request()->cookie('remember_notSave');
        $cookie3 = request()->cookie('remember_google');
        if(!$cookie && !$cookie2 && !$cookie3)
        {
            return redirect()->route("Formlogin");
        }
        else
        {
            $takeName = "";
            if ($cookie) {
                $data = json_decode($cookie, true);
                $takeName = $data['user'];
            }
            else if($cookie2)
            {
                $data = json_decode($cookie2, true);
                $takeName = $data['user'];
            }
            else if($cookie3)
            {
                $data = json_decode($cookie3, true);
                $takeName = $data['user'];
            }
            $checkUser = DB::select("SELECT MAKH from khachhang WHERE EMAIL = ? OR USERNAME = ?",[$takeName,$takeName]);
            $idUser = $checkUser[0]->MAKH;
            $deleteRoom = DB::delete("DELETE FROM giohang WHERE MAKH = ? AND MALP = ?",[$idUser,$takeID]);
            return redirect()->route("cartUser");
        }
    }
}
