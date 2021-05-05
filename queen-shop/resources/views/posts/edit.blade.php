@extends('layouts.app')

@section('content')
<form method="POST" action = "{{ route( 'posts.update', $post)}}">
    @csrf
    @method('PUT')
    <input type = "text" name = "title" value = "{{$post->title}}"/>
    <input type = "text" name = "description" value = "{{$post->description}}"/>
    <input type = "number" name = "price" value = "{{$post->price}}"/>
    <button>Edit</button>
</form>
@endsection