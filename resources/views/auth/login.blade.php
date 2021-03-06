@extends('layouts.auth')

@section('content')

{{--  Navbar  --}}

<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container-fluid" style="padding-left: 0px; width: 101%;">
        <a class="navbar-brand" href="#">
            <img src="{{ URL::to('/') }}/images/{{ 'logo1.jpg'}}" width="100" height="100" alt="">  
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto" >
                <li class="nav-item active">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/register') }}" class="nav-link">Sign Up</a>
                </li>
            </ul>
        </div> 
    </div>
    
</nav>
        
        
{{--  Navbar ends  --}}


{{-- Paragraph and Form --}}

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h1 class="text-left">  RISE YOUR FUND!</h1>
            <p class="text-left">
                Do not have an account? Sign Up right now! 
            </p>
            <a href="{{ url('/register') }}" class="btn btn-primary" role="button">Sign Up</a>

        </div>
        <div class="col-md-5">
            <div class="form- group row">
                <div class="col-md-6">
                    <h3 class="text-left">Sign In</h3>
                </div>
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-pencil"></span>
                </div>
            </div>
            <hr>
            <form method="POST" action="{{ route('login') }}">
              
                @csrf

                <div class="form-group row">
                    <label for="email" class="label col-md-2 control-label">{{ __('E-Mail') }}</label>

                    <div class="col-md-10">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="label col-md-2 control-label">{{ __('Password') }}</label>

                    <div class="col-md-10">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






@endsection
