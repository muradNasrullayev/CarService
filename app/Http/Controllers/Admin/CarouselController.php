<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Carousel\StoreRequest;
use App\Models\Carousel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index()//: Factory|View|Application
    {
        $carousels = Carousel::query()->select('id', 'title', 'image','background_image')->get();
        return view('admin.carousel.index', compact('carousels'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('admin.carousel.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)//: RedirectResponse
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        $file = $request->file('image');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(storage_path('/app/public/carousels/'), $filename);
        $data['image'] = "storage/carousels/$filename";

        $file = $request->file('background_image');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(storage_path('/app/public/carousels/'), $filename);
        $data['background_image'] = "storage/carousels/$filename";

        Carousel::query()->create($data);

        return redirect()->route('admin.carousels.index');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(int $id, Request $request): RedirectResponse
    {
        $carousel = Carousel::query()->findOrFail($id);
        $oldImage = $carousel->image;
        $oldBackground_image = $carousel->background_image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(storage_path('/app/public/carousels/'), $filename);
            $image = "storage/carousels/$filename";


            if ($image != $oldImage) {
                if (file_exists(public_path($oldImage))) {
                    File::delete(public_path($oldImage));
                }
            }
        } else {
            $image = $oldImage;

        }

        // Background image file check
        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(storage_path('/app/public/carousels/'), $filename);
            $background_image = "storage/carousels/$filename";


            if ($background_image != $oldBackground_image) {
                if (file_exists(public_path($oldBackground_image))) {
                    File::delete(public_path($oldBackground_image));
                }
            }
        } else {
            $background_image = $oldBackground_image; // Dosya yüklenmemişse eski arka plan resmini kullan
        }


        $carousel->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'background_image' => $background_image,
        ]);

        return redirect()->route('admin.carousels.index');
    }


    /**
     * @param int $id
     * @return Factory|View|Application
     */
    public function edit(int $id): Factory|View|Application
    {
        $carousel = Carousel::query()->findOrFail($id);
        return view('admin.carousel.edit', compact('carousel'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $file = Carousel::query()->findOrFail($id);

        if((file_exists(public_path($file->image)))) File::delete(public_path($file->image));
        if((file_exists(public_path($file->background_image)))) File::delete(public_path($file->background_image));

        $file->delete();
        return redirect()->route('admin.carousels.index');
    }

    public function show($id)//: Factory|View|Application
    {

        $carousel = Carousel::query()->findOrFail($id);
        return view('admin.carousel.show', compact('carousel'));
    }
}



