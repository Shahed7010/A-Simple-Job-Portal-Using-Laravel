@extends('layouts.company')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Welcome to your Company  Dashboard<span class="text-capitalize" style="font-size: 24px">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($applications)!=0)


                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Applicant Name</th>
                                        <th>Photo</th>
                                        <th>Skills</th>
                                        <th>Applied For</th>
                                        <th>Resume</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($applications as $application)
{{--                                        @php   $user = App\User::findOrFail($application->applicant_id) @endphp--}}
                                    <tr>
                                        <td>{{$application->user->first_name.' '.$application->user->last_name}}</td>
                                        <td><img src="{{$application->user->photo->name}}" height="50px" alt=""></td>
                                        <td>{{$application->user->skills}}</td>
                                        <td>{{$application->title}}</td>
                                        <td><a href="{{$application->resume}}" class="btn btn-info" target="_blank">View Resume</a></td>
                                        <td>
                                            <a href="{{route('sendNotification',[$application->user->id,$application->id])}}" class="btn btn-primary">Accept</a>
                                            <a href="{{$application->resume}}" class="btn btn-danger" target="_blank">Decline</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <a href="{{ route('post.index') }}" class="btn btn-success">Create a Job Post</a>
                            @endif


                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
