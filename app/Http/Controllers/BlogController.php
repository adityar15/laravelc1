<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCreateRequest;

class BlogController extends Controller
{
    public function createArticle(BlogCreateRequest $request)
    {
        $validatedData = $request->validated();

        /**
         * @var User
         */
        $user = auth()->user();

        $roles = $user->roles()->get();

        $flag = true;

        // checks if user is either admin or editor
        // allows only admin and editor to create articles
 
        foreach($roles as $role)
        {
            if($role->name != "admin" && $role->name != "editor")
            {
                $flag = false;
            }
            else {
                $flag = true;
                break;
            }
        }
       
        if($flag)
        {
            $blog = Blog::create([
                        'title' => $validatedData['title'],
                        'slug' => $validatedData['slug'],
                        'article' => $validatedData['article'],
                        'user_id' => $user->id
            ]);

            return redirect()->back();
        }

        

        // this is with assumption that registered user is adding an article
      
    }


    public function show(Request $request)
    {
        // all the data
        // chunk on the server 
        // send chunks to the client
        //  send the next chunk on demand

        // with you can have eager loading
        $blogs  = Blog::with([
            'author' => fn($q) => $q->select('id', 'name') 
        ])->paginate(10);

        return Inertia::render('Blogs', ['blogs' => $blogs]);
    }

    public function showArticle(string $slug)
    {
        $blog = Blog::where('slug', $slug)->with([
            'author' => fn($q) => $q->select('id', 'name') 
        ])->first();
   
        return Inertia::render('Article', ['article' => $blog]);
    }

}

// function ($q)
// {
//     return $q->select('id', 'name');
// }


// 10 articles -> 10 requests
// 1 query to get articles
// n queries to get authors
// n + 1 problem 

// 1 query or n queries try to make sure that n is min.