<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminQuoteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
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

Route::middleware(['auth'])->group(function () {
	Route::controller(AdminMovieController::class)->group(function () {
		Route::get('/admin/movies', 'index')->name('movies.index');
		Route::get('/admin/movies/create', 'create')->name('movies.create');
		Route::post('/admin/movies', 'store')->name('movies.store');
		Route::get('/admin/movies/{movie}', 'edit')->name('movies.edit');
		Route::patch('/admin/movies/{movie}', 'update')->name('movies.update');
		Route::delete('/admin/movies/{movie}', 'destroy')->name('movies.destroy');
		Route::get('/admin/{movie}/quotes', 'showQuotes')->name('movie.show_quotes');
	});

	Route::controller(AdminQuoteController::class)->group(function () {
		Route::get('/admin', 'index')->name('quotes.index');
		Route::get('/admin/quotes/create', 'create')->name('quotes.create');
		Route::post('/admin/quotes', [AdminQuoteController::class, 'store'])->name('quotes.store');
		Route::get('/admin/quotes/{quote}', [AdminQuoteController::class, 'edit'])->name('quotes.edit');
		Route::delete('/admin/quotes/{quote}', [AdminQuoteController::class, 'destroy'])->name('quotes.destroy');
		Route::patch('/admin/quotes/{quote}', [AdminQuoteController::class, 'update'])->name('quotes.update');
	});
});

Route::view('/admin/signin', 'admin.sign-in')->name('admin.sign_in');
Route::controller(AuthController::class)->group(function () {
	Route::post('/admin/signin', 'signin')->name('auth.signin');
});

Route::controller(ClientController::class)->group(function () {
	Route::get('/', 'show')->name('client.show');
	Route::get('/{movie}', 'index')->name('client.index');
});

Route::controller(LocaleController::class)->group(function () {
	Route::get('/language/{locale}', 'change')->name('locale.change');
});
