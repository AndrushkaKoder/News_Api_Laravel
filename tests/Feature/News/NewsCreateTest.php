<?php

namespace Tests\Feature\News;

use App\Models\Author;
use App\Models\News;
use App\Models\Source;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsCreateTest extends TestCase
{
	use RefreshDatabase;

	protected function setUp(): void
	{
		parent::setUp();
		$this->artisan('news:parse');
	}

	public function test_create_news(): void
	{
		$news = News::all();
		$authors = Author::all();
		$sources = Source::all();

		$this->assertTrue(
			$news->count() &&
			$authors->count() &&
			$sources->count()
		);
	}
}
