<?php

namespace Tests\Feature\News;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class NewsGetTest extends TestCase
{
	use RefreshDatabase;

	private $token;

	protected function setUp(): void
	{
		parent::setUp();

		$this->artisan('news:parse');
		$user = User::factory()->create(['is_admin' => 1]);
		Auth::login($user);
		$token = $user->createToken('login');
		$this->token = $token->plainTextToken;
	}

	public function test_get_news(): void
	{
		$request = $this->get(route('news.index'), [
			'Authorization' => "Bearer {$this->token}"
		]);

		$request->assertOk();
		$this->assertTrue(is_string($request->getContent()));
	}
}
