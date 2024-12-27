@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="display-3 text-center text-primary mb-4">{{ $post->title }}</h1>

    <div class="text-center mb-4">
        <img class="img-fluid rounded shadow-lg" style="max-height: 500px; object-fit: cover;" src="{{ asset('images/'.$post->image) }}" alt="Post Image">
    </div>

    <div class="bg-light p-4 rounded shadow-sm mb-4" style="font-size: 1.2rem; line-height: 1.6;">
        <p class="lead text-muted">{{ $post->description }}</p>
    </div>

    <div class="d-flex justify-content-center">
        <a href="{{ route('posts.index') }}" class="btn btn-lg btn-outline-primary">Back to Posts</a>
    </div>
</div>
@endsection
