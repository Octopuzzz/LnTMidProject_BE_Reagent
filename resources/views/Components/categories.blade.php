@extends('layouts.main')

@section('container')
@if($category->count())
<div class="container">
    <div class="row">
        @foreach($category as $k)
        <div class="col-md-4">
            <a href="/blog?category={{ $k->slug }}">
                <div class="card bg-dark text-white">
                    <img src="https://source.unsplash.com/500x500/?{{ $k->name }}" class="card-img" alt="{{ $k->name }}">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="text-center card-title bg-dark flex-fill p-4 fs-4 opacity-75">{{ $k->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">No Categories</h5>
                    <p class="card-text">There are no categories to display</p>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
