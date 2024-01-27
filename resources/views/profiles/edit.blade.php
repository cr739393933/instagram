@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Edit Profile</h1>
            <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                <div class="col-8 offset-2">
                    <div class="card-body">
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-start">Username</label>
                                <input id="username"  type="text"  class="form-control @error('username') is-invalid @enderror" username="username" 
                                value="{{ old('username') ?? $user->username }}" name="username"   autocomplete="username" autofocus>
                                @error('username')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-start">description</label>
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" description="description" value="{{ old('description') ?? $user->profile->description }}" name="description"   autocomplete="description" autofocus>
                                @error('description')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-start">title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" title="title" value="{{ old('title') ?? $user->profile->title }}" name="title"   autocomplete="title" autofocus>
                                @error('title')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="url" class="col-md-4 col-form-label text-md-start">url</label>
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" url="url" value="{{ old('url') ?? $user->profile->url }}" name="url"   autocomplete="url" autofocus>
                                @error('url')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <label for="image" class="form-label">Profile Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                @error('image')
                                
                                    <div class="alert alert-danger mt-2" role="alert">
                                        {{ $message }}
                                    </div>
                                
                                @enderror
                            </div>
                            <div class="row mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary form-control w-25">Post</button>
                            </div>
                </div>
            </form>
            </div>
    </div>
@endsection