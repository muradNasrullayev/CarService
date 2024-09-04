<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()//: \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $advantages = Advantage::query()
            ->select('id','title', 'description','icon')
            ->get();

        return view('admin.advantage.index', compact('advantages'));
    }

    public function create()//: \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return (view('admin.advantage.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {

        $data=[
            'title' => request('title'),
            'description' => request('description'),
            'icon' => request('icon')
        ];
        Advantage::query()->create($data);
        return redirect()->route('admin.advantage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advantage  $about
     * @return //\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show( $id)
    {

        $advantage = Advantage::query()->findOrFail($id);


        return view('admin.advantage.show', compact('advantage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advantage  $about
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit( $id,Request $request)
    {
        $advantage = Advantage::query()->findOrFail($id);
        return view('admin.advantage.edit', compact('advantage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advantage  $about
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $advantage = Advantage::query()->findOrFail($id);
        $data=[
            'title'=>$request->title,
            'description'=>$request->description,
            'icon'=>$request->icon
        ];
        $advantage->update($data);
        return redirect()->route('admin.advantage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advantage  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Advantage::query()->findOrFail($id);
        $file->delete();
        toastr()->success('Data deleted successfully');
        return redirect()->route('admin.advantage.index');
    }
}
