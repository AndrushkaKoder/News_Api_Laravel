<?php

namespace App\Console\Commands\News;

final class NewsThemeGenerator
{
	public static function getRandomTheme(): string
	{
		$themes = self::getThemesList();
		return $themes[rand(0, count($themes) - 1)];
	}

	private static function getThemesList(): array
	{
		return [
			'USA',
			'Russia',
			'Ukraine',
			'Cars',
			'Fashion',
			'Sport',
			'Politics',
			'Bitcoin',
		];
	}
}
