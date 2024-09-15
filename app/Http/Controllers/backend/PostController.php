<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(5);
        return view('backend.post.index', compact('posts'));
    }


    //post create
    public function create()
    {
        $users = User::all(); // Fetch all users
        return view('backend.post.create', compact('users'));
    }

    //post store
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:10240',
            ]);

            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image = $request->file('image')->store('post', 'public');
                //dd($image);
                $post->image = $image; // Store the image path in the database as a string .
            }
            $post->user_id = Auth::id();
            $post->save();

            return redirect()->route('posts.index')->with('swalMsg', [
                'type' => 'success',
                'message' => 'Post Create Successfully.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('swalMsg', [
                'type' => 'error',
                'message' => 'Something went wrong!'
            ]);
        }
    }

    //post edit
    public function edit(string $id)
    {
        $users = User::all();
        $post = Post::findOrFail($id);
        return view('backend.post.edit', compact('users', 'post'));
    }

    //post Update
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:10240',
            ]);

            $post = Post::findOrFail($id);
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->description = $request->description;

            if ($request->hasFile('image')) {
                if ($post->image && file_exists(storage_path('app/public/' . $post->image))) {
                    unlink(storage_path('app/public/' . $post->image));
                }

                $image = $request->file('image');
                $image = $request->file('image')->store('post', 'public');
                $post->image = $image; // Store the image path in the database as a string .
            }

            $post->save();

            return redirect()->route('posts.index')->with('swalMsg', [
                'type' => 'success',
                'message' => 'Post Updated successfully.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    //post destroy
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('swalMsg', [
            'type' => 'success',
            'message' => 'Post Deleted Successfully.'
        ]);
    }
}
