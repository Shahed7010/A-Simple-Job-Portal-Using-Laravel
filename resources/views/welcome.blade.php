<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
@if (Route::has('login'))
    <!-- Brand -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'JobsForJob') }}
        </a>
        @auth

            <ul class="navbar-nav mr-auto">
                <a class="nav-link" href="{{ url('/home') }}">Home</a>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>


                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
    @else
        <!-- Links -->
            <ul class="navbar-nav ml-auto">
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link" href="#">Link 1</a>--}}
            {{--                        </li>--}}

            <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Login
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('login') }}">Login as User</a>
                        <a class="dropdown-item" href="{{ route('company.login') }}">Login as Company</a>
                    </div>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Register
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div>
                                <a class="dropdown-item" href="{{ route('register') }}">Register as User</a>
                                <a class="dropdown-item" href="{{ route('company.register') }}">Register as Company</a></div>
                        </div>
                    </li>
                @endif
                @endauth
            </ul>
    </nav>
@endif



<div class="row justify-content-center" style="margin-top: 100px">
    <div class="col-md-8">


        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @foreach($posts as $post)
                    @php $user = App\User::findOrFail($post->user_id) @endphp
                <div class="card">
                    <div class="card-header">
                        <p style="font-size: 24px; font-weight: bold ">{{$post->job_title}}
                        <span style="font-size: 18px; float: right">{{$user->first_name.' '. $user->last_name}}</span></p>
                        <span><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>

                    </div>
                    <div class="card-body">
                        <span style="font-weight: bold">Description : </span>
                        <p> {{$post->job_description}}</p>
                        <p><span style="font-weight: bold">Location : </span> {{$post->location}} , {{$post->country}}</p>
                        <p><span style="font-weight: bold">Salary : </span> {{$post->salary}}</p>

                    </div>
                    @guest
                        <div class="card-footer">
                            <a href="{{route('login')}}" class="btn btn-info">Apply Now</a>
                        </div>
                    @endguest
                    @auth
                        @if($post->applicant_id==Auth::user()->id)

                            <div class="card-footer">

                                <a href="" class="btn btn-info">Already applied</a>
                            </div>

                        @elseif(Auth::user()->is_admin == 0)
                            <div class="card-footer">

                                <a href="{{route('application',['id'=>Auth::user()->id,'post_id'=>$post->id])}}" class="btn btn-info">Apply Now</a>
                            </div>
                        @endif
                    @endauth
                </div>
                <br><br>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>

