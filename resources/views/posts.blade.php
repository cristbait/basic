
@extends('home')

@section('content')

<div class="navbar-left">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@if($posts->count())
				@foreach($posts as $post)
				<div class="panel panel-default">
					<div class="panel-heading"><b>   {{ $post->title }}
							<a href='{{ URL::action('ContentController@deletePost', $post->id) }}' class="pull-right">Delete </a>
							<a href='{{ URL::action('ContentController@editPost', $post->id) }}' class="pull-right">Edit </a>


						</b>
					</div>

					<div class="panel-body">
						{{ $post->body }}
					</div>

					<div class="panel-body">
						{{ $post->created_at->format('Y-m-d H:i')  }}  <div class="author">by {{ $username }} </div>
					</div>
				</div>
				@endforeach
			@endif
		</div>
	</div>
</div>
@endsection
