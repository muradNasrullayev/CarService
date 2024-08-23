<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function  login()
    {
        return view('admin.login');
    }

    public function loginPost(AdminRequest $request)
    {
        $attempt = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($attempt) return redirect()->route('admin.dashboard');

        return redirect()->route('admin.login')->withErrors(['error' => 'Credentials are invalid.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
