<?php

namespace App\Http\Controllers\frontend;

use App\Models\Contacts;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function index()
    {
        return view('frontend.contacts');
    }


    public function store(Request $request)

    {
    // dd($request->all());
    try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        $contact = new Contacts($validatedData);
        $contact->user_id = Auth::id();
        $contact->save();

        return redirect()->route('contacts1')->with('success', 'Your message has been sent successfully.');
    } catch (\Exception $e) {
        return redirect()->route('contacts1')->with('error', 'Failed to send your message. Error: ' . $e->getMessage());
    }
}

}
