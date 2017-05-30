<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\{Thread};

class ThreadTest extends TestCase
{
	protected $thread;

	use DatabaseMigrations;

	public function setUp()
	{
		parent::setUp();

		$this->thread = create(Thread::class);
	}

	/** @test */
    function a_thread_has_replies()
    {
    	// Confirm that the relationship returns the proper collection.
    	$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /** @test */
    function a_thread_has_a_creator()
    {
    	$this->assertInstanceOf('App\User', $this->thread->creator);
    }

    /** @test */
    public function a_thread_can_add_a_reply()
    {
    	$this->thread->addReply([
    		'user_id' => 1,
    		'body' => "Foobar"
    	]);

    	$this->assertCount(1, $this->thread->replies);
    }
}
