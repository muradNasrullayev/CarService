<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Http\Requests\Admin\Service\UpdateRequest;
use App\Models\Advantage;
use App\Models\Service;
use App\Models\ServiceAdvantage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $services = Service::query()
            ->select('id','title','our_services_name','icon','image','description_title','description')
            ->get();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $advantages = Advantage::query()->select('id','title')->get();
        $services = Service::query()
            ->select('id','title','our_services_name','icon','image','description_title','description')
            ->get();
        return view('admin.service.create',compact('services','advantages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return// \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {


        $data=[
            'title'=>$request->title,
            'our_services_name'=>$request->our_services_name,
            'icon'=>$request->icon,
            'image'=>null,
            'description_title'=>$request->description_title,
            'description'=>$request->description,

        ];

        $file = $request->file('image');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(storage_path('/app/public/services/'), $filename);
        $data['image'] = "storage/services/$filename";
        Service::query()->create($data);
        $service_id = DB::table('services')
            ->orderBy('id', 'desc')
            ->first();
        foreach ($request->advantages as $advantage) {
            ServiceAdvantage::query()->create(['advantage_id' => $advantage, 'service_id' => $service_id->id]);
        }

        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return// \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $service = Service::query()->findOrFail($id);
        $advantages_id = ServiceAdvantage::where('service_id', '=', $id)->pluck('advantage_id');
        $advantages =Advantage::query()->select('id','title')->get();
        $service_advantages=[];
        foreach ($advantages_id as $item => $advantage_id) {
            $Item= $advantages[$advantage_id-1]->title;
            $service_advantages[$item] =$Item;
        }

            return view('admin.service.show',compact('service','service_advantages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $advantages_id = ServiceAdvantage::where('service_id', '=', $id)->pluck('advantage_id');
        $advantages = Advantage::query()->select('id','title')->get();
        $service = Service::query()->findOrFail($id);
        return view('admin.service.edit',compact('service','advantages','advantages_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $service= Service::query()->findOrFail($id);

            $data=[
                'title'=>$request->title,
                'our_services_name'=>$request->our_services_name,
                'icon'=>$request->icon,
                'image'=>$service->image,
                'description_title'=>$request->description_title,
                'description'=>$request->description,

            ];
            $file = $request->file('image');
            if(file_exists($file)){
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(storage_path('/app/public/services/'), $filename);
                $data['image'] = "storage/services/$filename";
                if ((file_exists(public_path($service->image)))) File::delete(public_path($service->image));

            }
            $service->update($data);
            $service_id= Service::query()->where('description',$request['description'])->first();
           ServiceAdvantage::query()->where('service_id',$service_id->id)->delete();
        foreach ($request->advantages as $advantage) {
            ServiceAdvantage::query()->create(['advantage_id' => $advantage, 'service_id' => $service_id->id]);
        }
            return redirect()->route('admin.service.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return// \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $service = Service::query()->findOrFail($id);

        if ((file_exists(public_path($service->image)))) File::delete(public_path($service->image));
        $service->delete();
        return redirect()->route('admin.service.index');
    }
}
