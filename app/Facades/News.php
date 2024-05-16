<?php

namespace App\Facades;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array[] getAll(Request $request)
 * @method static \App\Http\Resources\NewsResource getOne(\App\Models\News $news)
 * @method static createNews(Request $request)
 * @method static deleteNews(\App\Models\News $news)
 *
 * @see \App\Services\News;
 */

class News extends Facade
{
	public static function getFacadeAccessor(): string
	{
		return 'news';
	}

}
