<?php

namespace App\Console\Commands\News;

use App\Jobs\SendLastNewsJob;
use App\Jobs\UpdateNewsJob;

class NewsNotificator
{
	private $status = null;

	public const STATUS_FAIL = 0;
	public const STATUS_OK = 1;

	public function setStatus(string $status): self
	{
		$this->status = $status;
		return $this;
	}

	public function notify(): void
	{
		$message = $this->status ? self::getMessages('success') : self::getMessages('error');
		NewsParserLogger::writeInLog($message);
		dispatch(new UpdateNewsJob($this->status));
		if ($this->status) {
			dispatch(new SendLastNewsJob());
		}
	}

	private static function getMessages(string $status): string
	{
		$messages = [
			'success' => 'Новости успешно добавлены',
			'error' => 'Ошибка добавления новостей'
		];

		return $messages[$status];
	}
}
