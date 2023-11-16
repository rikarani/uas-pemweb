@extends('layout.layout')

@section('content')
    <h1>Halo, {{ auth()->user()->name }}</h1>
@endsection
