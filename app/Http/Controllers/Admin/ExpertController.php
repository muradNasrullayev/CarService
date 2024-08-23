<?php /** @noinspection ALL */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Expert\StoreRequest;
use App\Http\Requests\Admin\Expert\UpdateRequest;
use App\Models\Carousel;
use App\Models\Expert;

use Illuminate\Support\Facades\File;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Expert::query()->select('id','name', 'job', 'image', 'facebook', 'twitter', 'instagram')->get();
        return view('admin.expert.index', compact('experts'));
    }

    public function create()
    {
        return view('admin.expert.create');
    }

    public function store(StoreRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'job' => $request->job,
                'image' => null,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
            ];

            $file = $request->file('image');
            if ($file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(storage_path('/app/public/experts/'), $filename);
                $data['image'] = "storage/experts/$filename";
            }
            Expert::create($data);

            return redirect()->route('admin.expert.index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)//: \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $expert = Expert::query()->findOrFail($id);

        return view('admin.expert.edit', compact('expert'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $experts = Expert::query()->findOrFail($id);
            $data = [
                'name' => $request->name,
                'job' => $request->job,
                'image' => $experts->image,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
            ];

            $file = $request->file('image');
            if (file_exists($file)) {
                $filename = time() . '-' . $file->getClientOriginalName();
                if((file_exists(public_path($experts->image)))) File::delete(public_path($experts->image));
                $file->move(storage_path('/app/public/experts/'), $filename);
                $data['image'] = "storage/experts/$filename";
            }
            $experts->update($data);

            return redirect()->route('admin.expert.index');
    }

    public function destroy($id)
    {
        $file = Expert::query()->findOrFail($id);

        if((file_exists(public_path($file->image)))) File::delete(public_path($file->image));
        $file->delete();
        return redirect()->route('admin.expert.index');
    }

    public function show($id)
    {
        $expert = Expert::query()->findOrFail($id);

        return view('admin.expert.show',compact('expert'));
    }


}
