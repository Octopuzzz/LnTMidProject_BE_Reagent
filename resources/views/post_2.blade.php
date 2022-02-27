@extends('layouts.Main')

@section('container')
    <article class='mb-5'>
        <h2>
            {{ $category}}
        </h2>
        <h5>{{ $post['author'] }}</h5>
        <p>{{ $post['body'] }}</p>
    </article>
    <a href="/blog">Back To Blog</a>
@endsection
