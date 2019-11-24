@extends('layouts.app')


@section('content')
    <h1>edit user</h1>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($user, ['method'=>'PATCH','route' => ['user.update', $user->id],'files'=>true]) !!}
            <div class="col-sm-3">
                <img height="100px" width="100px" src="{{$user->photo_id ? $user->photo->name : \App\Photo::$thumbnail }}" alt="" class="img-responsive">
                <div class="form-group">
                    {!! Form::label('photo_id', 'Upload New Image: ') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-9">

                <div class="form-group">
                    {!! Form::label('first_name', 'First Name: ') !!}
                    {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Last Name: ') !!}
                    {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email: ') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>
                {{--    <div class="form-group">--}}
                {{--        {!! Form::label('password', 'Password: ') !!}--}}
                {{--        {!! Form::password('password', ['class'=>'form-control']) !!}--}}
                {{--    </div>--}}
                <div class="form-group">
                    {!! Form::label('skills', 'Write your skills: ') !!}
                    {!! Form::text('skills', null,['class'=>'form-control']); !!}
                </div>


                <div class="form-group col-sm-offset-8">
                    {!! Form::submit('Edit Post', ['class'=>'btn btn-primary']) !!}


                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE', 'action' => ['UserController@destroy',$user->id],'class'=>'pull-right']) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('includes.show_errors')
    </div>

@endsection
