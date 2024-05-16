<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\NewAccessToken;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('is_admin')->only('index');
	}

	public function login(UserRequest $request)
	{
		if (!Auth::attempt($request->validated())) {
			return response([
				'status' => 'error',
				'status_code' => '401',
				'message' => 'Authorize failed!'
			], 401);
		}

		$user = Auth::guard('web')->user();
		Auth::login($user);
		$token = $user->currentAccessToken() ?? $user->createToken('login');

		/*** @var NewAccessToken $token */

		return response([
			'status' => 'success',
			'status_code' => '200',
			'token' => $token->plainTextToken
		], 200);
	}

	public function index(): UserCollection
	{
		return new UserCollection(User::all());
	}
}
