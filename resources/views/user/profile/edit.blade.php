@extends('layouts.user')

@section('content')

<div class="container-fluid">
        @if(Auth::check())
        <div class="row">
            
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
                <form method="POST" action="{{url('user/edit')}}" enctype="multipart/form-data">

                    @csrf

                    
                    
                    <div class="card-body">

                            @include('includes.form_error')
                        <h5 class="card-title"><b>Edit Profile</b></h5>
                        <div class="form-group">
                            <label for="name"><b>Name</b></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" 
                            autocomplete="off" value="{{ $user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email"><b>Email</b></label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" 
                            autocomplete="off" value="{{ $user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="bio"><b>Bio</b></label>
                            <input type="text" name="bio" class="form-control" id="bio" placeholder="Enter Bio" 
                            autocomplete="off" value="{{ $user->bio}}">
                        </div>
                        <div class="form-group">
                            <label for="nationality"><b>Nationality</b></label>
                            <input type="text" name="nationality" class="form-control" id="nationality" placeholder="Enter Nationality" 
                            autocomplete="off" value="{{ $user->nationality}}">
                        </div>
                        <div class="form-group">
                            <label for="photo_id">Example file input</label>
                            <input type="file" class="form-control-file" id="photo_id" name="photo_id">
                        </div>

                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <a href="{{ url('/user/profile') }}" class="btn btn-dark" role="button">Timeline</a>
                        <a href="{{ url('/user/create') }}" class="btn btn-dark" role="button">Create Post</a>
                        <a href="{{ url('/login') }}" class="btn btn-dark" role="button">Edit Profile</a>
                        <a href="{{ url('/login') }}" class="btn btn-dark" role="button">Edit Bank Information</a>
                    </ul>
                </div>
            </div>
        </div>
        @endif
</div>

@endsection

