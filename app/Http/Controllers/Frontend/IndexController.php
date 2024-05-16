<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
	public function index()
	{
		return view('index', [
			'news' => $this->getNews()
		]);
	}

	private function getNews()
	{
		return Cache::remember('news', 3600, function () {
			return News::query()
				->with(['author', 'source'])
				->orderBy('id', 'desc')
				->limit(100)
				->get();
		});
	}
}
