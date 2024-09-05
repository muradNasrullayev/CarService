<?php

namespace App\Http\Controllers\Web;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\{LoginRequest,RegisterRequest};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Auth,Hash,Session};
use Illuminate\View\View;


class AuthController extends Controller
{
    /**
     * @return View
     */
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
        $attempt= Auth::guard('client')->attempt(['email'=>$request->email,'password'=>$request->password]);



        if ($attempt) {
            return redirect()->route('home');
        } else {
            Session::flush();
            Auth::logout();
            return redirect()->route('login-register.loginPost')
                ->withErrors(['error' => 'Credentials are invalid.']);
        }
    }


    /**
     * @return View
     */
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
                'password' => Hash::make($request->password)
            ];
            Client::query()->create($data);


            $attemp = Auth::guard('client')->attempt(['email'=>$request->email,'password'=>$request->password]);
//            return  [
//                'email' => $request->email,
//                'password' => $request->password,
//                '$attemp' => $attemp
//            ];
            if ($attemp) {
                return redirect()->route('home');
            }

        }
        return redirect()->route('login-register.register')->withErrors('Cridentials are invalid');
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
