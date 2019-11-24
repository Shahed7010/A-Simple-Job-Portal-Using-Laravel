@extends('layouts.company')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h1>create Job_post</h1>

                            {!! Form::open(['method'=>'post', 'action' => 'AdminUsersController@store','files'=>true]) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Name: ') !!}
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email: ') !!}
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Password: ') !!}
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('role_id', 'Role: ') !!}
                                {!! Form::select('role_id', $roles, 3,['class'=>'form-control']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('is_active', 'Active Status: ') !!}
                                {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'), 0, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('photo_id', 'Upload Image: ') !!}
                                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
