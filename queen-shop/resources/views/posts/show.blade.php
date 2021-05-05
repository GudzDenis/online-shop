@extends('layouts.app')

@section('content')

<div>
    Title:
    {{$post->title}}<br>
    Price:
    {{$post->price}}
</div>

@endsection