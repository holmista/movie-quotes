<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuoteRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class AdminQuoteController extends Controller
{
	public function index(): View
	{
		$quotes = Quote::latest();
		if (request('search'))
		{
			$quotes->where('body->en', 'like', '%' . request('search') . '%')
			->orWhere('body->ka', 'like', '%' . request('search') . '%');
		}
		// dd(App::currentLocale());
		return view('admin.quotes.show', ['quotes'=>$quotes->get()]);
	}

	public function create(): View
	{
		$movies = Movie::latest()->get();
		return view('admin.quotes.create', ['movies'=>$movies]);
	}

	public function store(Request $request): RedirectResponse
	{
		$thumbnail = request()->file('thumbnail')->store('thumbnails');
		Quote::create([
			'body'=> [
				'en'=> $request->en,
				'ka'=> $request->ka,
			],
			'movie_id'    => $request->movie,
			'thumbnail'   => $thumbnail,
		]);

		return redirect()->route('quotes.index');
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		Storage::delete($quote->thumbnail);
		$quote->delete();
		return redirect()->route('quotes.index');
	}

	public function edit(Quote $quote): View
	{
		return view('admin.quotes.edit', ['quote'=>$quote, 'movies'=>Movie::latest()->get()]);
	}

	public function update(StoreQuoteRequest $request, Quote $quote): RedirectResponse
	{
		Storage::delete($quote->thumbnail);
		$thumbnail = $request->file('thumbnail')->store('thumbnails');
		// ddd(request()->all());
		$langAttributes = request()->only(['en', 'ka']);
		$attributes = request()->only(['movie_id', 'thumbnail']);
		$attributes['thumbnail'] = $thumbnail;
		$attributes['body'] = $langAttributes;
		$quote->update($attributes);
		return redirect()->route('quotes.index');
	}
}
