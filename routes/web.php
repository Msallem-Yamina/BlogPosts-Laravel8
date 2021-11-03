<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


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

    //afficher juste les publications en mode public (stat= 0// stat = 1 par defaut pub privee)
    $p = Post::where ('stat', '0')
    ->orderBy('created_at','desc')
    ->get();
    return view('welcome')->with('posts', $p);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/client/post/add',[PostController::class, 'addpost'])->name('addpost')->middleware('auth');
Route::get('/client/allposts',[PostController::class, 'index'])->name('Posts')->middleware('auth');
Route::post('/client/addpost',[PostController::class, 'store'])->name('storepost')->middleware('auth');

Route::get('/AllPosts',[PostController::class, 'postlist'])->name('Allposts');

Route::get('/post/{id}',[PostController::class, 'showPost'])->name('showPost');

Route::post('/post/comment',[CommentController::class, 'AddComment'])->name('AddComment')->middleware('auth');

Route::get('/deletepost/{id}',[PostController::class, 'deletepost'])->name('deletepost');

Route::get('/profile', [PostController::class, 'profile']);

Route::post('/changepass',  [HomeController::class,'changePassword'])->name('changePassword');

Route::get('/comments', [CommentController::class, 'touscomments'])->name('touscomments');

Route::post('/profile/edit',  [HomeController::class,'editProfile'])->name('editProfile');
Route::get('/listeusers', [HomeController::class, 'listeUsers'])->name('users');

