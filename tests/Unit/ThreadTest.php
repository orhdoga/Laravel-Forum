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
    function a_thread_can_make_a_string_path()
    {
        $thread = create('App\Thread');

        $this->assertEquals("/threads/{$thread->channel->slug}/{$thread->id}", $thread->path()); 
    }

    /** @test */
    function a_thread_has_a_creator()
    {
        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

	/** @test */
    function a_thread_has_replies()
    {
    	// Confirm that the relationship returns the proper collection.
    	$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
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

    /** @test */
    function a_thread_belongs_to_a_channel()
    {
        $thread = create(Thread::class);

        $this->assertInstanceOf('App\Channel', $thread->channel);
    }
}
