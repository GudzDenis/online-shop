@extends('layouts.app')

@section('content')
<form method="POST" action = "{{ route('posts.store')}}">
    @csrf
    @method('POST')
    <input type = "text" name = "title" placeholder="Title"/>
    <input type = "text" name = "description" placeholder="Description"/>
    <input type = "number" name = "price" placeholder="Price"/>
    <input type = "text" name = "type" placeholder = "Type"/>
    <button type ="submit">Add</button>
</form>
@endsection