<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\{User, Thread, Reply};

class ParticipateInForum extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	function unauthenticated_users_may_not_add_replies()
	{
		$this->expectException('Illuminate\Auth\AuthenticationException');

		$this->post('/threads/1/replies', []);		
	}

	/** @test */
	function an_authenticated_user_may_participate_in_forum_threads()
	{
		$this->signIn($user = factory(User::class)->create());
		$thread = factory(Thread::class)->create();
		$reply = factory(Reply::class)->make();

		$this->post($thread->path() . '/replies', $reply->toArray());

		$this->get($thread->path())
			->assertSee($reply->body);
	}
}
