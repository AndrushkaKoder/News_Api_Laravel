<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use MongoDB\Driver\Exception\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
	/**
	 * A list of the exception types that are not reported.
	 *
	 * @var array<int, class-string<Throwable>>
	 */
	protected $dontReport = [
		//
	];

	/**
	 * A list of the inputs that are never flashed for validation exceptions.
	 *
	 * @var array<int, string>
	 */
	protected $dontFlash = [
		'current_password',
		'password',
		'password_confirmation',
	];

	/**
	 * Register the exception handling callbacks for the application.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->reportable(function (Throwable $e) {
			//
		});
	}

	public function render($request, Throwable $e)
	{
		if ($e instanceof ModelNotFoundException) {
			return responseError(setLocateMessage('model_not_found'), 404);
		}

		if ($e instanceof NotFoundHttpException) {
			return responseError(setLocateMessage('http_not_found'), $e->getStatusCode());
		}

		if ($e instanceof AuthenticationException) {
			return responseError(setLocateMessage('auth_error'), 403);
		}

		if ($e instanceof MethodNotAllowedHttpException) {
			return responseError(setLocateMessage('method_not_allowed'), $e->getStatusCode());
		}

		return parent::render($request, $e);
	}
}
