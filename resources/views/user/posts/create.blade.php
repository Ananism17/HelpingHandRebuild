@extends('layouts.user')

@section('content')

<div class="container-fluid">
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
                    <form method="POST" action="{{url('user/create')}}" enctype="multipart/form-data">

                        @csrf

                        
                        
                        <div class="card-body">

                                @include('includes.form_error')
                            <h5 class="card-title"><b>Create Post</b></h5>
                            <div class="form-group">
                                <label for="title"><b>Title</b></label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="body"><b>Body</b></label>
                                <textarea class="form-control" name="body" id="body" placeholder="Enter Body" rows="10" autocomplete="off"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="custom-select" id="category_id" name="category_id">
                                    <option selected>Select One</option>
                                    <option value="1">Business</option>
                                    <option value="2">Social</option>
                                    <option value="3">Others</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="photo_id">Example file input</label>
                                <input type="file" class="form-control-file" id="photo_id" name="photo_id">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Post') }}
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
                        <a href="{{ url('/user/edit') }}" class="btn btn-dark" role="button">Edit Profile</a>
                        <a href="{{ url('/login') }}" class="btn btn-dark" role="button">Edit Bank Information</a>
                    </ul>
                </div>
            </div>
        </div>
</div>

@endsection

