<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $carousel=Carousel::query()->select('title', 'description', 'image', 'background_image')->get();
        return view('web.index', compact('carousel'));
    }
}
