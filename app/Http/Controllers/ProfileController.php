<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    public function index(ModelsUser $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id):false;
        $postCount = Cache::remember('count.posts.'. $user->id,
        now()->addSeconds(30),
        function () use ($user){
            return $user->posts->count();
        });
        $followersCount = Cache::remember('count.followers.'. $user->id,
        now()->addSeconds(30),
        function () use ($user){
           return $user->profile->follwers->count();
        });;
        $followingCount = Cache::remember('count.following.'. $user->id,
        now()->addSeconds(30),
        function () use ($user){
           return $user->following->count();
        });;
        return view('profiles.index',compact('user','follows','postCount','followersCount','followingCount'));
    }
    public function edit(ModelsUser $user){
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }
    public function update(ModelsUser $user){
        $this->authorize('update',$user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => ['url','nullable'],
            'image' => ['image','nullable'],
        ]);
        if(request('image')){
            $imagePath = request('image')->store('profile','public');
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(400,400);
        $image->save();
        $imgArr = ['image' => $imagePath];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $imgArr ?? [],
        ));
        return redirect("/profile/{$user->id}");
    }
}
