
@extends('content.home')

@section('content')
<title>Home</title>
<div class="navbar">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
				@if (Session::has('message'))
					<div class="alert alert-info">{{ Session::get('message') }}</div>
				@endif
						<div class="title">
							@if ($own)
								Your journal:
							@else
								{{$username}}'s journal:
							@endif
						</div>

			@if($posts->count())
				@foreach($posts->reverse() as $post)
				<div class="panel panel-default">
					<div class="panel-heading"><b>   {{ $post->title }}
							@if ($own)
                            <div class="pull-right">
                                {!! Form::open(['method' => 'DELETE', 'url' => ['posts/'.$post->id]],
                                array('required',
                                         'class'=>'pull-left',
                                         'placeholder'=>'')) !!}
                                <button class="pull-right" type="submit">Delete</button>
                                {!! Form::close() !!}

                            </div>
                                <div class="pull-right">
                                    {!! Form::open(['method' => 'GET', 'url' => ['posts/'.$post->id.'/edit']]) !!}
                                    <button class="pull-right" type="submit">Edit</button>
                                    {!! Form::close() !!}
                            </div>
							@endif
						</b>
					</div>

					<div class="panel-body">
						{{ $post->body }}
					</div>

					<div class="panel-body">
						{{ $post->created_at->format('Y-m-d H:i')  }}  <div class="author">by {{$username}} </div>
					</div>
				</div>
				@endforeach

				@elseif ($own)
						You still do not have any record. <a href="{{ url('/new') }}">Add post.</a>

			@endif
		</div>
	</div>
</div>
@endsection
