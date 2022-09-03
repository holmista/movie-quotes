<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'en'           => ['required'],
			'ka'           => ['required'],
			'movie_id'     => ['required', Rule::exists('movies', 'id')],
			'thumbnail'    => ['required', 'image'],
		];
	}
}
