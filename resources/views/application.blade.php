@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">




                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="card">
                                <div class="card-header">
                                    {{$post->job_title}}
                                    <span style="float: right"><i class="fa fa-clock-o"></i> {{$applied->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="card-body">
                                    <span style="font-weight: bold">Description : </span>
                                    <p> {{$post->job_description}}</p>
                                    <p><span style="font-weight: bold">Location : </span> {{$post->location}} , {{$post->country}}</p>
                                    <p><span style="font-weight: bold">Salary : </span> {{$post->salary}}</p>

                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <span class="btn btn-info text-center">Successfully Applied For This Job</span>
                                </div>
                            </div>
                            <br><br>



        </div>
    </div>
@endsection
