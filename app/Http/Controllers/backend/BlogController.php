<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Blogs = Blog::with('User')->paginate(5);
        return view('backend.blog.index', compact('Blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('backend.blog.create', compact('users'));
    }

    // Store Blog
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,svg,bmp|max:10240',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Blog', 'public');
            $blog->image = $imagePath;
        }
        // Ensure that user_id is assigned
        $blog->user_id = Auth::id();

        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }


    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $users = User::all();
        return view('backend.blog.edit', compact('blog', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,svg,bmp|max:10240',
        ]);

        // Find the existing blog by ID
        $blog = Blog::findOrFail($id);

        // Update blog attributes
        $blog->title = $request->title;
        $blog->description = $request->description;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($blog->image) {
                Storage::disk('public')->delete('Blog/' . $blog->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('Blog', 'public');
            $blog->image = basename($imagePath);
        }

        // Save the updated blog record
        $blog->save();

        // Redirect with a success message
        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
    }

    // Delete album
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
    }
}
