<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchTitle = request('title', '');
        $searchType = request('type', '');
        $searchPriceFrom = request('price_from', 0);
        $searchPriceTo = request('price_to', 0);

        //dd($searchTitle);

        $posts = Post::with('types');
        $types = type::with('posts');

        if( $searchTitle != '')
        {
            $posts = $posts->where('posts.title', 'like', '%'.$searchTitle.'%' );
        }

        if( $searchType != '')
        {
            $id = $types->select('types.id')->where('type', $searchType)->get()[0]->id;
            $posts = $posts->where( 'type_id', $id );
        }

        if( $searchPriceFrom )
        {
            $posts = $posts->where('price','>', $searchPriceFrom);
        }

        if( $searchPriceTo )
        {
            $posts = $posts->where('price','<', $searchPriceTo);
        }

        $posts = $posts->paginate(2);
        $types = $types->get();
        $user = Auth::user();

        return view('posts.index', ['posts' => $posts, 'types' =>$types, 'user' =>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::with('posts')->get();

        return view('posts.create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $types = Type::with('posts')->get();

        $res = false;

        $storeType;


        foreach( $types as $type )
        {
            if( !( strcasecmp($type->type, $request->input('type') ) ) )
            {
                $storeType = $type->id;
                $res = true;
                break;
            }
        }

        if(!$res)
        {
            return view('posts.create',  ['types' => $types]);
        }

        if( !$sizes )
        {
            return view('posts.create',  ['types' => $types]);
        }

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'price' => 'required|integer',
        ]);


        $sizes = [];

        for( $i = 385; $i<=480; $i+=5)
        {
            $size = $request->input("$i");
            if( $size != NULL)
            {
                array_push($sizes, $size);
            }
        }

        $post = Post::create(
            ["title"=>$request->input('title'),
            "description"=>$request->input('description'),
            "price"=>$request->input('price'),
            "type_id"=>$storeType]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $types = Type::with('posts')->get();

        return view('posts.show', ['post' => $post, 'types' => $types]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $types = Type::with('posts')->get();

        return view('posts.edit', ['post' => $post, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'price' => 'required|integer',
        ]);

        $post->fill( $request->all() );
        $post->save();

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts');
    }
}
