<?php


function responseOk(string $message = 'Success')
{
	return response([
		'message' => $message,
		'code' => 200
	], 200);
}

function responseError(string $message = 'Error', int $code = 400)
{
	return response([
		'message' => $message,
		'code' => $code
	], $code);
}


function setLocateMessage(string $message, string $file = 'messages'): string
{
	return __("$file.$message") ?? 'Default message';
}
