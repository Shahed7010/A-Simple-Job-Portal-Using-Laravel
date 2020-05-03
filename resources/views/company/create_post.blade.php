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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {!! Form::open(['method'=>'post', 'action' => 'PostController@store']) !!}

                            <div class="form-group">
                                {!! Form::label('job_title', 'Job Title: ') !!}
                                {!! Form::text('job_title', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('job_description', 'Job Description: ') !!}
                                {!! Form::text('job_description', null, ['class'=>'form-control']) !!}
                            </div>
                             <div class="form-group">
                                  {!! Form::label('location', 'Location: ') !!}
                                  {!! Form::text('location', null, ['class'=>'form-control']) !!}
                              </div>
                            <div class="form-group">
                                {!! Form::label('country', 'Country: ') !!}
                                {!! Form::text('country', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('salary', 'Salary: ') !!}
                                {!! Form::text('salary', null, ['class'=>'form-control']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::submit('Publish Job Post', ['class'=>'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
