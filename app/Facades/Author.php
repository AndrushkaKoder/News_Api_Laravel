<?php

namespace App\Facades;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array[] getAll(Request $request)
 * @method static \App\Http\Resources\AuthorResource getAuthor(\App\Models\Author $author)
 * @method static \App\Http\Resources\AuthorResource createAuthor(\App\Http\Requests\AuthorFormRequest $request)
 * @method static  deleteAuthor(\App\Models\Author $author)
 *
 * @see \App\Services\Author;
 */
class Author extends Facade
{
	public static function getFacadeAccessor(): string
	{
		return 'author';
	}

}
