<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
	public function toArray($request)
	{
		return array_merge(['count' => $this->collection->count()], $this->collection->map(function ($user) {
			return [
				'id' => $user->id,
				'name' => $user->name,
				'role' => $user->isAdmin() ? 'Admin' : 'User'
			];
		})->toArray());
	}
}
