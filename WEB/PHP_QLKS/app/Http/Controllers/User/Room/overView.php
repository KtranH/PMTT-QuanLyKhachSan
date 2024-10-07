<?php

namespace App\Http\Controllers\User\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class overView extends Controller
{
    //
    public function overViewProduct(Request $request)
    {
        $idRoom = $request->input("idroom");
        $room = DB::select("SELECT * FROM loaiphong WHERE MALP = ?",[$idRoom]);
        $imageRoom = $room[0]->ANH;
        $takeImage = explode("|",$imageRoom);
        return view("User.Room.roomOverview",compact('room','takeImage'));
    }
}
