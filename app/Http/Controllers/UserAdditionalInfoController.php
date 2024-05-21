<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAdditionalInfoController extends Controller
{
    public function nextOfKins(){
        return view('auth.next_of_kins');
    }
}
