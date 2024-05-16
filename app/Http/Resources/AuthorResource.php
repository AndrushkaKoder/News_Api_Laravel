<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
	public function toArray($request): array
	{
		$news = [];
		if (!empty($request['with_news'])) {
			$news['news'] = $this->news;
		}

		return [
			'id' => $this->id,
			'name' => $this->name
		] + $news;
	}
}
