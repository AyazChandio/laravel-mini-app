@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Blog</h1>
    
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" placeholder="Enter title please" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" rows="5" placeholder="Enter content" required></textarea>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" placeholder="Enter Author please" required>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Create Post</button>
    </form>
</div>
@endsection
