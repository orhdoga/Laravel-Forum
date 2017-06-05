<?php

namespace App;

class Thread extends ForumModel
{
    public function path()
    {
        return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function replies() 
    {
    	return $this->hasMany(Reply::class);
    }

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function addReply(array $reply)
    {
    	$this->replies()->create($reply);
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
