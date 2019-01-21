@extends ('layouts.user')


@section('content')

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-3">
        </div>
        
        <div class="col-md-6">
            @foreach ($posts as $post)
                <div class="card">
                    @if($post->photo)
                    <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $post->photo->path }}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        @if(Auth::check()) 
                        <h5 class="card-title"><b>{{$post->title}}</b></h5>
                        <h6 class="card-title">By <b>{{$post->user->name}}</b></h6>
                        <h6 class="card-title">{{$post->created_at->diffForHumans()}}</h6>
                        <hr>
                        <p class="card-text">{{$post->body}}</p>
                        <hr>
                        @endif 
                        <a href="{{ url('/register') }}" class="btn btn-primary" role="button">Donate</a>
                        <a href="{{ url('/login') }}" class="btn btn-secondary" role="button">Comment</a>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    {{--  <h5 class="card-title">Categories</h5>  --}}
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{url('user/feed')}}">All</a>
                            <a class="dropdown-item" href="{{url('user/feed/business')}}">Business</a>
                            <a class="dropdown-item" href="{{url('user/feed/social')}}">Social</a>
                            <a class="dropdown-item" href="{{url('user/feed/others')}}">Others</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    
@endsection