<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'oke',
            'data' => Post::all()
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json([
            'status' => 'oke',
            'data' => $post
        ]);
    }

    public function destroy(Post $id)
    {
        $post = $id->delete();
        return response()->json([
            'status' => 'data berhasil dihapus.',
            'data' => $post
        ]);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json([
            'status' => 'data berhasil ditambahkan.',
            'data' => $post
        ]);
    }

    public function update(Request $request, Post $id)
    {
        $post = $id->update($request->all());
        return response()->json([
            'status' => 'data berhasil diubah.',
            'data' => $post
        ]);
    }
}
