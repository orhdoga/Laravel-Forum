<?php

namespace App\Filters;

use App\User;

class ThreadFilters extends Filters
{
	protected $filters = ['by'];

	protected function by($username)
	{
		$user = User::where('name', '=', $username)->firstOrFail()->id;

        return $this->builder->where('user_id', '=', $user);
	}
}
