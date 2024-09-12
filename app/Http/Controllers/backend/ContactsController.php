<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::paginate(5);
        return view('backend.contacts.index', compact('contacts'));
    }

    // Show Contact
    public function show($id)
    {
        $contact = Contacts::findOrFail($id);
        return view('backend.contacts.show', compact('contact'));
    }


    // Delete Contact
    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}

