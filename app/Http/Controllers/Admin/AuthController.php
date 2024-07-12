<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


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
            'role_id' => 1,
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
            $role = Auth::user()->role_id;
            if ($role == 2) {
                return redirect('admin/dashboard')->with('message');
            } elseif ($role == 1) {
                return redirect('user/dashboard')->with('message');
            } elseif ($role == 3) {
                return redirect('staff/dashboard')->with('message');

            }

        }
        return redirect()->back()->with('message', 'Incorrect Email or Password')->withInput();
    }

    public function dashboard()
    {
        $role = Auth::user()->role_id;
        if($role == 1){
            $title = 'User | Dashboard';
            return view('User.dashboard', compact('title'));
        }
        elseif($role == 3){
            $title = 'Staff | Dashboard';
            return view('Staff.dashboard', compact('title'));
        }
        session()->flash('message', 'Logged in Successfully!');

        return view('Admin.index');
    }
    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->flash('message', 'You have been logged out successfully.');

        return redirect('/login');
    }
    public function profile(Request $request){
        return view('profile');
    }
    public function changePassword(Request $request){

        $validator = Validator::make($request->all(), [

            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Oops, Validator Failed!.....');
        }
        
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('message', 'New password & Current Password are same...');
        } else {
            $user->password = bcrypt($request->confirmPassword);
            $user->save();
            return redirect()->route('logout')->with('message', 'Password Changed Successfully');
        }
        
        
    }
    public function forgotPassword(){
        return view('forgot-password');
    }
    public function resetPassword(Request $request){
        $request->validate(['email' => 'required']);
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if(!$user){
            return redirect()->back()->with('message', 'Email does not exist');
        }
        $token = str::random(8);
    }
}
