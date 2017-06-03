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
		$this->withExceptionHandling()
			->post('/threads/some-channel/1/replies', [])
			->assertRedirect('/login');		
	}

	/** @test */
	function an_authenticated_user_may_participate_in_forum_threads()
	{
		$this->signIn();
		$thread = create(Thread::class);
		$reply = make(Reply::class);

		$this->post($thread->path() . '/replies', $reply->toArray());

		$this->get($thread->path())
			->assertSee($reply->body);
	}
}
