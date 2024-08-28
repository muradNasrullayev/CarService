<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use App\Models\Expert;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function team(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $experts = Expert::query()->select('id', 'name','job','facebook','twitter','instagram')->get();
        return view('web.team',compact('experts'));
    }
}
