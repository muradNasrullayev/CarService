<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LoginRequest;
use App\Http\Requests\Web\RegisterRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('web.login');
    }

    public function loginPost(LoginRequest $request)//: \Illuminate\Http\RedirectResponse
    {
        $attempt = Auth::attempt(['email'=>$request->email, 'password'=>$request->password]);
        if ($attempt) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->withErrors("Credentials are is invalid");
    }

    public function register(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('web.register');
    }

    public function registerPost(RegisterRequest $request)
    {
        if ($request->password == $request->password_coniform) {
            $data =[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->getPassword())
            ];
            Client::query()->create($data);
            return redirect()->route('home');
        }
        return redirect()->route('register')->withErrors('Cridentials are invalid');
    }
}
