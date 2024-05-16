<?php

namespace App\Services;

use Illuminate\Support\Str;

final class TokenGenerator
{
	public static function generate(): string
	{
		return Str::random(40);
	}

}
