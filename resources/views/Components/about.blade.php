@extends('layouts.Main')

@section('container')
    <h1>{{ $title }}</h1>
    <h3>{{ $Title }}</h3>
    <p>{{ $Body }}</p>
    <img src="{{ $image }}" alt="">
@endsection


