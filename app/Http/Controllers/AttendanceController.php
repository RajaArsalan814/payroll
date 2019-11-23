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
use App\MachineAttendance;
class AttendanceController extends Controller
{
    public function create(){

        // $input  = '11-08-1990 23:23:00';
// return           $checktime=MachineAttendance::get();
//                     $new_date = date("Y-m-d ",strtotime($checktime));
//             $time = date("H:i:s",strtotime($checktime));
// return      $checktime=MachineAttendance::whereDate('CHECKTIME',$new_date)->where('USERID','36')->get();
//       $new_date = date("Y-m-d ",strtotime($checktime));
//       return  $checktime=MachineAttendance::whereTime('CHECKTIME',$checktime->CHECKTIME)->get();
// return  $checktime=MachineAttendance::whereTime('CHECKTIME',$new_date)->get();


//  $date = Carbon::createFromFormat($format, $input);
        // return $get_time->CHECKTIME;
        // $day = Carbon::createFromFormat('Y-m-d', $get_time->CHECKTIME)->day();
        // dd($day);
    // $start = Carbon::parse($get_time)->format('Y-m-d');

// $report = Reports::with('booking')->whereDate('created_at','>=',$start)->WhereDate('created_at','<=',$end)->get();



            // return $to = \Carbon\Carbon::createFromFormat('Y-m-d', $get_time);
// return            $to = \Carbon\Carbonformat('M d Y',$get_time);
        // return MachineAttendance::all();
// return        MachineAttendance::where('CHECKTIME',$get_time)->get();
        // $to = \Carbon\Carbon::createFromFormat(' H:s', '02:00');
        // $from = \Carbon\Carbon::createFromFormat(' H:s', '03:00');


        // $diff_in_minutes = $to->diffInMinutes($from);
        $attendance=Attendance::with('employee.shifts')->get();

        $isEdit=false;
        // $attendance=MachineAttendance::with('shift')->get();
        return view('employee.employee.attendance',compact($isEdit,'isEdit',$attendance,'attendance'));
    }

    public function default_attendance(){

        $default_attendance=MachineAttendance::with('employee','shift')->where('check_in','')->orwhere('check_out','')->get();
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

        $attendance=Attendance::with('employee.shifts')->where('attendance_date',$request->date)->get();
        return view('employee.employee.attendance',compact($attendance,'attendance'));
    }

    public function default_attendanceCheckInEdit($id){
        $attendance=MachineAttendance::with('employee')->where('id',$id)->first();
        return view('employee.employee.default_attendance_checkIn_edit',compact($attendance,'attendance'));
    }

    public function default_attendanceCheckOutEdit($id){
        $attendance=MachineAttendance::with('employee')->where('id',$id)->first();
        return view('employee.employee.default_attendance_checkOut_edit',compact($attendance,'attendance'));
    }

    public function default_attendance_checkIn_Update(Request $request,$id){
        $attendance=MachineAttendance::where('id',$id)->first();
        $attendance->check_in=$request->check_in;
        $attendance->save();
        return redirect()->route('attendance.create');
    }

    public function default_attendance_checkOut_Update(Request $request,$id){
        $attendance=MachineAttendance::where('id',$id)->first();
        $attendance->check_out=$request->check_out;
        $attendance->save();
        return redirect()->route('attendance.create');
    }

    public function default_attendance_by_date(Request $request){

            $default_attendance=MachineAttendance::where('date', $request->date)->Where(function ($query) {
            $query->orWhere('check_in', '')
                ->orWhere('check_out', '');
    })->get();
// return        $default_attendance=Attendance::with('employee')->where('date',$request->date)->orwhere('check_in','')->orwhere('check_out','')->get();
        return view('employee.employee.default_attendance',compact($default_attendance,'default_attendance'));
    }

}
