@extends('layouts.user')

@section('content')


<div class="container-fluid">
        <div class="row">

            
            <div class="col-md-3">

                <hr>
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
                        <li class="list-group-item">Donation Received: {{$user->received}}$</li>
                        <li class="list-group-item">Donation Made: {{$user->donated}}$</li>
                        <li class="list-group-item">Email: {{$user->email}}</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">

            <hr>

              @if(Auth::check()) 

                <div class="card">
                    <div class="card-body">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('user/profile')}}">All</a>
                                <a class="dropdown-item" href="{{url('user/profile/business')}}">Business</a>
                                <a class="dropdown-item" href="{{url('user/profile/social')}}">Social</a>
                                <a class="dropdown-item" href="{{url('user/profile/others')}}">Others</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>


                
                @if(count($ownPosts)!=0)
                  @foreach ($ownPosts as $ownPost)
                  <div class="card">
                    @if($ownPost->photo)
                        <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $ownPost->photo->path }}"
                        alt="Card image cap">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title"><b>{{$ownPost->title}}</b></h5>
                      <h6 class="card-title">{{$ownPost->created_at->diffForHumans()}}</h6>
                      <hr>
                      <p class="card-text">{{$ownPost->body}}</p>
                      <hr>
                      <h6 class="card-title"><b>Amount required:</b> {{$ownPost->required}}$</h6>
                      <hr>
                      <h6 class="card-title"><b>Amount received:</b> {{$ownPost->received}}$</h6>
                      <hr>
                      <a href="{{ URL('/user/post/delete/'.$ownPost->id )}}" class="btn btn-secondary" role="button">Delete</a>
                    </div>
                  </div>
                  <hr>
                  @endforeach
                  
                @else
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><b>No post to show!</b></h5>
                      <a href="{{ url('/user/post/create') }}" class="btn btn-secondary" role="button">Create</a>
                    </div>
                  </div>
                @endif
              @endif 

            </div>

            <div class="col-md-3">
                <hr>
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <a href="{{ url('/user/profile') }}" class="btn btn-dark" role="button">Timeline</a>
                        <a href="{{ url('/user/post/create') }}" class="btn btn-dark" role="button">Create Post</a>
                        <a href="{{ url('/user/edit') }}" class="btn btn-dark" role="button">Edit Profile</a>
                        <a href="{{ url('/login') }}" class="btn btn-dark" role="button">Edit Bank Information</a>
                    </ul>
                </div>
            </div>
        </div>
</div>

    
@endsection