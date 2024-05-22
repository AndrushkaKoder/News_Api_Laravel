<?php

namespace App\Jobs;

use App\Mail\UpdateNewsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class UpdateNewsJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	private $status;

	public function __construct(int $status = 1)
	{
		$this->status = $status;
	}

	public function handle()
	{
		Mail::to('andrusha.kolmakov@yandex.ru')->send(new UpdateNewsMail($this->status));
	}
}
