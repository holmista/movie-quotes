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
		return redirect()->route('getMovies', ['movies'=>Movie::latest()->get()])->with('success', 'movie created');
	}

	public function show()
	{
		$movies = Movie::latest();
		if (request('search'))
		{
			$movies->where('title->en', 'like', '%' . request('search') . '%')
			->orWhere('title->ka', 'like', '%' . request('search') . '%');
		}

		return view('admin.movies.show', ['movies'=>$movies->get()]);
	}

	public function edit(Movie $movie)
	{
		return view('admin.movies.edit', ['movie'=>$movie]);
	}

	public function update(Movie $movie)
	{
		$newTranslations = request()->validate([
			'en'=> ['required'],
			'ka'=> ['required'],
		]);

		$movie->replaceTranslations('title', $newTranslations);
		$movie->save();

		return redirect()->route('getMovies', ['movies'=>Movie::latest()->get()])->with('success', 'movie updated');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();

		return redirect()->route('getMovies', ['movies'=>Movie::latest()->get()])->with('success', 'movie deleted');
	}
}
