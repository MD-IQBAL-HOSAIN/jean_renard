<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contacts extends Controller
{
    public function index()
    {
        return view('frontend.contacts');
    }
}

