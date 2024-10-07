<?php

namespace App\Http\Controllers\User\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Contact extends Controller
{
    //
    public function contact()
    {
        return view("User.Contact.contact");
    }
}
