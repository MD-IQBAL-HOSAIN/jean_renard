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
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = UpcommingAlbum::get();
            // dd($data);

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('performance_date',function($data){
                return Carbon::parse($data->performance_date)->format('d F Y');
            })

            ->addColumn('action', function ($data) {
                return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                              <a href="' . route('upcomming.album.delete', $data->id) . '" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                              <i class="bi bi-trash"></i>
                            </a>

                            </div>';
            })
            ->addColumn('image', function ($data) {
                return "<img width='70px' src='" . asset('storage/' .$data->image_url) . "' ></img>";
            })
            ->rawColumns(['performance_date','action','image'])
            ->make(true);

        }
        return view('backend.upcommingAlbum.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.upcommingAlbum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'sub_title' => 'nullable|string',
            'location' => 'nullable|string',
            'performance_date' => 'nullable|date',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:2048',
        ]);

        // Handle image upload
        $image_url = null;

        if ($request->hasFile('image_url')) {
            // $image = $request->file('image_url');
            $image_url = $request->file('image_url')->store('upcommingAlbum', 'public');
            // $image_url = uploadImage($image, 'images/cms/upcomming-album');
        } else {
            $image_url = null;
        }

        // Create the gallary image entry
        $data = UpcommingAlbum::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'location' => $request->location,
            'performance_date' => $request->performance_date,
            'image_url' => $image_url,
        ]);

        if ($data) {
            return  redirect()->action([self::class, 'index'])->with('success', 'Slider image created successfully.');
        } else {
            return redirect()->action([self::class, 'create'])->with('error', 'Data update failed!');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $data = UpcommingAlbum::find($id);

        if (!$data) {
            return response()->json(['t-success' => false, 'message' => 'Data not found.']);
        }
        $data->delete();
        return response()->json(['t-success' => true, 'message' => 'Deleted successfully.']);
    }
}
