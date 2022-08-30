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
		return view('admin.home')->with('success', 'movie created');
	}

	public function show()
	{
		$movies = Movie::all();
		// ddd($movies);
		return view('admin.movies.show', ['movies'=>$movies]);
	}

	public function edit(Movie $movie)
	{
		return view('admin.movies.edit', ['movie'=>$movie]);
	}

	public function update(Movie $movie)
	{
		// $newTranslations = request()->all('en', 'ka');
		$newTranslations = request()->validate([
			'en'=> ['required'],
			'ka'=> ['required'],
		]);

		$movie->replaceTranslations('title', $newTranslations);
		$movie->save();

		return back()->with('success', 'post updated');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();
		return back()->with('success', 'movie deleted');
	}
}
