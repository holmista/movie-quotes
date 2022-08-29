<?php

namespace App\Http\Controllers;

class AdminQuoteController extends Controller
{
	// add data and pagination
	public function index()
	{
		return view('admin.quotes.index');
	}

	public function create()
	{
		return view('admin.quotes.create');
	}
}
