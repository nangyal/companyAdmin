<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function home(): RedirectResponse
    {
        return redirect('/login');
    }

    public function dashboard(): View
    {
        return view('dashboard');
    }
}
