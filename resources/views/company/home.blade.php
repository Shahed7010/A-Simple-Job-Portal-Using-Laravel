@extends('layouts.company')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome to your Company</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <span></span><h3>{{Auth::user()->first_name}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
