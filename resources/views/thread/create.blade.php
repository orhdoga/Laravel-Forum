@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
    <div class="container"> 
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>        
    </div>    
@endif

<div class="container">

	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">
				<div class="panel-heading">Create A New Thread</div>

				<div class="panel-body">
					<form method="POST" action="{{ url('/threads') }}">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Channel</label>
							<select class="form-control" name="channel_id" required>
								<option style="display: none;" value="">Choose a Channel</option>
								@foreach ($channels as $channel)
									<option value="{{ $channel->id }}" 
									{{ old('channel_id') == $channel->id ? 'selected' : '' }}>
										{{ ucfirst($channel->name) }}
									</option>
								@endforeach	
							</select>
						</div>	

						<div class="form-group">
							<label for="title">Title</label>
							<input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
						</div>

						<div class="form-group">
							<label for="body">Body</label>
							<textarea id="body" type="text" class="form-control" rows="8" name="body" required>{{ old('body') }}</textarea>
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>

					</form>
				</div>
			</div>

		</div>

	</div>

</div>

@endsection