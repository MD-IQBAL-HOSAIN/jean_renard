<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Discography extends Controller
{
    public function index()
    {
        return view('frontend.discography');
    }
}
