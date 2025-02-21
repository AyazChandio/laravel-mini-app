@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Blog Posts</h1>
        <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Create New Blog</a>
      

        <form action="{{ route('blog.index') }}" method="GET" class="d-flex mb-4">
            <input type="text" name="search" class="form-control me-2" 
                   placeholder="Search posts..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>


        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Title</th>
                <th>Auther</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>
                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete.?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
