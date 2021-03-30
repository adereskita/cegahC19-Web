<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('user.lending', compact('posts'));
    }

    public function show(Post $posts)
    {
        return view('user.show_article', compact('posts'));
    }

    public function login()
    {
        return view('user.login');
    }
}
