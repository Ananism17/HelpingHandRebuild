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
                <div class="card">
                    <form method="POST" action="{{url('user/post/create')}}" enctype="multipart/form-data">

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
                                <label for="required"><b>Amount needed</b></label>
                                <input type="number" name="required" class="form-control" id="required" placeholder="Enter Required Amount" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="category_id"><b>Category</b></label>
                                <select class="custom-select" id="category_id" name="category_id">
                                    <option value="1">Business</option>
                                    <option value="2">Social</option>
                                    <option value="3" selected>Others</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="photo_id"><b>Photo</b> (if requires)</label>
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

