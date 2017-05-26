<?php

namespace App;

class Thread extends ForumModel
{
    public function path()
    {
    	return '/threads/' . $this->id;
    }

    public function replies() 
    {
    	return $this->hasMany(Reply::class);
    }

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function addReply(array $reply)
    {
    	$this->replies()->create($reply);
    }
}
