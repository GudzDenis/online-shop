<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Type;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  
  $posts = Post::with('types')->paginate(2);
  $types = Type::with('posts')->get();
  $user = Auth::user();
    return view('posts/index', ['posts' => $posts, 'types' =>$types, 'user' =>$user]);
});

Route::get('/posts/create', function(){
  $user = Auth::user();
  if($user && !strcmp($user->email,"dengudz04@gmail.com"))
  {
    return view('posts/create');
  }  
  else
  {
    return abort(404);
  }
});

Route::get('/posts/{id}/edit', function($id){
  $user = Auth::user();
  if($user && !strcmp($user->email,"dengudz04@gmail.com"))
  {
    $post = Post::with('types')->get()[$id-1];
    return view("posts/edit", ['post'=>$post]);
  }
  else
  {
    return abort(404);
  }
});

Route::get('/dashboard', function () {
   $user = Auth::user();
    return view('dashboard', ['user' => $user]);
})->middleware(['auth'])->name('dashboard');


Route::resource('posts', PostController::class);

Route::resource('types', TypeController::class);

Route::delete('posts/{id}', [PostController::class, 'destroy'])
  ->name('posts.destroy');

//Route::get('/main', [MainPageController::class])

// Route::get('types/{type}',TypeController::class)->name('types.show');


require __DIR__.'/auth.php';
