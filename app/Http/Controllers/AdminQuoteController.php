<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Movie;

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
}
