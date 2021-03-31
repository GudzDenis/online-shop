<h1>{{$type->type}}</h1>

@foreach($type->posts as $post)
    <a href = " {{ route('posts.show', $post ) }}">{{$post->title}}</a><br>
@endforeach