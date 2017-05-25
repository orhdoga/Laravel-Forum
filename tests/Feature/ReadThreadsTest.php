<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\{Thread, Reply};
class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() 
    {
        parent::setUp();

        $this->thread = factory(Thread::class)->create();
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }
    
    /** @test */
    public function a_user_can_read_a_single_thread()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        // Thread includes reply.
        $reply = factory(Reply::class)->create(['thread_id' => $this->thread->id]);

        // When visiting the thread, we should see the replies.
        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }
         
}
