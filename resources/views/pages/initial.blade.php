@extends('layouts.default')    

@section('header')
    @include('partials.headers')
@endsection

@section('body-content')
    @auth
        @include('partials.auth.home')
    @else
        @include('partials.auth.signup')
    @endauth
@endsection

@section('footer')
    @include('partials.footer')
@endsection