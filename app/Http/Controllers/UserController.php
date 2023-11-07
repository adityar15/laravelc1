<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserDetailsRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(UserDetailsRequest $request)
    {
        
        $validatedData = $request->validated();

        // create
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ]);

        // verification email

        // sql
        // insert into table "users" values (email, password) ....

        return redirect()->back();
    }


    public function login(UserLoginRequest $request)
    {
        $validatedData = $request->validated();

        // select * from users where email = $validatedData['email'] and password = $validatedData['password'] limit 1


        // that's how Auth::attempt works under the hood
        // $user = User::where('email', $validatedData['email'])->first();
        // $isSamePassword = Hash::check($validatedData['password'], $user->password);

        // if($user && $isSamePassword)
        // {
        //     return true
        // }

        $isCorrectUser = Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']]);

        if($isCorrectUser)
        {
            return redirect('/dashboard');
        }

        else {
            return redirect()->back();
        }
       
    }

    public function createBlogArticle(BlogCreateRequest $request)
    {
        $validatedData = $request->validated();

        // select * from users where email = 'aditya@adiranids.com' limit 1
        $user = User::where('email', $validatedData['email'])->first();

        Blog::create([
            'title' => $validatedData['title'],
            'article' => $validatedData['article'],
            'user_id' => $user->id
        ]);

        return redirect()->back();
    }
    
}
