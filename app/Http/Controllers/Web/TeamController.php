<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function team()
    {
        return view('web.team');
    }
}
