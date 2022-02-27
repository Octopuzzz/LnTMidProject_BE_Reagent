<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstwhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('Components/blog', [
            'title' => 'All Book' . $title,
            'status' => 'Blog',
            'post' => Post::latest()->filter(request(['search', 'category', 'author']))
                ->paginate(9)->withQueryString()

        ]);
    }
    public function show(Post $post)
    {
        return view('Post', [
            'title' => 'Single_Post',
            'post' => $post
        ]);
    }
}
