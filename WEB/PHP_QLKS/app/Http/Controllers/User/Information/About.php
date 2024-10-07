<?php

namespace App\Http\Controllers\User\Information;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class About extends Controller
{
    //
    public function about()
    {
        return view("User.About.about");
    }
}
