<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(Request $request)
    {
        // dd(auth()->user());
        return Inertia::render('Register');
    }

    
}
