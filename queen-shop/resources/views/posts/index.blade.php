
        @extends('layouts.app')

        @section('content')
        <section class="py-5 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light">Shop</h1>
              <p class="lead text-muted"></p>
              <p>
                <a href = "{{ route('posts.create') }}"  class="btn btn-primary my-2">Add</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
              </p>
            </div>
          </div>
        </section> 

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    
                    @foreach($posts as $post)
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{$post->title}}</text></svg>

                                <div class="card-body">
                                    <p class="card-text">{{$post->description}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href = "{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                            <a href = "{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form method = "POST" action = "{{ route('posts.destroy', $post)}}">
                                              @csrf
                                              @method('DELETE')
                                              <button type = "submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                            </form>
                                        </div>
                                        <small class="text-muted">{{ $post->price }} hrn</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach<br/>
                    {{$posts->links()}}
                </div>
            </div>
        </div>
        @endsection


