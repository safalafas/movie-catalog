<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\MoviesUsersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

//Get Requests

Route::get('/', [MoviesController::class, 'index']);

Route::get('/movies', function () {
    return redirect('/');
});

Route::get('/movies/create', [MoviesController::class, 'create'])->middleware('auth');

Route::get('/movies/{movie}', [MoviesController::class, 'show']);

Route::get('/movies/{movie}/edit', [MoviesController::class, 'edit'])->middleware('auth');

Route::get('/register', [UsersController::class, 'create'])->middleware('guest');

Route::get('/users/{user}', [UsersController::class, 'show'])->middleware('auth');

Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->middleware('auth');

Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');

Route::get('/users', [UsersController::class, 'index'])->middleware('auth');

//Post Requests

Route::post('/movies', [MoviesController::class, 'store'])->middleware('auth');

Route::delete('/movies/{movie}', [MoviesController::class, 'destroy'])->middleware('auth');

Route::put('/movies/{movie}', [MoviesController::class, 'update'])->middleware('auth');

Route::post('/users', [UsersController::class, 'store'])->middleware('guest');

Route::delete('/users/{user}', [UsersController::class, 'destroy'])->middleware('auth');

Route::put('/users/{user}', [UsersController::class, 'update'])->middleware('auth');

Route::post('/logout', [UsersController::class, 'logout'])->middleware('auth');

Route::post('/users/authenticate', [UsersController::class, 'authenticate'])->middleware('guest');

Route::post('/like', [MoviesUsersController::class, 'store']);

Route::delete('/dislike', [MoviesUsersController::class, 'destroy']);
