@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-6 d-flex justify-content-end ">
                <img src="/storage/{{ $post->image }}" alt="" class="w-50">
            </div>
            <div class="col-3">
                <div class="d-flex align-items-center " style="gap:10px;" >
                    <img src="{{ $post->user->profile->ProfileImage() }}" class="w-25  rounded-circle" style="max-width:50px ;" alt="">
                    <a href="/profile/{{ $post->user->id}}" style="text-decoration: none;"><h3 class="fw-bold">{{ $post->user->username }}</h3></a>
                    <a href="" class="btn btn-primary d-block">Follow</a>
                </div>
                <hr>
                <div class="fs-4"> 
                    <span class="fw-bold">
                        <a href="/profile/{{ $post->user->id}}" style="text-decoration: none;">{{ $post->user->username }}</a>
                    </span> {{ $post->caption }}
                </div>
            </div>
        </div>
    </div>
@endsection