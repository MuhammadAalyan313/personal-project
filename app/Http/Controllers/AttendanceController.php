<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showAttendanceRecord(){
        $title = "Employee | Attendance";
        return view('EmployeeAttendance', compact('title'));
    }
    public function checkIn(Request $request){
        dd($request);
    }
}
