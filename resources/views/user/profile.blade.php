@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->get('action'))
                    <p class="bg-success">{{session()->get('action')}}</p>
                @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="card">
                    <div class="card-header">Keep always updated your profile
                        <h5>
                            {{$user->first_name}}
                        </h5>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="container">
                                <div class="card" style="width:400px">
                                    <img class="card-img-top" src="{{$user->photo_id ? $user->photo->name : \App\Photo::$thumbnail }}" alt="Card image" style="width:50%">
                                    <div class="card-body">
                                        First Name: {{$user->first_name}}<br>
                                        Last Name: {{$user->last_name}}<br>
                                        Skills: {{$user->skills}}<br>
                                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary">Edit Profile</a>
                                    </div>
                                </div>
                                <br>
                        <a href="{{$user->resume_id ? $user->resume->name : "#" }}" target="_blank" class="btn btn-info">View Resume</a>
                    </div>
                </div>
            </div>
        </div>
            @if($user->resume_id == null)
            <div class="card col-md-3">
                <div class="card-header bg-warning">You haven't Upload Your RESUME</div>
                <div class="card-body">
                        <div class="form-group">
                            {!! Form::model($user, ['method'=>'PATCH','route' => ['user.update', $user->id],'files'=>true]) !!}
                            {!! Form::label('resume_id', 'Upload resume: ') !!}
                            {!! Form::file('resume_id', null, ['class'=>'form-control']) !!}
                            <br><br>
                            <div class="mr-auto">
                            {!! Form::submit('Upload', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                </div>
            </div>
                @else
                <div class="card col-md-3">
                    <div class="card-header bg-success">Keep Update Your RESUME</div>
                    <div class="card-body">
                        <a href="{{$user->resume_id ? $user->resume->name : "#" }}" target="blank" class="btn btn-info">Download Resume</a> or,
                        <br><br><br>
                        <div class="form-group">
                            {!! Form::model($user, ['method'=>'PATCH','route' => ['user.update', $user->id],'files'=>true]) !!}
                            {!! Form::label('resume_id', 'Upload updated resume: ') !!}
                            {!! Form::file('resume_id', null, ['class'=>'form-control']) !!}
                            <br><br>
                            <div class="mr-auto">
                                {!! Form::submit('Upload', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endif

    </div>
@endsection
