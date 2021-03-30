<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('admin.category', compact('category'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return back();
    }

    public function destroy(Category $id)
    {
        $id->delete();
        return back();
    }
}
