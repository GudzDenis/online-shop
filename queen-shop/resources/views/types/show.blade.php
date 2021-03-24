<h1>{{$type->type}}</h1>

@foreach($type->posts as $post)
    {{$post->title}}<br>
@endforeach