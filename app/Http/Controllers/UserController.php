<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailsRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(UserDetailsRequest $request)
    {
        // $request->validate([
        //     "email" => ['required', 'email:rfc,dns'],
        //     "password" => ['required', 'min:6', 'max:12']
        // ], [
        //     "email.required" => "Please enter your email",
        //     "email.email" => "Please enter a valid email address"
        // ]);


        return "User created with email {$request->email}";
    }

    
}
