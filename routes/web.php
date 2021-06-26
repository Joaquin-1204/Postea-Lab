<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use App\Mail\BienvenidoMailable;
use Illuminate\Support\Facades\Mail;

Route::get('/', function() {
    return redirect('/posts');
});
Route::get('/home', function() {
    return redirect('/posts');
});

Route::get('/posts', [PostController::class, 'index']);
Route::view('/posts/create', 'posts.create');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/myPosts', [PostController::class, 'userPosts']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::post('/comments', [CommentController::class, 'store']);

Auth::routes();

Route::get(
    '/home',
    [App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('bienvenido', function (){
    $correo = new BienvenidoMailable;
    Mail::to('joaquin.salas@tecsup.edu.pe')->send($correo);

    return "Mensaje de bienvenida enviado";
});
