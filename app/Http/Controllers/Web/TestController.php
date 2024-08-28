<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use App\Models\Testimonial;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $testimonials = Testimonial::query()
            ->select('id', DB::raw('CONCAT(first_name, " ", last_name) AS full_name'), 'image', 'profession', 'feedback')
            ->orderBy('id', 'desc')
            ->get();

        return view('web.testimonial', compact('testimonials'));

    }
}
