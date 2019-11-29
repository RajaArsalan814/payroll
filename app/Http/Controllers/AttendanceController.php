<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Department;
use App\Designation;
use App\Role;
use Storage;
use Illuminate\Http\Request;
use DB;
use App\Shift;
use Carbon\Carbon;
use App\MachineAttendance;
use PDF;
use App\My;
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
        $designation=Designation::get();
        $department=Department::get();
        $isEdit=false;
        // $attendance=MachineAttendance::with('shift')->get();
        return view('employee.employee.attendance',compact($isEdit,'isEdit',$attendance,'attendance',$designation,'designation'
        ,$department,'department'));
    }


    public function index(){
        // SELECT column_name(s)
        // FROM table1        INNER JOIN table2        ON table1.column_name = table2.column_name;
$sql = "SELECT name,english,urdu,science,math,( english + urdu + science + math) AS total FROM `users` INNER JOIN `subjects` ON users.id=subjects.user_id";
        $sum_result = DB::select($sql);
        $employee=Employee::with('roles','shifts','designations','departments')->get();
        return view('employee.employee.employee',compact($employee,'employee',$sum_result,'sum_result'));
    }

    public function default_attendance(Request $request){

        $default_attendance=Attendance::with('employee')
        ->where('check_in_time','')->orwhere('check_out_time','')->get();
        //    $default_attendance=MachineAttendance::with('employee','shift')->where('check_in','')->orwhere('check_out','')->get();
           return view('employee.employee.default_attendance',compact($default_attendance,'default_attendance'));
       }
   

    public function default_attendanceCheckInEdit($id){
        $attendance=Attendance::with('employee')->where('id',$id)->first();
        // dd($attendance);
        return view('employee.employee.default_attendance_checkIn_edit',compact($attendance,'attendance'));
    }

    public function default_attendanceCheckOutEdit($id){
        $attendance=Attendance::with('employee')->where('id',$id)->first();
        // $attendance=MachineAttendance::with('employee')->where('id',$id)->first();
        return view('employee.employee.default_attendance_checkOut_edit',compact($attendance,'attendance'));
    }

    public function default_attendance_checkIn_Update(Request $request,$id){
        // $data=$request->check_in_time;
        // dd($data);
        $attendance=Attendance::where('id',$id)->first();        
        // $attendance=MachineAttendance::where('id',$id)->first();
        $attendance->check_in_time_modify=$request->check_in_time;
        $attendance->save();
        return redirect()->route('attendance.create');
    }

    public function default_attendance_checkOut_Update(Request $request,$id){
        $attendance=Attendance::where('id',$id)->first();        
        // $attendance=MachineAttendance::where('id',$id)->first();
        $attendance->check_out_time_modify=$request->check_out_time;
        // $attendance=MachineAttendance::where('id',$id)->first();
        // $attendance->check_out=$request->check_out;
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

    public function attendance_by_date(Request $request){

    // return    $employee=Employee::with('attendance')->get();
        $date = \Carbon\Carbon::parse($request->month);
        $month = $date->month;
        $year = $date->year;
        $department_id=$request->department_id;
        $designation_id=$request->designation_id;
        $attendance_search=Employee::with('attendance','departments','designations')->whereHas('attendance', function ($q) use($month,$year){
        $q->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year);
        })->whereHas('departments', function ($q) use($department_id){
            $q->where('department_id',$department_id);
            })->whereHas('designations', function ($q) use($designation_id){
                $q->where('designation_id',$designation_id);
                })->get();
        // return $request->all();
        //  return   Attendance::with(['employee' , function ($query) use ($request) {
        //     $query->where('designation_id',$request->designation_id);
        //     // $query->Where('id', '=',$request->department_id);
        // }])->get();
        $designation=Designation::get();
        $department=Department::get();

        // $attendance_search=Attendance::with('employee.designations','employee.departments')->whereHas('employee', function ($q) use($request){
        //     $q->where('designation_id', $request->designation_id);
        //     })
        //     ->whereHas('employee', function ($qu) use($request){
        //     $qu->where('department_id', $request->department_id);
        // })->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year)->orderBy('employee_id')->get();



// return $attendance=Attendance::with('employee.designations','employee.departments')->where('employee.designation_id',$request->designation_id)
//         ->get();
        return view('employee.employee.attendance_search',compact($attendance_search,'attendance_search',$designation,'designation',$department,'department'));
    }


    public function attendance_view($designation_id,$department_id,$month_year)
    {



        $date = \Carbon\Carbon::parse($month_year);
        $month = $date->month;
        $year = $date->year;


        // $attendance_view=Employee::with('attendance','departments','designations')->whereHas('attendance', function ($q) use($month,$year){
        //     $q->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year);
        // })->get();

        $attendance_view=Employee::with('attendance','departments','designations')->whereHas('attendance', function ($q) use($month,$year){
            $q->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year);
            })->whereHas('departments', function ($q) use($department_id){
                $q->where('department_id',$department_id);
                })->whereHas('designations', function ($q) use($designation_id){
                    $q->where('designation_id',$designation_id);
                    })->paginate(1);
                    // $pdf =PDF::loadView('employee.employee.attendance_view',compact('attendance_view'));
                    // return $pdf->download('ars.pdf');
                    // $pdf = PDF::loadView('employee.employee.attendance_view',compact('attendance_view', $attendance_view));  
                    // return $pdf->download('medium.pdf');

// dd($attendance_view);
        // $attendance_view=Attendance::with('employee.shifts','employee.designations','employee.departments')->whereHas('employee', function ($q) use($designation_id){
        //     $q->where('designation_id', $designation_id);
        //     })
        //     ->whereHas('employee', function ($qu) use($department_id){
        //     $qu->where('department_id', $department_id);
        // })->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year)->groupBy('employee_id')->get();

        // $attendance_view_table=Attendance::with('employee.shifts','employee.designations','employee.departments')->whereHas('employee', function ($q) use($designation_id){
        //     $q->where('designation_id', $designation_id);
        //     })
        //     ->whereHas('employee', function ($qu) use($department_id){
        //     $qu->where('department_id', $department_id);
        // })->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year)->orderBy('employee_id')->get();

// $attendance_view=Attendance::with('employee.shifts','employee.designations','employee.departments')->where('attendance_date',$date)->get();

        return view('employee.employee.attendance_view',compact($attendance_view,'attendance_view'));

    }

    public function pdf($designation_id,$department_id,$month_year){
        

        $date = \Carbon\Carbon::parse($month_year);
        $month = $date->month;
        $year = $date->year;

        $attendance_view=Employee::with('attendance','departments','designations')->whereHas('attendance', function ($q) use($month,$year){
            $q->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year);
            })->whereHas('departments', function ($q) use($department_id){
                $q->where('department_id',$department_id);
                })->whereHas('designations', function ($q) use($designation_id){
                    $q->where('designation_id',$designation_id);
                    })->paginate(1);

        // return view('employee.employee.pdf_view',compact($my,'my'));
          $pdf = PDF::loadView('employee.employee.pdf_view', compact('attendance_view',$attendance_view));  
          return $pdf->stream();
        //   return $pdf->download('medium.pdf');
    }

 
}
