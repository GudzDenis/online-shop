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

    return view('posts/index', ['posts' => $posts, 'types' =>$types]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::resource('posts', PostController::class);

Route::resource('types', TypeController::class);

Route::delete('posts/{id}', [PostController::class, 'destroy'])
  ->name('posts.destroy');

//Route::get('/main', [MainPageController::class])

// Route::get('types/{type}',TypeController::class)->name('types.show');

require __DIR__.'/auth.php';
