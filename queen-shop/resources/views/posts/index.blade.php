
        @extends('layouts.app')

        @section('content')
        <section class="py-5 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light">Shop</h1>
              <p class="lead text-muted"></p>
              <p>
                @if($user && $user->email == "dengudz04@gmail.com")
                  <a href = "{{ route('posts.create') }}"  class="btn btn-primary my-2">Add</a><br/>
                @endif
                <h1 class="fw-light">Filter</h1>
                <form method = "GET" action = "{{ route('posts.index')}}">
                  @csrf
                  <input name = "title" type = "text" placeholder = "Title"/>
                  <select name = "type">
                    <option></option>
                    @foreach($types as $type)

                        <option>{{$type->type}}</option>
                    @endforeach
                  </select><br/>                  

                  <input name = "price_from" type = "number" placeholder = "Price(from)"/>
                  <input name = "price_to" type = "number" placeholder = "Price(to)"/><br/>

                  <button class="btn btn-primary my-2">Show</button>
                </form>
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
                                            @if ($user &&  $user->email == "dengudz04@gmail.com")
                                              <a href = "{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">Edit</a>                                                                                            
                                              
                                              <form method = "POST" action = "{{ route('posts.destroy', $post)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type = "submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                              </form>
                                            @endif
                                        </div>
                                        <small class="text-muted">{{ $post->price/100 }} hrn</small>
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


