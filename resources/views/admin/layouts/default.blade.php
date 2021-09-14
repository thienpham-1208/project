@extends('layouts.default')

@section('appCss')
    <link rel="stylesheet" href="{{ asset(mix('css/admin.style.css')) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset(mix('css/admin.header.css')) }}" type="text/css">
    @yield('css')
@endsection

@section('appNav')
    @include('admin.layouts.nav')
@endsection

@section('header')
    @include('admin.layouts.header')
@endsection

@section('appContent')
    <div class="management-main">
        <div class="container">
            @yield('content')
        </div>
    </div>
@endsection

@section('footer')
    @include('admin.layouts.footer')
@endsection

@section('appScript')
    @yield('scripts')
@endsection
