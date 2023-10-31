<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function showAboutPage(Request $request)
    {
        return "Hello";
    }

    function showAboutDetails($name)
    {
        $person = [
            "name" => $name,
            "email" => "aditya@example.com"
        ];

        return response()->json($person);

    }
}
