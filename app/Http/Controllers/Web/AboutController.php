<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Expert;

class AboutController extends Controller
{
    public function about()
    {
        $advantages = Advantage::query()
            ->select('title', 'description','icon')
            ->get();

        $experts = Expert::query()->select('id', 'name','job','image','facebook','twitter','instagram')
        ->orderBy('id','desc')
        ->take(4)
        ->get();
        return view('web.about',compact('advantages','experts'));
    }
}
