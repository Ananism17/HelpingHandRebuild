@extends ('layouts.user')


@section('content')

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-3">
        </div>
        
        <div class="col-md-6">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-body">
                        @if(Auth::check()) 
                        <h5 class="card-title"><b>{{$post->title}}</b></h5>
                        <h6 class="card-title">By <b>{{$post->user->name}}</b></h6>
                        <p class="card-text">{{$post->body}}</p>
                        @endif 
                        <a href="{{ url('/register') }}" class="btn btn-primary" role="button">Donate</a>
                        <a href="{{ url('/login') }}" class="btn btn-secondary" role="button">Comment</a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="col-md-3">
            
        </div>

    </div>
</div>
    
@endsection