<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoaiPhong extends Model
{
    use HasFactory;
    protected $table = 'loaiphong';
    protected $primaryKey = 'MALP';
    public $timestamps = false;
    protected $fillable = [
        'MALP',
        'TENLOAIPHONG',
        'MOTA',
        'SUCCHUA',
        'SOLUONG',
        'ANH',
        'GIATHUE',
        'VITRI',
        'DIENTICH',
        'TIENICH',
        'NOITHAT',
        'QUYDINH',
        'ISDELETE'

    ];
    ////load thông tin tất cả loại phòng//
    public static function getALLCategory()
    {
        $allCategogy = DB::select("SELECT * FROM loaiphong AS l");
        return $allCategogy;
    }
    //load loại phòng tiêu biểu
    public static function getFeaturedCategory()
    {
        $categoryFeatured = DB::select("SELECT TOP 6 * FROM loaiphong AS l WHERE ISDELETE != 0 ORDER BY NEWID()");
        return $categoryFeatured;
    }
    //// load loại cao cấp//
    public static function getCaoCap()
    {
        $caocap = DB::select("SELECT * FROM loaiphong AS l WHERE l.TENLOAIPHONG LIKE '%cao cấp%'");
        return $caocap;
    }
    ////load loại phổ thông
    public static function getPhoThong()
    {
        $phothong = DB::select("SELECT * FROM loaiphong AS l WHERE l.TENLOAIPHONG LIKE '%phổ thông%'");
        return $phothong;
    }
    ////load loại giá rẻ
    public static function getGiaRe()
    {
        $giare = DB::select("SELECT * FROM loaiphong AS l WHERE l.TENLOAIPHONG LIKE '%giá rẻ%'");
        return $giare;
    }
    ////load loại theo giá cao -->thấp
    public static function getCategoryByPriceHighLow()
    {
        $pricehighLow = DB::select("SELECT * FROM loaiphong AS l ORDER BY l.GIATHUE DESC");
        return $pricehighLow;
    }
    ////load loại theo giá thấp -->cao
    public static function getCategoryByPriceLowHigh()
    {
        $priceLowHigh = DB::select("SELECT * FROM loaiphong AS l ORDER BY l.GIATHUE ASC");
        return $priceLowHigh;
    }
}