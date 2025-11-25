<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show Add Account form
    public function create(Request $request)
    {
        $defaultRole = $request->role ?? null;
        return view('accounts.add_account', compact('defaultRole'));
    }

    // Display all users
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('admin.manage_users', compact('users'));
    }

    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string'
        ]);

        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.manage-users')->with('success', 'User created successfully!');
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
        ]);

        return back()->with('success', 'User updated successfully!');
    }

    // Delete user
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User deleted successfully!');
    }

    // View patients
    public function patients()
    {
        $patients = User::where('role', 'Patient')->get();
        return view('admin.users.patients', compact('patients'));
    }

    // View doctors
    public function doctors()
    {
        $doctors = User::where('role', 'Doctor')->get();
        return view('admin.users.doctors', compact('doctors'));
    }

    // View nurses
    public function nurses()
    {
        $nurses = User::where('role', 'Nurse')->get();
        return view('admin.users.nurses', compact('nurses'));
    }
}