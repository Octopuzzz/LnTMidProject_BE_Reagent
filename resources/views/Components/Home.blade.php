@extends('layouts.Main')

@section('container')
    <h1>{{ $title }}</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="{{ $image }}" alt="">
@endsection
