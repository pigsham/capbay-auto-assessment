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
        // If the user is already authenticated, redirect to the dashboard
        if (Auth::check()) {
            return redirect()->route('admin.cars.index');  // Redirect to the admin cars page or dashboard
        }
        
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
            return redirect()->route('admin.cars.index');
            // return redirect()->intended('/'); // Redirect to intended URL or home
        }
    
        // If login fails, return with error message
        return back()->withErrors([
            'email' => 'Invalid credentials, please try again.',
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page after logout
        return redirect()->route('admin.login');
    }
}
