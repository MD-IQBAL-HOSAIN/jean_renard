<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        // Fetch all albums with their related user
        $albums = Album::with('user')->paginate(5);
        return view('backend.album.index', compact('albums'));
    }


     // Create album
    public function create()
    {
        $users = User::all();
        return view('backend.album.create', compact('users'));
    }


    // Store album
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:10240',
        ]);

        $album = new Album();
        $album->title = $request->title;
        $album->release_date = $request->release_date;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Album', 'public');
            $album->image = $imagePath;
        }
        // Ensure that user_id is assigned
        $album->user_id = Auth::id();

        $album->save();

        return redirect()->route('album.index')->with('success', 'Album created successfully.');
    }


    // Edit album
    public function edit($id)
    {
        $album = Album::findOrFail($id); //
        $users = User::all();
        return view('backend.album.edit', compact('album', 'users'));
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:10240',
            'user_id' => 'required|exists:users,id', // Validate user_id
        ]);

        // Find the album to update
        $album = Album::findOrFail($id);

        // Update the album attributes
        $album->title = $request->title;
        $album->release_date = $request->release_date;
        $album->user_id = $request->user_id;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($album->image) {
                Storage::disk('public')->delete('Album/' . $album->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('Album', 'public');
            $album->image = basename($imagePath);
        }

        // Save the updated album
        $album->save();
        return redirect()->route('album.index')->with('success', 'Album updated successfully.');
    }


    // Delete album
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->route('album.index')->with('success', 'Album deleted successfully');
    }
}
