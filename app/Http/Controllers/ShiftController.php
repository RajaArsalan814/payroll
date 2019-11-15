<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shift;
use DB;
use Carbon\Carbon;
class ShiftController extends Controller
{
    public function create(){




        $isEdit=false;
        // $employee=Employee::all();
        // $department=Department::all();
        // $designation=Designation::all();
        // $role=Role::all();
        $shift=Shift::all();

        return view('employee.shift.create',compact($isEdit,'isEdit',$shift,'shift'));
    }

    public function index(){
        $shift=Shift::all();
        return view('employee.shift.shift',compact($shift,'shift'));
    }

    public function store(Request $request){

        $shift=new Shift;
        $shift->shift_desc=$request->shift_desc;
        $shift->start_time=$request->start_time;
        $shift->end_time=$request->end_time;
        $shift->save();
        return redirect()->route('shifts');
    }

    public function edit($id){
        $isEdit=true;
        // $department=Department::all();
        // $designation=Designation::all();
        // $role=Role::all();
        $shift=Shift::where('id',$id)->first();
        // $employee=Employee::with('roles','shifts','designations','departments')->where('id',$id)->first();
        return view('employee.shift.create',compact($shift,'shift',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){

        $shift=Shift::find($id);
        // if($request->file('file')){
        //     $image=Storage::disk('public')->put('',$request->file);
        // }
        // $employee->image=$image;
        $shift->shift_desc=$request->shift_desc;
        $shift->start_time=$request->start_time;
        $shift->end_time=$request->end_time;
        $shift->save();
        return redirect()->route('shifts');
    }


}
