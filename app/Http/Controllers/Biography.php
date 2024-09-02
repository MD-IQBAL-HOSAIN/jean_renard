<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Biography extends Controller
{
    public function index()
    {
        return view('frontend.biography');
    }
}
