<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Carousel;
use App\Models\Expert;
use App\Models\Service;
use App\Models\ServiceAdvantage;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $services = Service::query()->select('id','title','our_services_name','icon','image','description_title','description')->get();

        $sevriceAdvantages = ServiceAdvantage::query()->select("service_id",'advantage_id')->get();

        $advantages = Advantage::query()
            ->select('title', 'description','icon')
            ->get();

        $data1=[];
        $lastId=-1;
        $advantage_datas=[];
        foreach ($services as $service){
            $advantage_data=[];
            foreach ($advantages as $advantage) {

                array_push($advantage_data,$advantage->title);
            }
            array_push($advantage_datas,$advantage_data);
        }

        foreach ($sevriceAdvantages as $item=> $sevriceAdvantage) {
            $newId=$sevriceAdvantage->service_id;
            if ($lastId != $newId) {
                $advantagesNew = ServiceAdvantage::where('service_id',$newId )->get(['advantage_id']);
                array_push($data1,$advantagesNew);
            }
            else{
                    continue;
                }
                $lastId=$newId;
            }

        $itemNews=[[]];
        foreach ($data1 as $index=>$items) {
            foreach ($items as $index2=> $item) {
                $itemNews[$index][$index2]=$item->advantage_id;

            }

        }
       // return[$itemNews , $advantage_datas];

        $experts = Expert::query()->select('id', 'name','job','image','facebook','twitter','instagram')
            ->orderBy('id','desc')
            ->take(4)
            ->get();

        $testimonials = Testimonial::query()
            ->select('id', DB::raw('CONCAT(first_name, " ", last_name) AS full_name'), 'image', 'profession', 'feedback')
            ->orderBy('id', 'desc')
            ->get();

        $carousel=Carousel::query()->select('title', 'description', 'image', 'background_image')->get();

        return view('web.index', compact('carousel', 'testimonials','experts', 'advantages','services',  'itemNews','advantage_datas'));
    }
}
