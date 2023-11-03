<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserDetailsRequest;
use App\Models\Blog;

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

       

        // sql
        // insert into table "users" values (email, password) ....

        return "User created with email {$request->email}";
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
