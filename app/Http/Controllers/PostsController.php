<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
        


        return view('post', [
             // Select * from Post, Where slug = $slug, return first result. else fail
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
