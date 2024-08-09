<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Observers\acceptOrDeclineObserver;
use App\Notifications\acceptOrDeclineNotify;
class LeadController extends Controller
{
    public function index()
    {
        $data['users'] = User::get()->all();
        $data['title'] = 'Create | Leads';
        return view('Staff.Leads/create-leads', $data);
    }
    public function edit($id)
    {
        $lead = Lead::find($id);
        $users = User::all();
        $title = "Edit | Lead";
        return view('Staff.Leads.edit-lead', compact('lead', 'title', 'users'));
    }
    public function create(Request $request)
    {
        validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'title' => 'required',
            'phone' => 'required',
            'company' => 'required',
        ]);
        $user = Auth::user();
        $data = Lead::create([
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
        return redirect()->back()->with([
            'message' => 'Data Submitted Successfully!',
            'alert-type' => 'success'
        ]);
    }
    public function show(Request $request)
    {
        $users = Lead::latest()->paginate(6);
        $title = "Show | Leads";
        $lead = Lead::all();
        return view('Staff.Leads.show-leads', compact('users','lead', 'title'));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        validator::make($request->all(), [
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
        return redirect()->back()->with([
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ]);
    }
    public function delete($id)
    {
        $data = Lead::find($id);
        $data->delete();
        return redirect()->back()->with([
            'message' => 'Data Moved to Trash',
            'alert-type' => 'success'
        ]);
    }
    public function trashed()
    {
     $title = "Trashed | Leads";
     $users = Lead::onlyTrashed()->latest()->paginate(6);
     return view('Staff.Leads.trashed', compact('users', 'title'))->with([
        'message' => 'Data Restored Successfully!',
        'alert-type' => 'success',
     ]);
     
    }
    public function restore($id){
        $data = Lead::withTrashed()->find($id);
        $data->restore();
        return redirect()->back()->with([
            'message' => 'Data Restored Successfully!',
            'alert-type' => 'success',
         ]);
    }
    public function accept(Request $request, Lead $lead)
    {
        $lead->update(['status' => 'accepted']);
        return redirect()->back()->with([
            'message' => 'Task accepted successfully.',
            'alert-type' => 'success',
        ]);
    }
    public function showAssigner($id){
        $lead = Lead::where('id', $id)->first();
        $title = 'Show | Task Detail';
        $data = auth()->user()->notifications;
        return view('show-task-detail', compact('lead', 'title','data'));
    }
}
