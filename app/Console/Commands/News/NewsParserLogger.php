<?php

namespace App\Console\Commands\News;

use Carbon\Carbon;

class NewsParserLogger
{
	public static function writeInLog(string $message): void
	{
		$date = Carbon::now()->toString();
		$message = "$date: $message;" . PHP_EOL;
		file_put_contents(__DIR__ . '/log.txt', $message, FILE_APPEND);
	}

}
