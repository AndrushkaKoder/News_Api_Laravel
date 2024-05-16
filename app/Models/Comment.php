<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'text',
		'news_id',
		'user'
	];

	public function news(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(News::class, 'news_id');
	}
}
