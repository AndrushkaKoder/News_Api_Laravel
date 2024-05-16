<?php


function responseOk(string $message = 'Success')
{
	return response([
		'message' => $message,
		'code' => 200
	], 200);
}

function responseError(string $message = 'Error')
{
	return response([
		'message' => $message,
		'code' => 400
	], 400);
}
