@extends ('layouts.user')


@section('content')

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-3">
            <hr>
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <a href="{{ url('/user/post/create') }}" class="btn btn-dark" role="button">Create Post</a>
                </ul>
            </div>
        </div>
        
        <div class="col-md-6">
            <hr>
            @foreach ($posts as $post)
                <div class="card">
                    @if($post->photo)
                    <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $post->photo->path }}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        @if(Auth::check()) 
                        <h5 class="card-title"><b>{{$post->title}}</b></h5>
                        @if($user->id == $post->user->id)
                            <h6 class="card-title">By <a href="{{ url('/user/profile') }}" 
                            class="card-link">{{$post->user->name}}</a></h6>
                        @else
                            <h6 class="card-title">By <a href="{{ url('/guest/profile/'.$post->user->id) }}" 
                            class="card-link">{{$post->user->name}}</a></h6>
                        @endif
                            
                        <h6 class="card-title">{{$post->created_at->diffForHumans()}}</h6>
                        <hr>
                        <p class="card-text">{{$post->body}}</p>
                        <hr>
                        <h6 class="card-title"><b>Amount required:</b> {{$post->required}}$</h6>
                        <hr>
                        <h6 class="card-title"><b>Amount received:</b> {{$post->received}}$</h6>
                        <hr>

                        @endif 
                        <a href="{{ url('/user/post/donate/'.$post->id) }}" class="btn btn-secondary" 
                            role="button">Donate</a>
                        <a href="{{ url('/login') }}" class="btn btn-primary" role="button">Comment</a>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        
        <div class="col-md-3">
            <hr>
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