<?php

namespace App\Models\Enum;

enum AdminEnum: int
{
	case Admin = 1;
	case User = 0;

	public function type(): int
	{
		return match ($this) {
			AdminEnum::Admin => AdminEnum::Admin->value,
			AdminEnum::User => AdminEnum::User->value,
		};
	}
}
