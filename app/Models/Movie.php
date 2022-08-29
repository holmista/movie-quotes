<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
	use HasFactory, HasTranslations;

	public $translatable = ['title'];

	protected $guarded = ['id'];

	protected $casts = [
		'title' => 'array',
	];

	public function quote()
	{
		return $this->hasMany(Quote::class);
	}
}
