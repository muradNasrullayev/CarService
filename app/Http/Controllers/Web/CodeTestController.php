<?php

namespace App\Http\Controllers\Web;
use App\Models\User;

use App\Http\Controllers\Controller;

class CodeTestController extends Controller
{
    public function codeTest()
    {
        $user = new user;
        return  $users = $user::all();

//        return view('codeTest');
    }
}
