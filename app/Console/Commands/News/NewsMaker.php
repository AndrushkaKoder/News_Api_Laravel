<?php

namespace App\Console\Commands\News;

use App\Models\Author;
use App\Models\Source;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class NewsMaker
{
	public function make(): bool
	{
		try {
			$response = $this->request($this->getUri());
			$this->saveNews(
				json_decode($response->getBody()->getContents(), true)
			);
			return true;
		} catch (\Exception $exception) {
			Log::info($exception->getMessage());
			return false;
		}
	}

	private function getUri(): string
	{
		$theme = NewsThemeGenerator::getRandomTheme();
		$apiKey = env('API_KEY');
		$baseUrl = 'https://newsapi.org/v2/everything';
		return "{$baseUrl}?" . http_build_query([
				'q' => $theme,
				'apiKey' => $apiKey
			]);
	}

	private function request(string $uri, string $method = 'get', array $options = []): \Psr\Http\Message\ResponseInterface
	{
		return (new Client())->request($method, $uri, $options);
	}


	private function saveNews(array $data): void
	{
		$data = array_map(function ($content) {
			if (!is_array($content)) return trim($content);
			return $content;
		}, $data['articles']);

		foreach ($data as $id => $newsContent) {
			if (empty($newsContent['author'])) continue;

			$author = Author::query()->firstOrCreate([
				'name' => $newsContent['author']
			]);

			$source = Source::query()->firstOrCreate([
				'name' => $newsContent['source']['name'] ?? 'unknown'
			]);

			/**@var Author $author * */
			$author->news()->create([
				'title' => $newsContent['title'],
				'description' => $newsContent['description'],
				'text' => $newsContent['content'],
				'image' => $newsContent['urlToImage'],
				'url' => $newsContent['url'],
				'author_id' => $author->id,
				'source_id' => $source->id,
				'publishedAt' => $newsContent['publishedAt']
			]);
		}
	}

}
