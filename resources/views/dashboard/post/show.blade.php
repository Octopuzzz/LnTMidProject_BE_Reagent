@extends('dashboard.layouts.main')

@section('container')
    <div class='container'>
        <div class="row my-4 justify-content-center">
            <div class="col-lg-10">
                <h2 class="mb-3">
                    {{ $post->title }}
                </h2>
                <a href="/dashboard/posts" class="btn btn-success">
                    <span data-feather="arrow-left"></span>Back to all my posts
                </a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">
                    <span data-feather="edit"></span>Edit
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline ">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                        <span data-feather="x-circle"></span>Delete
                    </button>
                </form>
                <img src="https://source.unsplash.com/1600x900/?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->category->name }}">
                <p>{!! $post->body !!}</p>
            </div>
        </div>
    </div>
@endsection
