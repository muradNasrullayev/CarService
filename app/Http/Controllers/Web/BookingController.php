<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking()
    {
        return view('web.booking');
    }
}
