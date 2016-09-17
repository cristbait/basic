@extends('content.home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">New post</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                            {!! Form::open([
                             'url' => 'posts/create', 'method' => 'get'
                         ]) !!}


                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    {!! Form::text('title', null,
                                        array('required',
                                              'class'=>'form-control',
                                              'placeholder'=>'Title',
                                              'rowa'=>50)) !!}
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Text</label>
                                <div class="col-md-6">
                                    {!! Form::textarea('body', null,
                                         array('required',
                                               'class'=>'form-control',
                                               'placeholder'=>'Text')) !!}
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add post
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
