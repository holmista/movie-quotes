<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class AdminMovieController extends Controller
{
	public function create()
	{
		return view('admin.movies.create');
	}

	public function store()
	{
		ddd(request()->all());
		Movie::create(request());
	}

	public function destroy()
	{
	}
}
