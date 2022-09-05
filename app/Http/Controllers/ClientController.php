<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Movie;
use Illuminate\View\View;

class ClientController extends Controller
{
	public function show(): View
	{
		$randomQuote = Quote::with('movie')->inRandomOrder()->first();
		return view('client.random-quote', ['quote'=>$randomQuote]);
	}

	public function index(Movie $movie): View
	{
		$movieQuotes = Movie::with('quotes')->where(['id'=>$movie->id])->orderBy('created_at', 'desc')->firstOrFail();
		return view('client.quotes', ['movieQuotes'=>$movieQuotes]);
	}
}
