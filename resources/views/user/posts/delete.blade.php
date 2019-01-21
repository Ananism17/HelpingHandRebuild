@extends('layouts.user')

@section('content')


<div class="container-fluid">
        <div class="row">
            @if(Auth::check())
            
            <div class="col-md-3">

                <div class="card" style="width: 18rem;">
                    @if($user->photo)
                    <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $user->photo->path}}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ 'placeholder.png'}}" alt="Card image cap">
                    @endif

                <div class="card-body">

                        <h3 class="card-title">{{$user->name}}</h3>
                        @if($user->bio)
                            <h5 class="card-title">{{$user->bio}}</h5>
                        @else
                            <h5 class="card-title">No Bio</h5>
                        @endif
                </div>
                    <ul class="list-group list-group-flush">
                        @if($user->nationality)
                            <li class="list-group-item">{{$user->nationality}}</li>
                        @else
                            <li class="list-group-item">Nationality Not Selected</li>
                        @endif
                        <li class="list-group-item">Donation Received: 50$</li>
                        <li class="list-group-item">Donation Made: 1000$</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Contact</a>
                        <a href="#" class="card-link">Block</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><b>Are you sure you want to delete this post?</b></h5>
                            <a href="{{ URL('/user/post/delete/yes/'.$post->id )}}" class="btn btn-secondary" role="button">Yes</a>
                            <a href="{{ URL('/user/profile')}}" class="btn btn-primary" role="button">No</a>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        @if($post)
                            @if($post->photo)
                                <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $post->photo->path }}"
                                alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title"><b>{{$post->title}}</b></h5>
                                <h6 class="card-title">{{$post->created_at->diffForHumans()}}</h6>
                                <hr>
                                <p class="card-text">{{$post->body}}</p>
                            </div>
                        @endif
                    </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <a href="{{ url('/user/profile') }}" class="btn btn-dark" role="button">Timeline</a>
                        <a href="{{ url('/user/create') }}" class="btn btn-dark" role="button">Create Post</a>
                        <a href="{{ url('/user/edit') }}" class="btn btn-dark" role="button">Edit Profile</a>
                        <a href="{{ url('/login') }}" class="btn btn-dark" role="button">Edit Bank Information</a>
                    </ul>
                </div>
            </div>
            @endif
        </div>
</div>

    
@endsection
