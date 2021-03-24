<p>
    welcome to <b><i><u><sup>queen-shop</sup></u></i></b>
</p>
<h1>Shoes</h1>
@foreach($posts as $post)
    <a href = "{{ route('posts.show', $post) }}">{{$post->title}}</a> : {{$post->description}}<br>
@endforeach

<h1>Types</h1>
@foreach($types as $type)
    id: {{$type->id}} name: <a href = "{{ route('types.show', $type) }}">{{$type->type}}</a><br> 
@endforeach
