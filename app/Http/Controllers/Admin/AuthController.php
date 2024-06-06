<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Registration(){
        return view('Admin.registration');
    }
    public function Registered(Request $request){
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'confirmPassword' => 'required|same:password',
        ]);
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return view('Admin.login');
    }
    public function Login(){
        return view('Admin.login');
    }
    public function LoggedIn(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            return view('Admin.dashboard');
        }
        return redirect()->back()->with('message', 'Incorrect Email or Password');
    }
}
