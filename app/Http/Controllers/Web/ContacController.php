<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContacController extends Controller
{
    public function contact()
    {
        return view('web.contact');
        
    }
}
