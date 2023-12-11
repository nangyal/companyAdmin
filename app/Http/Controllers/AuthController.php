<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class AuthController extends Controller
{

    public function authenticate(Request $request): RedirectResponse
    {

        $formFields = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => 'required'
            ]
        );

        $success = auth()->attempt($formFields);
        if ($success) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        return back()->withErrors(['email' =>  __('Invalid credentials')])->onlyInput('email');
    }

    public function login(): View
    {
        return view('user.login');
    }

    public function logout(Request $request): RedirectResponse
    {
        //dd($request);
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');
    }
}
