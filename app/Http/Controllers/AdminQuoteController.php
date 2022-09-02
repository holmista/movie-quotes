<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuoteRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminQuoteController extends Controller
{
	public function show(): View
	{
		$quotes = Quote::latest();
		if (request('search'))
		{
			$quotes->where('body->en', 'like', '%' . request('search') . '%')
			->orWhere('body->ka', 'like', '%' . request('search') . '%');
		}
		return view('admin.quotes.show', ['quotes'=>$quotes->get()]);
	}

	public function create(): View
	{
		$movies = Movie::latest()->get();
		return view('admin.quotes.create', ['movies'=>$movies]);
	}

	public function store(Request $request): RedirectResponse
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

	public function destroy(Quote $quote): RedirectResponse
	{
		Storage::delete($quote->thumbnail);
		$quote->delete();
		return redirect()->route('quotes.show');
	}

	public function edit(Quote $quote): View
	{
		return view('admin.quotes.edit', ['quote'=>$quote, 'movies'=>Movie::latest()->get()]);
	}

	public function update(StoreQuoteRequest $request, Quote $quote): RedirectResponse
	{
		Storage::delete($quote->thumbnail);
		$path = $request->file('thumbnail')->store('thumbnails');
		$attributes = request()->only(['body', 'movie_id', 'thumbnail']);
		$attributes['thumbnail'] = $path;
		$quote->update($attributes);
		return redirect()->route('quotes.show');
	}
}
