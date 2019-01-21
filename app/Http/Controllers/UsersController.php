<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\http\Requests\PostRequest;

class UsersController extends Controller
{
    public function index(){

        //$user = Auth::user()->findorfail($id);

        $posts = Post::all();

        $user = Auth::User();
        

        return view('user.profile.feed', compact(['posts', 'user']));

    }

    public function profile(){
        
        $user = Auth::user();

        $ownPosts = $user->posts;

        return view('user.profile.profile', compact(['user', 'ownPosts']));
    }

    public function create(){

        $user = Auth::user();

        return view('user.posts.create', compact(['user']));

    }

    public function store(PostRequest $request){

        $user = Auth::user();

        $input['user_id'] = $user->id;

        $input = $request->all();

        $user->posts()->create($input);

        return redirect('/user/profile');
        

    }

}
