@extends('app')

@section('body')

    <div class="sidebar"> @include('menu')</div>
    <div class="content">@yield('content')</div>

@endsection
