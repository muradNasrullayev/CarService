<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LoginRequest;
use App\Http\Requests\Web\RegisterRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;


class AuthController extends Controller
{
    public function login(): View
    {
        return view('web.login-register.login');
    }


    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function loginPost(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        } else {
            Session::flush();
            Auth::logout();
            return redirect()->route('login-register.loginPost')
                ->withErrors(['error' => 'Credentials are invalid.']);
        }
    }



    public function register(): View
    {
        return view('web.login-register.register');
    }


    public function registerPost(RegisterRequest $request)
    {
        if ($request->password == $request->password_coniform) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->getPassword())
            ];
            Client::query()->create($data);
        }
        return redirect()->route('register')->withErrors('Cridentials are invalid');
    }


    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
