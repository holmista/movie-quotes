<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminQuoteController;
use App\Http\Controllers\AdminMovieController;

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

// Route::get('/admin', [AdminQuoteController::class, 'index']);
// Route::get('/admin/quotes/create', [AdminQuoteController::class, 'create']);

Route::get('/admin/movies', [AdminMovieController::class, 'show'])->name('getMovies');
Route::get('/admin/movies/create', [AdminMovieController::class, 'create'])->name('createMovie');
Route::get('/admin/movies/edit/{movie}', [AdminMovieController::class, 'edit'])->name('editMovie');

Route::post('/admin/movies', [AdminMovieController::class, 'store']);

Route::patch('/admin/movies/{movie}', [AdminMovieController::class, 'update']);

Route::delete('/admin/movies/{movie}', [AdminMovieController::class, 'destroy']);
