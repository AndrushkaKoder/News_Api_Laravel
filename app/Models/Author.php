<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $fillable = [
		'name'
	];

	protected $hidden = [
		'created_at',
		'updated_at'
	];

	public function news(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(News::class, 'author_id');
	}

}
