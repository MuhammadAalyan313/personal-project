<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;


class AuthController extends Controller
{
    public function Registration()
    {
        return view('Admin.registration');
    }
    public function Registered(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'confirmPassword' => 'required|same:password',
        ],
            [
                'username.required' => 'The name field is required',
                'password.min' => 'The password should contain at least 6 correctors',
                'confirmPassword.same' => 'The password and confirm password do not match',
            ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return view('Admin.login');
    }
    public function Login()
    {
        return view('Admin.login');
    }
    public function LoggedIn(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $role = Auth::user()->role;
            if ($role == 1) {

                return redirect('admin/dashboard')->with('message');
            } elseif ($role == 0) {
                return redirect('user/dashboard')->with('message');
            } elseif ($role == 2) {
                return redirect('staff/dashboard')->with('message');

            }

        }
        return redirect()->back()->with('message', 'Incorrect Email or Password');
    }

    public function dashboard()
    {
        return view('Admin.index');
    }
    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out successfully');
    }
}
