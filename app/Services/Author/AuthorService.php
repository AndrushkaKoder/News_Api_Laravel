<?php

namespace App\Services\Author;

use App\Http\Requests\AuthorFormRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorService
{

	public function getAll(Request $request): array
	{
		$query = Author::query()->limit($request->limit ?? 100);

		if ($request->has('query')) {
			$query->where('name', 'like', "%{$request['query']}%");
		}

		if ($request->has('with_news') && $request->with_news) {
			$query->with('news');
		}

		if ($request->has('orderBy') && $request->orderBy) {
			$query->orderBy('id', $request->orderBy);
		}

		return ['data' =>  $query->get()];
	}

	public function getAuthor(Author $author): AuthorResource
	{
		return new AuthorResource($author);
	}

	public function createAuthor(AuthorFormRequest $request): AuthorResource
	{
		$author = Author::query()->firstOrCreate($request->validated());
		return new AuthorResource($author);
	}

	public function deleteAuthor(Author $author)
	{
		$author->delete();
		return responseOk();
	}

}
