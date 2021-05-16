@extends('layouts.app')

@section('content')

<div>
    Title:
    {{$post->title}}<br>
    Price:
    {{$post->price}}
    <br/>
    Sizes:<br/>

    @foreach ($post->sizes as $size )
        EU: {{$size->size_eu/10}} CM: {{$size->size_cm/10}}<br/>    
    @endforeach
</div>

@endsection