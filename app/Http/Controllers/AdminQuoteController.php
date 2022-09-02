<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Movie;
use Illuminate\Http\Request;

class AdminQuoteController extends Controller
{
	// add data and pagination
	public function show()
	{
		$quotes = Quote::latest()->get();
		return view('admin.quotes.show', ['quotes'=>$quotes]);
	}

	public function create()
	{
		$movies = Movie::latest()->get();
		return view('admin.quotes.create', ['movies'=>$movies]);
	}

	public function store(Request $request)
	{
		$path = request()->file('thumbnail')->store('thumbnails');
		Quote::create([
			'body'=> [
				'en'=> $request->en,
				'ka'=> $request->ka,
			],
			'movie_id'    => $request->movie,
			'thumbnail'   => $path,
		]);

		return redirect()->route('quotes.show');
	}

	public function destroy(Quote $quote)
	{
		$quote->delete();
		return redirect()->route('quotes.show');
	}

	public function edit(Quote $quote)
	{
		$movies = Movie::latest()->get();
		return view('admin.quotes.edit', ['quote'=>$quote, 'movies'=>$movies]);
	}
}
