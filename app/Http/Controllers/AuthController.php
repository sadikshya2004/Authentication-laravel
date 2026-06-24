<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //Shows the login page
    public function showLogin()
    {
        return view('login');
    }

// handles the login 
public function login(Request $request)
{
    $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))){
            $request->session()->regenerate();
            return redirect('/dashboard');
        } 
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
}
// shows the dashboard
public function dashboard()
{
    $totalUsers = User::count();

    $adminUsers = User::where('role', 'admin')->count();

    $regularUsers = User::where('role', 'user')->count();

    $monthlyUsers = User::whereMonth('created_at', now()->month )
    ->whereYear('created_at', now()->year)
        ->count();

    return view('dashboard', [
        'user' => Auth::user(),
        'totalUsers' => $totalUsers,
        'adminUsers' => $adminUsers,
        'regularUsers' => $regularUsers,
        'monthlyUsers' => $monthlyUsers,
    ]);
}
// handles the logout
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}

// shows the registration page
public function showRegister()
{
    return view('register');}
// handles the registration
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login')
        ->with('success', 'Registration successful. Please login.');
}
// UPDATE PROFILE
public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return back()->with('success', 'Profile updated successfully.');
}
}