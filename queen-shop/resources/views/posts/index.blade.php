<p>
    welcome to <b><i><u><sup>queen-shop</sup></u></i></b>
</p>

@foreach($posts as $post)
    {{$post->title}} : {{$post->description}}<br>
@endforeach

@foreach($types as $type)
    id: {{$type->id}} name: {{$type->type}} 
    @foreach ($type->posts as $post)
        => {{$post->title}}<br>    
    @endforeach
@endforeach