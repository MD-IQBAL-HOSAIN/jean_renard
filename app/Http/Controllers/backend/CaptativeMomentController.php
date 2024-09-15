<?php

namespace App\Http\Controllers\backend;

use App\Models\Captative;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class CaptativeMomentController extends Controller
{
    public function index()
    {
        $captative = Captative::paginate(10);

        return view('backend.captative.index', compact('captative'));
    }



    public function create()
    {
        $users = User::all();
        return view('backend.captative.create', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:10240',
            ]);

            $captative = new Captative();
            $captative->title = $request->input('title');
            $captative->description = $request->input('description');

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('captative', 'public');
                $captative->image = $imagePath;
            }

            // Ensure that user_id is assigned
            $captative->user_id = Auth::id(); // Assuming user is logged in

            $captative->save();

            return redirect()->route('captivating.index')->with('swalMsg', [
                'type' => 'success',
                'message' => 'Cavtivate Moment Create Successfully.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('swalMsg', [
                'type' => 'error',
                'message' => 'Something went wrong!'
            ]);
        }
    }


    public function edit(string $id)
    {
        $captative = Captative::findOrFail($id);
        $users = User::all();
        return view('backend.captative.edit', compact('captative', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:10240',
            ]);

            $captative = Captative::findOrFail($id);
            $captative->title = $request->input('title');
            $captative->description = $request->input('description');

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('captative', 'public');
                $captative->image = $imagePath;
            }

            $captative->save();
            return redirect()->route('captivating.index')->with('swalMsg', [
                'type' => 'success',
                'message' => 'Cavtivate Moment Updated Successfully.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('swalMsg', [
                'type' => 'error',
                'message' => 'Something went wrong!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $captative = Captative::findOrFail($id);
            $captative->delete();

            return redirect()->route('captivating.index')->with('swalMsg', [
                'type' => 'success',
                'message' => 'Cavtivate Moment Deleted Successfully.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('swalMsg', [
                'type' => 'error',
                'message' => 'Something went wrong!'
            ]);
        }
    }
}
