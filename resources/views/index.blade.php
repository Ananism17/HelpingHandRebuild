@extends('layouts.landing')

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
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/login') }}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/register') }}" class="nav-link">Register</a>
            </li>
        </ul>
    </div> 
</div>

</nav>


{{--  Navbar ends  --}}

{{--    --}}
{{--    --}}

{{--  Slider  --}}


<div id="slides" class="carousel slide" data-ride="carousel">
<ul class="carousel-indicators">
    <li data-target="#slides" data-slide-to="0" class="active"></li>
    <li data-target="#slides" data-slide-to="1"></li>
    {{--  <li data-target="#slides" data-slide-to="2"></li>  --}}
</ul>
<div class="carousel-inner">
    <div class="carousel-item active">
        <img src="{{ URL::to('/') }}/images/{{ 'background1.jpg' }}">
    </div>
    <div class="carousel-item">
        <img src="{{ URL::to('/') }}/images/{{ 'background2.jpg'}}">
        <div class="carousel-caption">
            <h1 class="display-to">Helping Hand</h1>
            <h3>Help someone TODAY!</h3>
            <button type="button" class="btn btn-dark btn-lg">DEMO</button>
            <button type="button" class="btn btn-secondary btn-lg">DEMO</button>
        </div>
    </div>
</div>
</div>




@endsection