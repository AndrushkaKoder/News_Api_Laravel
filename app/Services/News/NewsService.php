<?php

namespace App\Services\News;

use App\Http\Resources\NewsResource;
use App\Models\Author;
use App\Models\News;
use Illuminate\Http\Request;

class NewsService
{
	private int $limit = 500;

	public function getAll(Request $request): array
	{
		$query = News::query()->limit($request->limit ?? $this->limit);

		if ($request->has('query')) {
			$query->where('title', 'like', "%{$request['query']}%")
				->orWhere('text', 'like', "%{$request['query']}%")
				->orWhere('description', 'like', "%{$request['query']}%");
		}

		if ($request->has('with_author') && $request->with_author) {
			$query->with('author');
		}
		if ($request->has('with_source') && $request->with_source) {
			$query->with('source');
		}

		if ($request->has('orderBy') && $request->orderBy) {
			$query->orderBy('id', $request['orderBy']);
		}

		return ['data' => $query->get()];
	}

	public function createNews(Request $request)
	{
		if ($request->validate([
			'title' => ['required', 'string'],
			'author' => ['required', 'string'],
			'description' => ['required'],
		])) {
			$author = Author::query()->firstOrCreate(['name' => $request->author]);
			$news = News::query()->create([
				'title' => $request->title,
				'description' => $request->description,
				'author_id' => $author->id
			]);
			return new NewsResource($news);
		} else {
			return responseError();
		}
	}

	public function getOne(News $news): NewsResource
	{
		return new NewsResource($news);
	}

	public function deleteNews(News $news)
	{
		$news->delete();
		return responseOk();
	}
}
