<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Department;
use App\Role;
use Storage;
use Illuminate\Http\Request;
use DB;
use App\Shift;
use Carbon\Carbon;
class AttendanceController extends Controller
{
    public function create(){

        $to = \Carbon\Carbon::createFromFormat(' H:s', '02:00');
        $from = \Carbon\Carbon::createFromFormat(' H:s', '03:00');


        $diff_in_minutes = $to->diffInMinutes($from);
        $attendance=Attendance::with('shift','employee')->get();

        $isEdit=false;

        return view('employee.employee.attendance',compact($isEdit,'isEdit',$attendance,'attendance'));
    }

    public function default_attendance(){

        $default_attendance=Attendance::with('employee')->where('check_in','')->orwhere('check_out','')->get();
        return view('employee.employee.default_attendance',compact($default_attendance,'default_attendance'));
    }

    public function index(){
        // SELECT column_name(s)
        // FROM table1        INNER JOIN table2        ON table1.column_name = table2.column_name;
$sql = "SELECT name,english,urdu,science,math,( english + urdu + science + math) AS total FROM `users` INNER JOIN `subjects` ON users.id=subjects.user_id";
        $sum_result = DB::select($sql);
        $employee=Employee::with('roles','shifts','designations','departments')->get();
        return view('employee.employee.employee',compact($employee,'employee',$sum_result,'sum_result'));
    }
    public function attendance_by_date(Request $request){

        $attendance=Attendance::with('employee')->where('date',$request->date)->get();
        return view('employee.employee.attendance',compact($attendance,'attendance'));
    }

    public function default_attendanceCheckInEdit($id){
        $attendance=Attendance::with('employee')->where('id',$id)->first();
        return view('employee.employee.default_attendance_checkIn_edit',compact($attendance,'attendance'));
    }

    public function default_attendanceCheckOutEdit($id){
        $attendance=Attendance::with('employee')->where('id',$id)->first();
        return view('employee.employee.default_attendance_checkOut_edit',compact($attendance,'attendance'));
    }

    public function default_attendance_checkIn_Update(Request $request,$id){
        $attendance=Attendance::where('id',$id)->first();
        $attendance->check_in=$request->check_in;
        $attendance->save();
        return redirect()->route('attendance.create');
    }

    public function default_attendance_checkOut_Update(Request $request,$id){
        $attendance=Attendance::where('id',$id)->first();
        $attendance->check_out=$request->check_out;
        $attendance->save();
        return redirect()->route('attendance.create');
    }

    public function default_attendance_by_date(Request $request){

            $default_attendance=Attendance::where('date', $request->date)->Where(function ($query) {
            $query->orWhere('check_in', '')
                ->orWhere('check_out', '');
    })->get();
// return        $default_attendance=Attendance::with('employee')->where('date',$request->date)->orwhere('check_in','')->orwhere('check_out','')->get();
        return view('employee.employee.default_attendance',compact($default_attendance,'default_attendance'));
    }

}
