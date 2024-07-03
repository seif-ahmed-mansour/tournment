<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Check the role of the authenticated user
            $user = Auth::user();
            if ($user->role === 'admin') {
                // Redirect admin to admin dashboard
                Session::put('admin', $user);
                return redirect('/admin');
            } else {
                // Redirect regular user to user dashboard
                return redirect()->intended('/');
            }
        }
        // If authentication fails, redirect back with error message
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // Validate the user's input
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',      
                'regex:/[0-9]/',    
            ],
        ]);
        // Create a new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => $request->has('type') ? 'team' : 'individual',
        ]);
        auth()->login($user);
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return redirect('/'); // Redirect to the home page or any other page after logout
    }
}
