<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\userCovid;
use Illuminate\Support\Facades\Session;
use Laravolt\Indonesia\Models\Province;

class PostController extends Controller
{
    public function index()
    {
        $user = userCovid::paginate(5);

        $provinces = Province::pluck('name', 'id');

        $posts = Post::all();
        $categories = Category::get();
        return view('admin.dashboard', [
            'provinces' => $provinces,
            'user' => $user,
            'posts' => $posts,
            'categories' => $categories
        ]);
        // return view('admin.dashboard', compact('posts', 'categories'));
    }

    public function store(Request $request)
    {
        $attr = $request->all();
        $images = request()->file('image')->store("images");
        $attr['image'] = $images;
        Post::create($attr);
        return back();
    }

    public function destroy(Post $id)
    {
        Storage::delete($id->image);
        $id->delete();
        return back();
    }
}
