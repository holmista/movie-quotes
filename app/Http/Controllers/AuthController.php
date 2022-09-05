<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
	public function signin(StoreAuthRequest $request): RedirectResponse
	{
		$credentials = $request->only('email', 'password');
		if (Auth::attempt($credentials))
		{
			return redirect()->route('quotes.index')->with('success', 'Welcome back!');
		}
		return redirect()->back()->withInput()->withErrors(['email'=>'invalid credentials']);
	}
}
