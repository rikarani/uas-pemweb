@extends('dashboard.layout.layout')

@section('header')
    <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
@endsection
