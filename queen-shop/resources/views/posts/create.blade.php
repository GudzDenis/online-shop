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
    <br/>
    @for ( $i = 385; $i <= 480; $i+=5 )
        {{$i/10}}<input type = "checkbox" value = "{{$i/10}}" name = "{{$i}}"/><br/>
    @endfor
    <button type ="submit">Add</button>
</form>
@endsection