<?php

namespace App\Console\Commands;

use App\Console\Commands\News\NewsMaker;
use App\Console\Commands\News\NewsParserLogger;
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

		(new NewsMaker())->make();
		NewsParserLogger::writeInLog('Новости успешно добавлены');
	}

	private function clearTables(): void
	{
		Author::query()->delete();
		Source::query()->delete();
		News::query()->delete();
		$this->info('Tables has been cleared!');
	}
}
