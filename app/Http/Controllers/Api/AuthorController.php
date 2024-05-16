<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorFormRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Facades\Author as AuthorFacade;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{

	public function __construct()
	{
		$this->middleware('is_admin')->only(['store', 'destroy']);
	}

	public function index(Request $request): array
	{
		return AuthorFacade::getAll($request);
	}

	public function show(Author $author): AuthorResource
	{
		return AuthorFacade::getAuthor($author);
	}

	public function store(AuthorFormRequest $request): AuthorResource
	{
		return AuthorFacade::createAuthor($request);
	}

	public function destroy(Author $author)
	{
		return AuthorFacade::deleteAuthor($author);
	}
}
