<?php

namespace App\Http\Controllers;


use App\http\Requests;
use Auth;
use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Photo;
use App\Category;
use App\http\Requests\PostRequest;
use App\http\Requests\UserEditRequest;
use App\http\Requests\DonateRequest;

class UsersController extends Controller
{
    public function index(){

        //$user = Auth::user()->findorfail($id);

        // $posts = Post::all();

        $posts = Post::all()->sortByDesc("created_at");

        $user = Auth::User();
        

        return view('user.profile.feed', compact(['posts', 'user']));

    }

    public function indexbus(){

        $posts = Post::where('category_id', 1)->get()->sortByDesc("created_at");

        $user = Auth::User();
        

        return view('user.profile.feed', compact(['posts', 'user']));

    }

    public function indexsoc(){

        $posts = Post::where('category_id', 2)->get()->sortByDesc("created_at");

        $user = Auth::User();
        

        return view('user.profile.feed', compact(['posts', 'user']));

    }

    public function indexoth(){

        $posts = Post::where('category_id', 3)->get()->sortByDesc("created_at");


        $user = Auth::User();
        

        return view('user.profile.feed', compact(['posts', 'user']));

    }

    public function profile(){
        
        $user = Auth::user();

        $ownPosts = $user->posts->sortByDesc("created_at");
        ;

        return view('user.profile.profile', compact(['user', 'ownPosts']));
    }

    public function profilebus(){
        
        $user = Auth::user();

        $ownPosts = $user->posts->where('category_id', 1)->sortByDesc("created_at");
        
        return view('user.profile.profile', compact(['user', 'ownPosts']));
    }

    public function profilesoc(){
        
        $user = Auth::user();

        $ownPosts = $user->posts->where('category_id', 2)->sortByDesc("created_at");


        return view('user.profile.profile', compact(['user', 'ownPosts']));
    }

    public function profileoth(){
        
        $user = Auth::user();

        $ownPosts = $user->posts->where('category_id', 3)->sortByDesc("created_at");
        
        return view('user.profile.profile', compact(['user', 'ownPosts']));
    }

    public function create(){

        $user = Auth::user();

        return view('user.posts.create', compact(['user']));

    }

    public function store(PostRequest $request){
        
        $user = Auth::user();


        $input = $request->all();


        $input['user_id'] = $user->id;

        

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images/', $name);

            $photo = Photo::create(['path'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);

        

        return redirect('/user/profile');

    }

    public function edit(){

        $user = Auth::user();

        return view('user.profile.edit', compact(['user']));

    }

    public function update(UserEditRequest $request){
        
        

        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user = Auth::user();

        $user->update($input);

        return redirect('/user/profile');
    }


    public function postDelete($id){
        
        $post = Post::where('id', $id)->get()->first();

        $user = Auth::user();

        return view('user.posts.delete', compact(['post', 'user']));

    }

    public function confirmDelete($id){

        $post = Post::where('id', $id)->get()->first();

        $post->delete();

        return redirect('/user/profile');

    }
        
    public function guestProfile($id){
        
        $user = Auth::User();



        $guest = User::where('id', $id)->get()->first();

        $guestPosts = $guest->posts->sortByDesc("created_at");

        if($user->id != $id)
            return view('user.profile.guest', compact('user', 'guest', 'guestPosts'));
        else
            return redirect('/user/profile');


    }

    public function donate($id){
        
        $post = Post::where('id', $id)->get()->first();

        $user = Auth::User();

        return view ('user.posts.donate', compact('post', 'user'));
    }

    public function donateStore(DonateRequest $request, $id){
        
        $post = Post::where('id', $id)->get()->first();

        $user = Auth::User();
        $userid = $user->id;
        $guest = $post->user;
        $guestid = $post->user->id;
        $amount = $request->received;

        $prevGuestReceived = $guest->received;
        $prevUserDonated = $user->donated;
        $prevPostRceived = $post->received;

        $newGuestReceived = $prevGuestReceived + $amount;
        $newUserDonated = $prevUserDonated + $amount;
        $newPostRceived = $prevPostRceived + $amount;

        User::where('id', $guestid)->update(['received' => $newGuestReceived ]);
        User::where('id', $userid)->update(['donated' => $newUserDonated ]);
        Post::where('id', $id)->update(['received' => $newGuestReceived ]);

        return redirect('/user/feed');

    }

}
