<?php

namespace App\Http\Controllers;

class LocaleController extends Controller
{
	// change locale
	public function change(string $locale)
	{
		session()->put('locale', $locale);
		return redirect()->back();
	}
}
