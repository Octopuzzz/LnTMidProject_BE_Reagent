<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.post.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:20|min:5',
            'slug' => 'required|max:255|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit($request->body, 100);
        Post::create($validateData);
        return redirect('/dashboard/posts')->with('success', 'New Post Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $Post)
    {
        return view('dashboard.post.show', [
            'post' => $Post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $Post)
    {
        return view('dashboard.post.edit', [
            'post' => $Post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $Post)
    {
        $rules = [
            'title' => 'required|max:20|min:5',
            'category_id' => 'required|',
            // 'slug' => 'required|max:255|unique:posts',
            'body' => 'required'
        ];
        if (Request('slug') != $Post->slug) {
            $rules['slug'] = 'required|max:255|unique:posts';
        }
        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit($request->body, 100);
        // Post::updateOrCreate($validateData);
        Post::where('id', $Post->id)->update($validateData);
        return redirect('/dashboard/posts')->with('success', 'Post has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $Post)
    {
        Post::destroy($Post->id);
        return redirect('/dashboard/posts')->with('success', 'Post Has been successfully deleted');
    }
    public function checkslug(Request $request, Post $Post)
    {
        foreach ($Post as $check) {
            if ($check->slug == $request->slug) {
                return "Slug Must Be Unique !";
            } else if ($check->category_id == $Post->category_id) {
                $flag = true;
            }
        }
        if (isset($flag) && $flag == true)
            return $request;
        else
            return "Failed";
    }
}
