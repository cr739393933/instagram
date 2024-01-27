@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-5">
        <div class="col-3  pb-5">
            <img src="{{ $user->profile->ProfileImage()}}" name="image" class="rounded-circle w-100 " alt="" srcset="">
        </div>
        <div class="col-9 d-flex flex-column" style="gap: 10px">
            <div class="d-flex justify-content-between">
                <h1>{{ $user->username }}</h1>
            <div class="d-flex" style="gap: 10px">
                @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit" class="btn btn-primary" style="height: 40px">Edit Profile</a>
                @endcan
                @can('update', $user->profile)
                <a href="{{ route('create') }}" class="btn btn-primary" style="height: 40px">Add new Post</a>
                @endcan
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            
            </div>
            
            <div class="d-flex  " style="gap: 65px">
                <div><strong>{{ $postCount }}</strong>  posts</div>
                <div><strong>{{  $followersCount }}</strong>  followers</div>
                <div><strong>{{ $followingCount }}</strong>  following</div>
            </div>
            <div class="fw-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div>
                <i class="fas fa-link"></i>
                <a href="https://www.freecodecamp.org/">{{ $user->profile->url ?? '' }}</a>
            </div>
        </div>
        
    </div>
    <div class="row">
        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <div class="card">
                        <div class="card-img-top ">
                           <a href="/p/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" class="w-100" srcset="">
                           </a>
                        </div>
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h3>{{ $post->caption }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</div>

@endsection


