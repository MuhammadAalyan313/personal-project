<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LeadController extends Controller
{
    public function index(){
        $users = User::get()->all();
        
        $title = 'Leads | Dashboard';
        // dd($users, $title);
        return view('leads', compact('users','title'));
    }
    public function create(Request $request){
        validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'title' => 'required',
            'phone' => 'required',
            'company' => 'required',  
        ]);
        $user = Auth::user();
        // dd($user->username);
       $data =  Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'title' => $request->title,
            'phone' => $request->phone,
            'company' => $request->company,
            'message' => $request->message,
            'lead_source' => $request->lead_source,
            'lead_status' => $request->lead_status,
            'user_id' => $user->id,
            'assigned_to' => $request->assigned_to,
        ]);
        return redirect()->back();
    }
}
