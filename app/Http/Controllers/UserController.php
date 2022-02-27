<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{

    public function show(User $author)
    {
        // @dd($id);
        return view('/Components/blog', [
            'title' => 'User Profile',
            'post' => $author->posts->load('category', 'author')
        ]);
    }
}
