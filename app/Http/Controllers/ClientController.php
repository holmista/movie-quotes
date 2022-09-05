<?php

namespace App\Http\Controllers;

use App\Models\Quote;

class ClientController extends Controller
{
	public function show()
	{
		$randomQuote = Quote::with('movie')->inRandomOrder()->first(); //->movie()->get();
		return view('client.random-quote', ['quote'=>$randomQuote]);
	}
}
