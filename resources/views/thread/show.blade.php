@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">

		<div class="col-md-8">

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

			@foreach ($replies as $reply)
				@include('thread.reply')	
			@endforeach

			{{ $replies->links() }}

			@if (Auth::check())
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
			@else
				<p class="text-center">
					Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.
				</p>	
			@endif	

		</div>

		<div class="col-md-4">

			<div class="panel panel-default">
					<div class="panel-body">
						<div class="body">
							<p>
								This thread was published {{ $thread->created_at->diffForHumans() }} by
								<a href="#">{{ $thread->creator->name }}</a>, and currently has {{ $thread->replyCount }} {{ str_plural('comment', $thread->replyCount) }}.
							</p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

@endsection