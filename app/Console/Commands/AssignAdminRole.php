<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AssignAdminRole extends Command
{
	protected $signature = 'assign:admin {--id=}';

	public function handle()
	{
		if (!$this->option('id'))  {
			$this->error('User not found!');
			return;
		}
		$user = User::query()->whereId($this->option('id'))->firstOrFail();
		$user->update([
			'is_admin' => 1
		]);
		$this->info("User {$user->name} is admin.");
	}
}
