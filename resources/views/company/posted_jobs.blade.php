@extends('layouts.company')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Our Posted Jobs</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @foreach($posts as $post)
                            <div class="card">
                                <div class="card-header">
                                    {{$post->job_title}}
                                <span style="float: right"><i class="fa fa-clock-o"></i> {{$post->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="card-body">
                                    <span style="font-weight: bold">Description : </span>
                                    <p> {{$post->job_description}}</p>
                                    <p><span style="font-weight: bold">Location : </span> {{$post->location}} , {{$post->country}}</p>
                                    <p><span style="font-weight: bold">Salary : </span> {{$post->salary}}</p>

                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-info">Edit Job Post</a>
                                </div>
                            </div>
                                <br><br>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
