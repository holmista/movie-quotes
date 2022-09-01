<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
	public function show()
	{
		return view('admin.sign-in');
	}
}
