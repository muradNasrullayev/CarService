<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use App\Models\Advantage;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking()
    {
        $advantages = Advantage::query()
            ->select('title', 'description','icon')
            ->get();
        return view('web.booking',compact('advantages'));
    }
}
