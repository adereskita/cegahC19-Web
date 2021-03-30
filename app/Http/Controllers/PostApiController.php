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
}
