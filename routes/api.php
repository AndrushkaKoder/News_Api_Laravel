<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
	include 'groups/v1/user/token.php';
	Route::middleware('auth:sanctum')->group(function () {
		include 'groups/v1/news.php';
		include 'groups/v1/comments.php';
		include 'groups/v1/authors.php';
		include 'groups/v1/user/users.php';
	});

});


