@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4 text-primary">Your Blog Feed</h1>
        <a class="btn btn-lg btn-success" href="{{ route('posts.create') }}" role="button">Create New Post</a>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    @if (isset($posts) && count($posts) > 0)
       
@foreach ($posts as $post)
    <div class="row mb-4 shadow-lg rounded p-4 bg-light position-relative">
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img class="img-fluid rounded" style="object-fit: cover; height: 200px;" src="{{ asset('images/'.$post->image)}}" alt="Post Image">
        </div>
        <div class="col-md-8 d-flex flex-column justify-content-between">
            <div class="d-flex flex-column mb-auto">
                <h4 class="text-dark">{{ $post->title }}</h4>
                <p class="text-muted">{{ Str::limit($post->description, 150) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary mt-3">Read More</a>
            </div>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="position-absolute" style="bottom:10px; right:10px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
            </form>
        </div>
    </div>
@endforeach

    @else
        <div class="alert alert-info">
            <p>No posts found. Start by creating one!</p>
        </div>
    @endif
</div>
@endsection
