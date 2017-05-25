<?php

namespace App;

class Reply extends ForumModel
{
	public function owner()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
