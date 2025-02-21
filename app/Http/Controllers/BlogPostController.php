<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    // Listing of the Blogs
    public function index(Request $request)
    {
        $query = BlogPost::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%");
        }
    
        $blogs = $query->latest()->paginate(5)->withQueryString();
        return view('blog.index', compact('blogs'));
    }
    
    // View of Create Blog
    public function create()
    {
        return view('blog.create');
    }

    // Store function for Blog
    public function store(Request $request)
    {
        $blogData = $request->validate([
            'title' => 'required|string|max:250',
            'content' => 'required|string',
            'author' => 'required|string|max:150'
        ]);

        BlogPost::create($blogData);

        return redirect()->route('blog.index')->with('success', 'Blog post has been created successfully.');
    }

    // Display the Blog
    public function show($id)
    {
        $blog = BlogPost::findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    // Edit Function
    public function edit($id)
    {
        $blog = BlogPost::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

    // Update the Blogs
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255'
        ]);

        $blog = BlogPost::findOrFail($id);
        $blog->update($data);

        return redirect()->route('blog.index')->with('success', 'Blog post has been updated successfully.');
    }

    // Remove the specific Blog
    public function destroy($id)
    {
        $blog = BlogPost::findOrFail($id);
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog post has been deleted successfully.');
    }
}
