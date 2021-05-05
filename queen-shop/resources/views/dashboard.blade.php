@extends('layouts.app')

@section('content')
    Hello, {{$user->name}}!
    <a href="{{ route('posts.index', ['user' => $user]) }}" class="navbar-brand d-flex align-items-center">Shop</a>
@endsection
