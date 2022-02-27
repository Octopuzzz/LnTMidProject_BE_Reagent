@extends('layouts.Main')

@section('container')
<article class='mb-5'>

    <h2>Post Category : {{$category}}</h2>
    @foreach($post as $posts)
    <h3>
        <a href="/Post/{{ $posts->slug }}">{{ $posts->title }}</a>
    </h3>
    <p>{{ $posts->excerpt }}</p>
    @endforeach

    </article>
    <a href="/categories">Back To Categories</a>
@endsection
