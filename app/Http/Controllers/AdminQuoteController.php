<?php

namespace App\Http\Controllers;

use App\Models\Quote;

class AdminQuoteController extends Controller
{
	// add data and pagination
	public function show()
	{
		$quotes = Quote::latest();
		return view('admin.quotes.show', ['quotes'=>$quotes]);
	}

	public function create()
	{
		return view('admin.quotes.create');
	}
}
