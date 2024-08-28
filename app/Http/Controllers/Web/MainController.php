<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Carousel;
use App\Models\Expert;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $advantages = Advantage::query()
            ->select('title', 'description','icon')
            ->get();

        $experts = Expert::query()->select('id', 'name','job','image','facebook','twitter','instagram')
            ->orderBy('id','desc')
            ->take(4)
            ->get();
        $testimonials = Testimonial::query()
            ->select('id', DB::raw('CONCAT(first_name, " ", last_name) AS full_name'), 'image', 'profession', 'feedback')
            ->orderBy('id', 'desc')
            //->take(4)
            ->get();
        $carousel=Carousel::query()->select('title', 'description', 'image', 'background_image')->get();
        return view('web.index', compact('carousel', 'testimonials','experts', 'advantages'));
    }
}
