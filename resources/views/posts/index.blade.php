@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-4 offset-4 mt-2 d-flex flex-column ">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                </a>
                
                <h1 class="h4"><a href="/profile/{{ $post->user->id }}"><span class="fw-bold me-2">{{ $post->user->username }}</span></a>{{ $post->caption }}</h1>
            </div>
            <div class="offset-4"></div>
            @endforeach
        </div>
        <div class="row">
        <div class="col-12 d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-4', ['max_links' => 5]) }}
            </div>
        </div>

    </div>
   
@endsection