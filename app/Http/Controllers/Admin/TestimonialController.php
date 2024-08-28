<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $testimonials = Testimonial::query()
            ->select('id', 'first_name', 'last_name', 'image', 'profession', 'feedback')
            ->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
     * @param int $id
     * @return Factory|View|Application
     */
    public function show(int $id): Factory|View|Application
    {
        $testimonial = Testimonial::query()->findOrFail($id);
        return view('admin.testimonial.show', compact('testimonial'));
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): Application|Factory|View
    {
        $testimonial = Testimonial::query()->findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
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
            if ((file_exists(public_path($testimonial->image)))) File::delete(public_path($experts->image));
            $file->move(storage_path('/app/public/testimonial/'), $filename);
            $data['image'] = "storage/experts/$filename";
        }
        $testimonial->update($data);

        return redirect()->route('admin.testimonial.index');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy( int $id): RedirectResponse
    {
        $file = Testimonial::query()->findOrFail($id);

        if ((file_exists(public_path($file->image)))) File::delete(public_path($file->image));
        $file->delete();
        return redirect()->route('admin.testimonial.index');
    }
}
