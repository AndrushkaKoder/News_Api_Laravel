<?php

namespace App\Console\Commands\News;

use Statickidz\GoogleTranslate;

class Translator
{
	public static function translateText(string $text, string $targetLang = 'ru'): string
	{
		return (new GoogleTranslate())->translate('en', $targetLang, $text);
	}
}
