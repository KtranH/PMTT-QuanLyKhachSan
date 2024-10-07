<?php

namespace App\Http\Controllers\User\Room;

use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesRoom extends Controller
{
     ////tất cả loại phòng//
     public function showALLCategory()
     {
         $allCategory = LoaiPhong::getALLCategory();
         return view('User.Room.allCategory', ['allCategory' => DB::table("loaiphong")->paginate(4)]);
     }
     ////tất cả loại cao cấp //
     public function showCaoCap()
     {
         $caocap = LoaiPhong::getCaoCap();
 
         return view('User.Room.highlevelCategories', ['caocap' => DB::table("loaiphong")->paginate(4)]);
     }
     ////tất cả loại phổ thông //
     public function showPhoThong()
     {
         $phothong = LoaiPhong::getPhoThong();
 
         return view('User.Room.commonCategories', ['phothong' => DB::table("loaiphong")->paginate(4)]);
     }
     ////tất cả loại giá rẻ //
     public function showGiaRe()
     {
         $giare = LoaiPhong::getGiaRe();
 
         return view('User.Room.cheapCategories', ['giare' => DB::table("loaiphong")->paginate(4)]);
     }
     ////load phòng từ giá cao-->thấp//
     public function showRoomsByPriceHightLow()
     {
         $priceHighLow = LoaiPhong::getCategoryByPriceHighLow();
 
         return view('User.Room.categoryByPriceHighLow', ['priceHighLow' => DB::table("loaiphong")->paginate(4)]);
     }
     //load phòng từ giá thấp-->cao//
     public function showRoomsByPriceLowHigh()
     {
         $priceLowHigh = LoaiPhong::getCategoryByPriceLowHigh();
 
         return view('User.Room.categoriesByPriceLowHigh', ['priceLowHigh' => DB::table("loaiphong")->paginate(4)]);
     }
}
