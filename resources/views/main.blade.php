@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@if($posts->count())
				@foreach($posts as $post)
				<div class="panel panel-default">
					<div class="panel-heading"><b>{{ $post->title }}</b></div>

					<div class="panel-body">
						{{ $post->body }}
					</div>
				</div>
				@endforeach
			@endif
		</div>
	</div>
</div>
@endsection
