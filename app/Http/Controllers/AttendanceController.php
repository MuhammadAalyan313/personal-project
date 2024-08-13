<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\attendance;
class AttendanceController extends Controller
{
    public function showAttendanceRecord(){
        $title = "Employee | Attendance";
        $attendance = attendance::get()->all();
        return view('EmployeeAttendance', compact('title', 'attendance'));
    }
    public function checkIn(Request $request){
        $id = Auth::user()->id;
        $attendanceCheck = attendance::where('user_id', $id)
        ->whereNull('check_out')
        ->latest('check_in')
        ->first();
        if($attendanceCheck){
            return redirect()->back()->with([
                'message' => 'Already CheckedIn',
                'alert-type' => 'error',
            ]);
        }
        $attendance = attendance::create([
            'user_id' => $id,
            'check_in' => Carbon::now(),
        ]);
        return redirect()->back()->with([
            'message' => 'Checked in successfully!',
            'alert-type' => 'success',
        ]);
    }
    public function checkOut($id){
        $attendance = attendance::where('user_id' , $id)
        ->whereNull('check_out')
        ->latest('check_in')
        ->first();
        if($attendance){
            $attendance->update([
                'check_out' => Carbon::now(),
                'total_hours' => Carbon::now()->diffInMinutes($attendance->check_in),
            ]);
            return redirect()->back()->with([
                'message' => 'Checked Out Successfully!',
                'alert-type' => 'success',
            ]);
        }
        else{
            return redirect()->back()->with([
                'message' => 'No Check In Record Found....!!',
                'alert-type' => 'error',
            ]);
        }
    }
}
