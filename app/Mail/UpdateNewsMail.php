<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateNewsMail extends Mailable
{
	use Queueable, SerializesModels;

	private bool $status;

	public function __construct(bool $status)
	{
		$this->status = $status;
	}

	public function build()
	{
		return $this->view($this->status ? 'mail.success' : 'mail.error');
	}
}
