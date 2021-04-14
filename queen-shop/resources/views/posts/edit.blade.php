@extends('layouts.app')

@section('content')

<form method="POST" action = "{{ route( 'posts.update', $post)}}">
    @csrf
    @method('PUT')
    <input type = "text" name = "title" value = "{{$post->title}}"/><br/>
    <input type = "text" name = "description" value = "{{$post->description}}"/><br/>
    <input type = "number" name = "price" value = "{{$post->price}}"/><br/>
    <button>Edit</button>
</form>

@endsection