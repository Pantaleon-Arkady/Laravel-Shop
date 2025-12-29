@extends('layouts.default')    

@section('header')
    @include('partials.shop-headers')
@endsection

@section('body-content')
    @auth
        @include('partials.auth.shop-home')
    @else
        @include('partials.auth.signup')
    @endauth
@endsection

@section('footer')
    @include('partials.footer')
@endsection