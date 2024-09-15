<?php

namespace App\Http\Controllers\frontend;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function index()
    {
        return view('frontend.contacts');
    }

/*
    public function store(Request $request)

    {
        // dd($request->all());
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:contacts,email',
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

 */

    //smtp
    /* public function showForm()
    {
        return view('frontend.contacts');
    } */

    public function sendEmail(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data (form er name="email" properties validate)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string',
            'message' => 'required|string',
            'phone' => 'required|string',
            'country' => 'required|string',
        ]);

        // Extract data from validated request
        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $message = $validatedData['message'];
        $phone = $validatedData['phone'];
        $country = $validatedData['country'];

        // Send email
        Mail::to('iqbalmd5692@gmail.com')->send(new ContactFormMail($name, $email, $message, $phone, $country));

        return redirect()->back()->with('success', 'Thank you. Your message has been sent.');
    }



}
