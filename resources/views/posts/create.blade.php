@extends('layouts.app')
@section('content')
    <div class="container">
        
        <div class="row">
            <h1 class="text-center">Add New Post</h1>
            <form action="/p" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="col-8 offset-2">
                    <div class="card-body">
                            <div class="row mb-3">
                                <label for="caption" class="col-md-4 col-form-label text-md-start">Post Caption : </label>
                                <input id="caption" type="text" placeholder="Post Caption" class="form-control @error('caption') is-invalid @enderror" caption="caption" value="{{ old('caption') }}" name="caption"   autocomplete="caption" autofocus>
                                @error('caption')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <label for="image" class="form-label">Post Image</label>
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