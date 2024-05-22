<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
	protected $fillable = [
		'text',
		'news_id',
		'user'
	];

	public function news(): BelongsTo
	{
		return $this->belongsTo(News::class, 'news_id');
	}
}
