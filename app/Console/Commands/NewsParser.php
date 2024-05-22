<?php

namespace App\Console\Commands;

use App\Console\Commands\News\NewsMaker;
use App\Console\Commands\News\NewsNotificator;
use App\Models\Author;
use App\Models\News;
use App\Models\Source;
use Illuminate\Console\Command;

class NewsParser extends Command
{
	protected $signature = 'news:parse {--reset}';
	protected $description = 'NewsParser Parser from NewsParser API';

	public function handle(): void
	{
		if ($this->option('reset')) {
			$this->clearTables();
			exit();
		}

		$maker = (new NewsMaker())->make();

		(new NewsNotificator())
			->setStatus($maker ? NewsNotificator::STATUS_OK : NewsNotificator::STATUS_FAIL)
			->notify();

		if ($maker) {
			$this->info('Success parse');
		} else {
			$this->error('Error parse. Check log.');
		}
	}

	private function clearTables(): void
	{
		Author::query()->delete();
		Source::query()->delete();
		News::query()->delete();
		$this->info('Tables has been cleared!');
	}
}
