@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Blog Post</h1>
    
    <form action="{{ route('blog.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control"  name="title" value="{{ old('title', $blog->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control"  name="content" rows="5" required>{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" placeholder="Enter Author please" value="{{ old('title', $blog->author) }}"  required>
        </div>

        
        <button type="submit" class="btn btn-success mt-3">Update Post</button>
        <a href="{{ route('blog.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection
