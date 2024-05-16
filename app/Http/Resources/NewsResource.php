<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
	public function toArray($request): array
	{
		$params = [];
		if (!empty($request['with_author'])) {
			$params['author'] = new AuthorResource($this->author);
		}

		if (!empty($request['with_source'])) {
			$params['source'] = $this->source;
		}

		return array_merge([
			'id' => $this->id,
			'title' => $this->title,
			'description' => $this->description,
			'text' => $this->text,
			'url' => $this->url,
			'image' => $this->image,
		], $params);
	}
}
