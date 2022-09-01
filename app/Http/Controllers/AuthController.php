<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;

class AuthController extends Controller
{
	public function signin(StoreAuthRequest $request)
	{
		$credentials = $request->only('email', 'password');
		if (auth()->attempt($credentials))
		{
			return redirect()->route('signin.show')->with('success', 'Welcome back!');
		}
		return back()->withInput()->withErrors(['email'=>'invalid credentials']);
	}
}
