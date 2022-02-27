<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('components/category', [
            'title' => 'Post Category',
            'post' => $category
        ]);
    }
    public function one(Category $category)
    {
        return view('components/blog', [
            'title' => $category->name,
            'post' => $category->posts,
            'category' => $category->name
        ]);
    }
    public function index()
    {
        return view('components/categories', [
            'title' => 'Categories',
            'category' => Category::all()
        ]);
    }
}
