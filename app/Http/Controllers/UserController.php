<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        // $categories = Category::get();
        return view('user.user_dashboard');
    }

    // public function store(Request $request)
    // {
        // $attr = $request->all();
        // $images = request()->file('image')->store("images");
        // $attr['image'] = $images;
        // Post::create($attr);
        // return back();
    // }

    // public function destroy(Post $id)
    // {
    //     Storage::delete($id->image);
    //     $id->delete();
    //     return back();
    // }
}
