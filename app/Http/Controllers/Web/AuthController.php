<?php

namespace App\Http\Controllers\Web;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\{ForgetPasswordRequest, LoginRequest, RegisterRequest};
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

    public function forgetPaswsord()
    {
        return view('web.login-register.forgetPassword');

    }

    public function forgetPaswsordPost(ForgetPasswordRequest $request)
    {

        $attempt = Auth::guard('client')->attempt(['email'=>Auth::guard('client')-> user()->email,
            'password'=>$request->oldPassword]);

        if ($attempt) {
            if ($request->newPassword==$request->confirmPassword){
                $user= Client::query()->find(Auth::guard('client')-> id());
                $user->password =Hash::make($request->newPassword);
                $user->save();
                return redirect()->route('home');
            }
            else{
                return redirect()->route('login-register.forgetPassword');
            }
        }

    }
}
