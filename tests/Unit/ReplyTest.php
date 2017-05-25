<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Reply;
use App\User;

class ReplyTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_has_an_owner()
	{
		$reply = factory(Reply::class)->create();

		$this->assertInstanceOf(User::class, $reply->owner);
	}
}
