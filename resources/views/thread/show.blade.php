@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="#">{{ $thread->creator->name }}</a> posted:
					{{ $thread->title }}
				</div>

				<div class="panel-body">
					<div class="body">
						{{ $thread->body }}
					</div>
				</div>
			</div>

		</div>

	</div>

	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			@foreach ($thread->replies as $reply)
				@include('thread.reply')	
			@endforeach

		</div>

	</div>

	@if (Auth::check())
		<div class="row">

			<div class="col-md-8 col-md-offset-2">

				<form method="POST" action="{{ url($thread->path() . '/replies') }}">
					{{ csrf_field() }}

					<div class="form-group">
						<textarea class="form-control" placeholder="Have something to say?" 
						rows="5" name="body">
						</textarea>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>

			</div>

		</div>
	@else
		<p class="text-center">
			Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.
		</p>	
	@endif	

</div>

@endsection