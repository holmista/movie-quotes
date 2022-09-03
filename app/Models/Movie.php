<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
	use HasFactory, HasTranslations;

	public $translatable = ['title'];

	protected $guarded = ['id'];

	protected $casts = [
		'title' => 'array',
	];

	public function quotes(): HasMany
	{
		return $this->hasMany(Quote::class);
	}
}
