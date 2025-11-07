<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request)
{
    

    // Validate form data
    $request->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'username' => 'required|string|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Create new user
    $user = User::create([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    // Redirect to login page with a success message
    return redirect('/login')->with('success', 'Registration successful! You can now log in.');
}

    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    $user = User::where('username', $credentials['username'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        session(['user' => $user]);

        // Redirect based on user role
        switch ($user->role) {
            case 'Admin':
                return redirect()->route('admin.dashboard');
            case 'Staff':
                return redirect()->route('staff.dashboard');
            case 'Patient':
                return redirect()->route('patient.dashboard');
            default:
                return redirect('/login')->with('error', 'Invalid user role.');
        }
    }

    return back()->with('error', 'Invalid username or password.');
}



    public function logout() {
        session()->forget('user');
        return redirect('/login');
    }
}
