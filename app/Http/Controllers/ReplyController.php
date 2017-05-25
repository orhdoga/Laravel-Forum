<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Thread, Reply};

class ReplyController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store(Thread $thread)
    {
    	$thread->addReply([
    		'user_id' => auth()->id(),
    		'body' => request('body')
    	]);

    	return back();
    }
}
