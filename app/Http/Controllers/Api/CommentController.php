<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Http\Resources\CommentsCollection;
use App\Http\Resources\CommentsResource;
use App\Models\News;

class CommentController extends Controller
{
	public function index(News $news): CommentsCollection
	{
		return new CommentsCollection($news->comments);
	}

	public function store(News $news, CommentFormRequest $request)
	{
		$comment = $news->comments()->create($request->validated());
		if ($comment) {
			return new CommentsResource($comment);
		}
		return responseError();
	}
}
