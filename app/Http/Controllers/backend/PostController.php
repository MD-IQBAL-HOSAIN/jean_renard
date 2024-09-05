<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $users = User::all(); // Fetch all users
    return view('backend.post.create', compact('users'));
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:10240',
            ]);

            $post = new Post();
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->description = $request->description;

            if($request->hasFile('image')){
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image = $request->file('image')->store('post', 'public');
                //dd($image);
                $post->image = $image; // Store the image path in the database as a string .
            }

            $post->save();

            return redirect()->route('posts.index')->with('success', 'Post created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
   

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
       /*  $post = Post::findOrFail($id);
        return view('backend.post.show', compact('post')); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $users = User::all(); // Fetch all users
        return view('backend.post.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
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
                $name = $image->getClientOriginalName();
                $image = $request->file('image')->store('post', 'public');
                $post->image = $image; // Store the image path in the database as a string .
            }

            $post->save();

            return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        try {
            $post = Post::findOrFail($id);

            if ($post->image && file_exists(storage_path('app/public/' . $post->image))) {
                unlink(storage_path('app/public/' . $post->image));
            }

            $post->delete();

            return redirect()->route('backend.post.index')->with('success', 'Post deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}

