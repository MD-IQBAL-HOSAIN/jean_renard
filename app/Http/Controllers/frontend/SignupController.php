<?php

/* namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view('frontend.partials.register');
    }
} */

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Ensure you include the User model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    // Show the registration form
    public function index()
    {
        return view('frontend.partials.register');
    }

    // Handle form submission
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'terms' => 'accepted'
        ]);

        try {
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Log in the user
            Auth::login($user);

            // Redirect with success message
            return redirect()->route('home')->with('success', 'Registration successful.');
        } catch (\Exception $e) {
            // Redirect with error message
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
