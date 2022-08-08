<?php

use App\Http\Controllers\MoviesController;
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

Route::get('/', [MoviesController::class, 'index']);

Route::get('/movies/create', [MoviesController::class, 'create']);

Route::post('/movies', [MoviesController::class, 'store']);

Route::get('/movies/{movie}', [MoviesController::class, 'show']);

Route::get('/movies/{movie}/edit', [MoviesController::class, 'edit']);

Route::delete('/movies/{movie}', [MoviesController::class, 'destroy']);

Route::put('/movies/{movie}', [MoviesController::class, 'update']);

Route::get('/register', [UsersController::class, 'create']);

Route::get('/users', [UsersController::class, 'index']);

Route::post('/users', [UsersController::class, 'store']);

Route::get('/users/{user}', [UsersController::class, 'show']);

Route::get('/users/{user}/edit', [UsersController::class, 'edit']);

Route::delete('/users/{user}', [UsersController::class, 'destroy']);

Route::put('/users/{user}', [UsersController::class, 'update']);
