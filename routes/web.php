<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminQuoteController;

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

Route::get('/admin', [AdminQuoteController::class, 'index']);
Route::get('/admin/quotes/create', [AdminQuoteController::class, 'create']);

Route::get('/', function () {
	return view('client.random-quote');
});

Route::get('/{movie}', function () {
	return view('client.quotes');
});
