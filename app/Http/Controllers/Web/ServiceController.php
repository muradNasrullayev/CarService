<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use App\Models\Advantage;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function service()
    {
        $advantages = Advantage::query()
            ->select('title', 'description','icon')
            ->get();
        $testimonials = Testimonial::query()
            ->select('id', DB::raw('CONCAT(first_name, " ", last_name) AS full_name'), 'image', 'profession', 'feedback')
            ->orderBy('id', 'desc')
            ->get();
        return view('web.service',compact('testimonials','advantages'));
    }
}
