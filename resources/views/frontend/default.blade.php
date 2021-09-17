@extends('layouts.default')

@section('appCss')
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @yield('css')
@endsection

@section('additional-class', 'frontend')
@section('header')
    @include('frontend.header')
@endsection

@section('appScript')

    @yield('scripts')
@endsection
