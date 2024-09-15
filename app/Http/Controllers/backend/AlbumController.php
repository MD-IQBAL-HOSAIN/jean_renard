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
    $album->user_id = Auth::id();
    $album->save();

    return redirect()->route('album.index')->with('swalMsg', [
        'type' => 'success',
        'message' => 'Album created successfully.'
    ]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'release_date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:10240',
        'user_id' => 'required|exists:users,id',
    ]);

    $album = Album::findOrFail($id);
    $album->title = $request->title;
    $album->release_date = $request->release_date;
    $album->user_id = $request->user_id;

    if ($request->hasFile('image')) {
        if ($album->image) {
            Storage::disk('public')->delete($album->image);
        }
        $imagePath = $request->file('image')->store('Album', 'public');
        $album->image = basename($imagePath);
    }

    $album->save();
    return redirect()->route('album.index')->with('swalMsg', [
        'type' => 'success',
        'message' => 'Album updated successfully.'
    ]);
}

// Edit album
public function edit($id)
{
    $album = Album::findOrFail($id);
    $users = User::all();
    return view('backend.album.edit', compact('album', 'users'));
}

// Delete album
public function destroy($id)
{
    $album = Album::findOrFail($id);
    if ($album->image) {
        Storage::disk('public')->delete($album->image);
    }
    $album->delete();
    return redirect()->route('album.index')->with('swalMsg', [
        'type' => 'success',
        'message' => 'Album deleted successfully.'
    ]);
}

}

