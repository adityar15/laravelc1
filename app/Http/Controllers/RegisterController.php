<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(Request $request)
    {
        return Inertia::render('Register');
    }
}
