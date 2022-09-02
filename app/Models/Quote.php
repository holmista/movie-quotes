<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quote extends Model
{
	use HasFactory, HasTranslations;

	public $translatable = ['body'];

	protected $guarded = ['id'];

	protected $casts = [
		'body' => 'array',
	];

	public function movie()
	{
		return $this->belongsTo(Movie::class);
	}
}
