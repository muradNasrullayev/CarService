<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class C404Controller extends Controller
{
    public function c404()
    {
        return view("web.404");
    }
}
