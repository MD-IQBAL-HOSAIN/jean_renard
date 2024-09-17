<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\UpcommingAlbum;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UpcommingAlbumController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = UpcommingAlbum::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('location', function ($data) {
                    return $data->location;
                })
                ->addColumn('performance_date', function ($data) {
                    return Carbon::parse($data->performance_date)->format('d F Y');
                })
                ->addColumn('image', function ($data) {
                    return "<img width='70px' src='" . asset($data->image_url) . "' />";
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['location', 'image', 'performance_date', 'action'])
                ->make(true);
        }
        return view('backend.upcommingAlbum.index');
    }

    public function create()
    {
        return view('backend.upcommingAlbum.create');
    }                                                                                                                    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'location' => 'nullable|string',
            'performance_date' => 'nullable|date',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        $image_url = null;

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $image_url = $image->store('upcommingAlbum', 'public');
        }

        // Create the gallery image entry
        $data = UpcommingAlbum::create([
            'title' => $request->title,
            'location' => $request->location,
            'performance_date' => $request->performance_date,
            'image_url' => $image_url,
        ]);

        if ($data) {
            return redirect()->route('upcomming.album.index')->with('success', 'Slider image created successfully.');
        } else {
            return redirect()->route('upcomming.album.create')->with('error', 'Data update failed!');
        }
    }
    public function destroy($id)
    {
        $album = UpcommingAlbum::find($id);

        if (!$album) {
            return response()->json(['success' => false, 'message' => 'Data not found.']);
        }

        try {
            $album->delete();
            return response()->json(['success' => true, 'message' => 'Album deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting.']);
        }
    }
}
