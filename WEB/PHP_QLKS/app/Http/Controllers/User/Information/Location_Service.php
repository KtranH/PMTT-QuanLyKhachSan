<?php

namespace App\Http\Controllers\User\Information;

use App\Http\Controllers\Controller;
use App\Models\DichVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Location_Service extends Controller
{
    public function showAllDichVu(){
        $allDichVu = DichVu::getAllDichVu();
        $lines = file(storage_path('Files/activity.txt'));
        $fileJson = file_get_contents(storage_path('Files/news.json'));
        $data = json_decode($fileJson, true);
        return view('User.Information.dichvu',compact('lines','data'), ["allDichVu" => DB::table("dichvu")->paginate(6)]);
    }
    public function loadCoSo1(){
        return view('User.Information.coso1');
    }
    public function loadCoSo2(){
        return view('User.Information.coso2');
    }
    public function loadCoSo3(){
        return view('User.Information.coso3');
    }
}
