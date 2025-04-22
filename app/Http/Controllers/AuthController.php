<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Attempt to log the user in using the default User model
        $user = User::where('email', $request->email)->first();  // Retrieve user by email
    
        // Check if the user exists and the password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user, $request->filled('remember'));
    
            // Redirect to the dashboard or wherever you want to go after successful login
            // return redirect()->route('admin.dashboard');
            return redirect()->intended('/'); // Redirect to intended URL or home
        }
    
        // If login fails, return with error message
        return back()->withErrors([
            'email' => 'Invalid credentials, please try again.',
        ]);
    }
}
