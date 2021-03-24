Title:
{{$post->title}}<br>
Price:
{{$post->price}}
<a href = "{{ route('posts.edit', $post) }}">Edit</a>