<?php

namespace App;

class Channel extends ForumModel
{
	public function threads()
	{
		return $this->hasMany(Thread::class);
	}

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
