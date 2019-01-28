@extends('layouts.user')

@section('content')


<div class="container-fluid">
        <div class="row">
            @if(Auth::check())
            
            <div class="col-md-3">

                <hr>

                <div class="card" style="width: 18rem;">
                    @if($guest->photo)
                    <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $guest->photo->path}}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ 'placeholder.png'}}" alt="Card image cap">
                    @endif

                <div class="card-body">

                        <h3 class="card-title">{{$guest->name}}</h3>
                        @if($guest->bio)
                            <h5 class="card-title">{{$guest->bio}}</h5>
                        @else
                            <h5 class="card-title">---</h5>
                        @endif
                </div>
                    <ul class="list-group list-group-flush">
                        @if($guest->nationality)
                            <li class="list-group-item">{{$guest->nationality}}</li>
                        @else
                            <li class="list-group-item">Nationality Unknown</li>
                        @endif
                        <li class="list-group-item">Donation Received: {{$guest->received}}$</li>
                        <li class="list-group-item">Donation Made: {{$guest->donated}}$</li>
                        <li class="list-group-item">Contact: {{$guest->email}}</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-1">
                    
            </div>



            <div class="col-md-6">

                <hr>

                {{--  <div class="card">
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
                <hr>  --}}
                @if(count($guestPosts)!=0)
                  @foreach ($guestPosts as $guestPost)
                  <div class="card">
                    @if($guestPost->photo)
                        <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $guestPost->photo->path }}"
                        alt="Card image cap">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title"><b>{{$guestPost->title}}</b></h5>
                      <h6 class="card-title">{{$guestPost->created_at->diffForHumans()}}</h6>
                      <hr>
                      <p class="card-text">{{$guestPost->body}}</p>
                      <hr>
                      <h6 class="card-title"><b>Amount required:</b> {{$guestPost->required}}$</h6>
                      <hr>
                      <h6 class="card-title"><b>Amount received:</b> {{$guestPost->received}}$</h6>
                      <hr>
 
                      <a href="{{ url('/user/post/donate/'.$guestPost->id) }}" class="btn btn-secondary" 
                        role="button">Donate</a>
                    </div>
                  </div>
                  <hr>
                  @endforeach
                  
                @else
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><b>No post to show!</b></h5>
                    </div>
                  </div>
                @endif


            </div>

            @endif
        </div>
</div>

    
@endsection