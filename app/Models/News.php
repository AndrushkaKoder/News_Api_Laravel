<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
	protected $fillable = [
		'title',
		'description',
		'text',
		'author_id',
		'url',
		'image',
		'publishedAt',
		'source_id'
	];

	protected $hidden = [
		'author_id',
		'source_id',
		'publishedAt'
	];


	public function getCreatedAtAttribute($value): string
	{
		return Carbon::parse($value)->format('Y-m-d');
	}

	public function getUpdatedAtAttribute($value): string
	{
		return Carbon::parse($value)->format('Y-m-d');
	}

	public function author(): BelongsTo
	{
		return $this->belongsTo(Author::class, 'author_id');
	}

	public function source(): BelongsTo
	{
		return $this->belongsTo(Source::class, 'source_id');
	}

	public function comments(): HasMany
	{
		return $this->hasMany(Comment::class, 'news_id');
	}
}
