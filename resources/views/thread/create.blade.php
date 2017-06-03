@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">
				<div class="panel-heading">Create A New Thread</div>

				<div class="panel-body">
					<form method="POST" action="{{ url('/threads') }}">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="title">Title</label>
							<input id="title" type="text" class="form-control" name="title">
						</div>

						<div class="form-group">
							<label for="body">Body</label>
							<textarea id="body" type="text" class="form-control" rows="8" name="body"></textarea>
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>

					</form>
				</div>
			</div>

		</div>

	</div>

</div>

@endsection