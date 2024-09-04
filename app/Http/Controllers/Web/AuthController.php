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

<<<<<<< HEAD

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function loginPost(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
=======
    public function loginPost(LoginRequest $request)//: \Illuminate\Http\RedirectResponse
    {
        $attempt = Auth::attempt(['email'=>$request->email, 'password'=>$request->password]);
        if ($attempt) {
>>>>>>> 23a583fb9154b427a184ea933ba2bb78e863f597
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
<<<<<<< HEAD
        return view('web.login-register.register');
=======
        return view('web.register');
>>>>>>> 23a583fb9154b427a184ea933ba2bb78e863f597
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
<<<<<<< HEAD
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
=======
            return redirect()->route('home');
        }
        return redirect()->route('register')->withErrors('Cridentials are invalid');
    }
>>>>>>> 23a583fb9154b427a184ea933ba2bb78e863f597
}
