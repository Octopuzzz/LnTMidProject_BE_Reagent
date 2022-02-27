@extends('layouts.Main')

@section('container')
<h1 class="mb-5 text-center">
    {{ $title }}
</h1>
<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog">
            @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @elseif(request('author'))
            <input type="hidden" name="author" value="{{ request('author')}}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search"placeholder="Search"
                value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Button</button>
            </div>
        </form>
    </div>
</div>
    @if($post->count())
        <div class="card mb-3">
            <a href="Post/{{ $post[0]->slug }}" class="text-decoration-none text-dark"><img src="https://source.unsplash.com/1200x400/?{{ $post[0]->category->name }}" class="card-img-top" alt="..."></a>
            <div class="card-body text-center">
            <h3 class="card-title">{{ $post[0]->title }}</h3>
            <p>By <a href="/blog?author={{ $post[0]->author->username }}" class="text-decoration-none"> {{ $post[0]->author->name }}</a>
                <small>
                    in <a href="/blog?category={{ $post[0]->category->slug }}" class='text-decoration-none'>
                        {{ $post[0]->category->name }}</a>
                        {{ $post[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $post[0]->excerpt }}</p>
            <a href="/Post/{{ $post[0]->slug }}" class='text-decoration-none btn btn-outline-success'>
                Read More...</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach($post->skip(1) as $k)
                <div class="col mb-3">
                    <div class="card" style="width: 18rem;">
                        <div class="position-absolute bg-dark px-3 py-2" style="opacity:0.75;"><a href="" class="text-decoration-none text-white">{{ $k->category->name }}
                        </a></div>
                        <a href="Post/{{ $k->slug }}" class="text-decoration-none text-dark"><img src="https://source.unsplash.com/400x250/?{{ $k->category->name }}" class="card-img-top" alt="{{ $k->category->name }}"></a>
                        <div class="card-body">
                        <h3 class="card-title">{{ $k->title }}</h3>
                        <small>
                        <p>By <a href="/blog?author={{ $k->author->username }}" class="text-decoration-none"> {{ $k->author->name }}</a>
                                    {{ $k->created_at->diffForHumans() }}
                                    in <a href="/blog?category={{ $k->category->slug }}" class='text-decoration-none'>
                                        {{ $k->category->name }}</a>
                                        {{ $k->created_at->diffForHumans() }}
                                </p>
                            </small>
                        <p class="card-text">{{ $k->excerpt }}</p>
                        <a href="/Post/{{ $k->slug }}" class='text-decoration-none btn btn-outline-success'>
                            Read More...</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post File</p>
    @endif
    <div class='d-flex justify-content-end'>
        {{ $post->links() }}
    </div>
{{--
    @foreach($post->skip(1) as $k)
    <article class='mb-5 border-bottom border-danger pb-4'>
        <h2>
            <a href="/Post/{{ $k->slug }}" class='text-decoration-none'>{{ $k->title }}</a>
        </h2>
        <p>By <a href="/authors/{{ $k->author->username }}" class="text-decoration-none"> {{ $k->author->name }}</a>
            in <a href="/categories/{{ $k->category->slug }}" class='text-decoration-none'>
                {{ $k->category->name }}</a>
        </p>
        <p>{{ $k->excerpt }}</p>
        <a href="/Post/{{ $k->slug }}" class='text-decoration-none'>
            Read More...</a>
    </article>
    @endforeach --}}
@endsection

