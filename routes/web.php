<?php

use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

Route::get('/laravel-welcome', function () {
    return view('welcome');
});

Route::get('/home', [GeneralController::class, 'homePage']);

Route::get('/another-home', function () {
    return view('pages.another');
});

Route::get('/about', function () {
    return view('about');
});

Route::post('/choose-that-pokemon', [GeneralController::class, 'choosePokemon']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {

    $allPosts = Post::all();
    $userPosts = [];
    $userId = Auth::id();

    if (Auth::check()) {
        /* To be fixed */
        // $userPosts = Auth::user()->userPosts()->latest()->get();
        // VSCode reading capability is limited, 
        $userPosts = Post::where('user_id', $userId)->get();
    }

    return view('home', ['allPosts' => $allPosts, 'userPosts' => $userPosts, 'userId' => $userId]);
});

// Quick CRUD Users

Route::post('/user-register', [CrudUserController::class, 'userRegister']);
Route::post('/user-login', [CrudUserController::class, 'userLogin']);
Route::get('/user-logout', [CrudUserController::class, 'userLogout']);

// Quick CRUD Posts

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'editPost']);
Route::put('/update-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

