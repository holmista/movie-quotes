<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminQuoteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleController;

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

// admin movies routes
Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('movies.index');
Route::get('/admin/movies/create', [AdminMovieController::class, 'create'])->name('movies.create');
Route::post('/admin/movies', [AdminMovieController::class, 'store'])->name('movies.store');
Route::get('/admin/movies/{movie}', [AdminMovieController::class, 'edit'])->name('movies.edit');
Route::patch('/admin/movies/{movie}', [AdminMovieController::class, 'update'])->name('movies.update');
Route::delete('/admin/movies/{movie}', [AdminMovieController::class, 'destroy'])->name('movies.destroy');
Route::get('/admin/{movie}/quotes', [AdminMovieController::class, 'showQuotes'])->name('movie.show_quotes');

// admin auth routes
Route::view('/admin/signin', 'admin.sign-in')->name('admin.sign_in');
Route::post('/admin/signin', [AuthController::class, 'signin'])->name('auth.signin');

// admin quotes routes
Route::get('/admin', [AdminQuoteController::class, 'index'])->name('quotes.index');
Route::get('/admin/quotes/create', [AdminQuoteController::class, 'create'])->name('quotes.create');
Route::post('/admin/quotes', [AdminQuoteController::class, 'store'])->name('quotes.store');
Route::get('/admin/quotes/{quote}', [AdminQuoteController::class, 'edit'])->name('quotes.edit');
Route::delete('/admin/quotes/{quote}', [AdminQuoteController::class, 'destroy'])->name('quotes.destroy');
Route::patch('/admin/quotes/{quote}', [AdminQuoteController::class, 'update'])->name('quotes.update');

// client routes
Route::view('/', 'client.random-quote')->name('client.show');
Route::view('/{movie}', 'client.quotes')->name('client.index');

// locale routes
Route::get('/language/{locale}', [LocaleController::class, 'change'])->name('locale.change');
