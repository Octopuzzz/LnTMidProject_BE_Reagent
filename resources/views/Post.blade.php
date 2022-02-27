@extends('layouts.Main')

@section('container')
    <div class='mb-5 justify-content-center'>
        <div class="row ">
            <div class="col-mid-8">
                <h2 class="mb-3">
                    {{ $post->title }}
                </h2>
                <p>By <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a>
                    in <a href="/blog?category={{ $post->category->slug }}" class='text-decoration-none'>
                        {{ $post->category->name }}</a>
                </p>
                <img src="https://source.unsplash.com/1600x900/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                <p>{!! $post->body !!}</p>
                <a href="/blog" class="d-block mt-3">Back To Blog</a>
            </div>
        </div>
    </div>
@endsection
