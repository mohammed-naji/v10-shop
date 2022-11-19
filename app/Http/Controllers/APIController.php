<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function get_posts()
    {

        // $posts = Http::get('https://jsonplaceholder.typicode.com/posts');

        // $posts = $posts->json();

        // return view('api.posts', compact('posts'));
        return view('api.posts');
    }
}
