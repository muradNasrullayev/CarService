<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $testimonials= Testimonial::query()->select('id','first_name','last_name','image','profession','feedback')->get();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'profession' => $request->profession,
            'feedback' => $request->feedback,
        ];

        $file = $request->file('image');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(storage_path('/app/public/testimonial/'), $filename);
        $data['image'] = "storage/testimonial/$filename";



        Testimonial::query()->create($data);

        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    // * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $testimonial = Testimonial::query()->findOrFail($id);

        return view('admin.testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $testimonial = Testimonial::query()->findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $testimonial = Testimonial::query()->findOrFail($id);
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $testimonial->image,
            'profession' => $request->profession,
            'feedback' => $request->feedback,

        ];

        $file = $request->file('image');
        if (file_exists($file)) {
            $filename = time() . '-' . $file->getClientOriginalName();
            if((file_exists(public_path($testimonial->image)))) File::delete(public_path($experts->image));
            $file->move(storage_path('/app/public/testimonial/'), $filename);
            $data['image'] = "storage/experts/$filename";
        }
        $testimonial->update($data);

        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $file = Testimonial::query()->findOrFail($id);

        if((file_exists(public_path($file->image)))) File::delete(public_path($file->image));
        $file->delete();
        return redirect()->route('admin.testimonial.index');
    }
}
