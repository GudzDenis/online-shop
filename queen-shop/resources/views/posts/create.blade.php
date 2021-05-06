@extends('layouts.app')

@section('content')
<form method="POST" action = "{{ route('posts.store')}}">
    @csrf
    @method('POST')
    <input type = "text" name = "title" placeholder="Title"/>
    <input type = "text" name = "description" placeholder="Description"/>
    <input type = "number" name = "price" placeholder="Price"/>
    <select name = "type">
        @foreach( $types as $type)
            <option>{{$type->type}}</option>
        @endforeach
    <select>
    <button type ="submit">Add</button>
</form>
@endsection