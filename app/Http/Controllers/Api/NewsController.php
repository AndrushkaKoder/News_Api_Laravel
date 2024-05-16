<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Facades\News as NewsFacade;

class NewsController extends Controller
{
	public function index(Request $request): array
	{
		return NewsFacade::getAll($request);
	}

	public function store(Request $request)
	{
		return NewsFacade::createNews($request);
	}

	public function show(News $news): NewsResource
	{
		return NewsFacade::getOne($news);
	}

	public function update(Request $request, News $news)
	{
		return responseError('NewsParser can`t be updated');
	}

	public function destroy(News $news)
	{
		return NewsFacade::deleteNews($news);
	}
}
