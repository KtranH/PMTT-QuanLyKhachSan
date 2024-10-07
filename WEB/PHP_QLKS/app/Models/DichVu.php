<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DichVu extends Model
{
    protected $table = "dichvu";
    protected $primaryKey = "MADV";
    public $timestamps = false;
    protected $fillable = [
        'TENDV',
        'GIA',
        'MOTA',
        'HinhAnh',
        'ISDELETE',
    ];

    public static function getAllDichVu()
    {
        $dichvu = DB::select("select * from dichvu");
        return $dichvu;
    }

    
}