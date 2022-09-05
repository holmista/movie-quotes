<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Movie;

class ClientController extends Controller
{
	public function show()
	{
		$randomQuote = Quote::with('movie')->inRandomOrder()->first(); //->movie()->get();
		return view('client.random-quote', ['quote'=>$randomQuote]);
	}

	public function index(Movie $movie)
	{
		$movieQuotes = Movie::with('quotes')->where(['id'=>$movie->id])->orderBy('created_at', 'desc')->firstOrFail();
		return view('client.quotes', ['movieQuotes'=>$movieQuotes]);
	}
}
