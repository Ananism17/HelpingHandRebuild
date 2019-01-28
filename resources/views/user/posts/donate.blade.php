@extends ('layouts.user')


@section('content')

<div class="container-fluid">
    <div class="row">
        @if(Auth::check())
        
        <div class="col-md-3">
            <hr>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Donations</h5>
                    <hr>
                    <h6 class="card-title"><b>Amount required:</b> {{$post->required}}$</h6>
                    <hr>
                    <h6 class="card-title"><b>Amount received:</b> {{$post->received}}$</h6>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <hr>
            <div class="card">
                @if($post->photo)
                <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $post->photo->path }}" alt="Card image cap">
                @endif
                <div class="card-body"> 
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
                </div>
            </div>
            <hr>
        </div>
        
        <div class="col-md-3">
            <hr>
            <div class="card">
                <form method="POST" action="{{url('/user/post/donate/'.$post->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <h5 class="card-title">Donate</h5>
                    <hr>      
                    @include('includes.form_error')
                        <div class="form-group">
                            <div class="form-group">
                                <label for="received"><b>Amount of donation</b></label>
                                <input type="number" name="received" class="form-control" id="received"
                                placeholder="Enter Amount" autocomplete="off">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('Donate') }}
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        
        @endif
    </div>
</div>
    
@endsection