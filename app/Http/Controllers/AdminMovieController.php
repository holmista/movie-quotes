<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;

class AdminMovieController extends Controller
{
	public function create()
	{
		return view('admin.movies.create');
	}

	public function store(StoreMovieRequest $request)
	{
		Movie::create([
			'title' => [
				'en' => $request->en,
				'ka' => $request->ka,
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

	public function update(StoreMovieRequest $request, $id)
	{
		Movie::where('id', $id)->update(['title' => [
			'en' => $request->en,
			'ka' => $request->ka,
		]]);

		return redirect()->route('getMovies', ['movies'=>Movie::latest()->get()])->with('success', 'movie updated');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();

		return redirect()->route('getMovies', ['movies'=>Movie::latest()->get()])->with('success', 'movie deleted');
	}
}
