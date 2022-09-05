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
Route::prefix('/admin')->group(function () {
	Route::middleware(['auth'])->group(function () {
		Route::controller(AdminMovieController::class)->group(function () {
			Route::get('/movies', 'index')->name('movies.index');
			Route::get('/movies/create', 'create')->name('movies.create');
			Route::post('/movies', 'store')->name('movies.store');
			Route::get('/movies/{movie}', 'edit')->name('movies.edit');
			Route::patch('/movies/{movie}', 'update')->name('movies.update');
			Route::delete('/movies/{movie}', 'destroy')->name('movies.destroy');
			Route::get('/{movie}/quotes', 'showQuotes')->name('movie.show_quotes');
		});

		Route::controller(AdminQuoteController::class)->group(function () {
			Route::get('/', 'index')->name('quotes.index');
			Route::get('/quotes/create', 'create')->name('quotes.create');
			Route::post('/quotes', 'store')->name('quotes.store');
			Route::get('/quotes/{quote}', 'edit')->name('quotes.edit');
			Route::delete('/quotes/{quote}', 'destroy')->name('quotes.destroy');
			Route::patch('/quotes/{quote}', 'update')->name('quotes.update');
		});
	});

	Route::view('/signin', 'admin.sign-in')->name('admin.sign_in');
	Route::controller(AuthController::class)->group(function () {
		Route::post('/signin', 'signin')->name('auth.signin');
	});
});

Route::controller(ClientController::class)->group(function () {
	Route::get('/', 'show')->name('client.show');
	Route::get('/{movie}', 'index')->name('client.index');
});

Route::controller(LocaleController::class)->group(function () {
	Route::get('/language/{locale}', 'change')->name('locale.change');
});
