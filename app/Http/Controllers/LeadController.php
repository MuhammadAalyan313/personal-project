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
        $data['users'] = User::get()->all();
        $data['title'] = 'Create | Leads';
        return view('Leads/create-leads', $data);
    }
    public function edit($id){
        $lead = Lead::find($id);
        $users = User::all();
        $title = "Edit | Lead";
        return view('Leads.edit-lead', compact('lead', 'title', 'users'));
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
    public function show(Request $request){
        // dd($request->all());
        $data['users'] = Lead::all();
        $data['title'] = "Show | Leads";
        return view('Leads.show-leads', $data);
    }
    public function update(Request $request, $id){
        $user = Auth::user();
        validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'title' => 'required',
            'phone' => 'required',
            'company' => 'required',  
        ]);
        $data = Lead::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->title = $request->title;
        $data->phone = $request->phone;
        $data->company = $request->company;
        $data->message = $request->message;
        $data->lead_source = $request->lead_source;
        $data->lead_status = $request->lead_status;
        $data->user_id = $user->id;
        $data->assigned_to = $request->assigned_to;
        $data->save();
        return redirect()->back();
    }
}
