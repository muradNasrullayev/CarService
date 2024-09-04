<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\{RedirectResponse,Request};

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::query()->find(1);
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * @param Request $request
     * @param Setting $setting
     * @return string|RedirectResponse
     */
    public function update(Request $request, Setting $setting): string|RedirectResponse
    {
        try {
            $setting->update([
                'email' => $request->email,
                'mobile' => $request->mobile,
                'phone' => $request->phone,
                'fb_url' => $request->fb_url,
                'inst_url' => $request->inst_url,
                'yt_url' => $request->yt_url,
                'tlg_url' => $request->tlg_url,
                'address' => $request->address,
            ]);
            toastr()->success('Data successfully changed');
            return redirect()->route('admin.setting.index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}
