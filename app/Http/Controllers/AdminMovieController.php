<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StorePostRequest;

class AdminMovieController extends Controller
{
	public function create()
	{
		return view('admin.movies.create');
	}

	public function store(StorePostRequest $request)
	{
		Movie::create([
			'title' => [
				'en' => $request->title_en,
				'ka' => $request->title_ka,
			],
		]);
		return view('admin.home');
	}

	public function show()
	{
		$movies = Movie::all();
		return view('admin.movies.show', ['movies'=>$movies]);
	}

	public function destroy()
	{
	}
}
