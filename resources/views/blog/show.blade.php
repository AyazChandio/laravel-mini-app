@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <small>Posted on: {{ $post->created_at }}</small>
    <br><br>
    <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>

    <a href="{{ route('blog.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
