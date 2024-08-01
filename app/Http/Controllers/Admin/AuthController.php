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
use Carbon\Carbon;
use DB;


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
        return redirect()->back()->with([
            'message' => 'Incorrect Email or Password',
            'alert-type' => 'error',
        ]);
    }
    public function dashboard()
    {
        $role = Auth::user()->role_id;
        if($role == 1){
            $title = 'User | Dashboard';
            return view('User.dashboard', compact('title'))->with([
                'message' => 'LoggedIn Successfully!',
                'alert-type' => 'success',
            ]);
        }
        elseif($role == 3){
            $title = 'Staff | Dashboard';
            return view('Staff.dashboard', compact('title'))->with([
                'message' => 'LoggedIn Successfully!',
                'alert-type' => 'success',
            ]);
        }
        elseif($role == 2){
            $title = 'Admin | Dashboard';
            return view('Admin.dashboard', compact('title'))->with([
                'message' => 'LoggedIn Successfully!',
                'alert-type' => 'success',
            ]);
        }
        $title = 'Index | Page';
        return view('Admin.index', compact('title'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with([
            'message' => 'You have logged out Successfully!',
            'alert-type' => 'success',
        ]);
    }
    public function profile(Request $request){
        $data = Auth::user();
        $title = 'Profile | Page';
        return view('profile2', compact('title', 'data'));
    }
    public function editProfile($id){
        $data = User::find($id);
        $title = 'Edit | Profile';
        return view('edit-profile', compact('data', 'title'));
    }
 
    public function updateProfile(Request $request, $id){
        $data = User::find($id);
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->update();
        return redirect()->back()->with([
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ]);

      
    }
    public function updatePhoto(Request $request, $id){
        $data = User::find($id);
        $photo = $request->file('photo');
        if($photo){
        $fileName = time().'_'.$photo->getClientOriginalExtension();
        $filePath = $photo->move(public_path('img'), $fileName);
        $data->photo = $fileName;
        $data->save();
        return redirect()->back()->with([
            'message' => "Photo Updated Successfully!",
            'alert-type' => 'success',
        ]);
    }
    else{
        return 'No Photo';
    }
    }
    public function changePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'message' => 'Oops, Validator Failed!.....',
                'alert-type' => 'success',
            ]);
        }
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            return redirect()->back()->with([
                'message' => 'New password & Current Password are same...',
                'alert-type' => 'warning',
            ]);
        } else {
            $user->password = bcrypt($request->confirmPassword);
            $user->save();
            return redirect()->route('logout')->with([
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success',
            ]);
        }
    }
    public function forgotPassword(){
        return view('forgot-password');
    }
    public function generateToken(Request $request){
        $request->validate(['email' => 'required']);
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if(!$user){
            return redirect()->back()->with([
                'message' => 'Email does not exist',
                'alert-type' => 'error',
            ]);
        }
        $token = str::random(8);
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
            'expires_at' => Carbon::now()->addMinute(10),
        ]);
        return view('verify-token', compact('token'));
    }
    public function verifyTokenOnly(Request $request){
        $token = $request->token;
        $request->validate([
            'token' => 'required',
        ]);
        $checkToken = DB::table('password_resets')->where('token', $token)
        ->where('expires_at', '>', Carbon::now())
        ->first();
        return redirect()->route('new.password');
    }
    public function newPassword(Request $request){
        return view('new-password');      
    }
    public function saveNewPassword(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password|min:6',
            'email' => 'required|email:unique',
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user->email){
            return redirect()->back()->with([
                'message' => 'Email not Found!',
                'alert-type' => 'error',
            ]);
        }
        $user->password = bcrypt($request->confirmPassword);
        $user->save();
        DB::table('password_resets')->where('email', $user->email)->delete();
        return redirect()->route('login')->with([
            'message' => 'New password set successfully!',
            'alert-type' => 'success',
        ]);
    }
}
