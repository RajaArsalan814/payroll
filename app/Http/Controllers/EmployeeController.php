<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use App\Designation;
use App\Role;
use App\Shift;
use Storage;

class EmployeeController extends Controller
{
    public function create(){
        $isEdit=false;
        $employee=Employee::all();
        $department=Department::all();
        $designation=Designation::all();
        $role=Role::all();
        $shift=Shift::all();

        return view('employee.employee.create',compact($isEdit,'isEdit',$employee,'employee',$department,'department',
        $designation,'designation',$role,'role',$shift,'shift'));
    }

    public function index(){

        $employee=Employee::with('roles','shifts','designations','departments')->get();
        return view('employee.employee.employee',compact($employee,'employee'));
    }

    public function store(Request $request){

        // return $file;

        // $request->validate([
        //    'age'                 =>  'required|numeric',
        //     'hiring_date'        =>  'required',
        //     'date_of_birth'      =>  'required',
        //     'name'               =>  'required',
        //     'father_name'        =>  'required',
        //     'department_id'      =>  'required',
        //     'designation_id'     =>  'required',
        //     'nic'                =>  'required',
        //     'marital_status'     =>  'required',
        //     'address'            =>  'required',
        //     'contact_no'         =>  'required',
        //     'employee_type'      =>  'required',
        //     'code'               =>  'required',
        //     'mobile'             =>  'required',
        //     'bank_name'          =>  'required',
        //     'bank_branch'        =>  'required',
        //     'role_id'            =>  'required',
        //     'shift_id'           =>  'required',
        //     'account_no'         =>  'required',
        //     'confirmation_date'  =>  'required',
        //     'gender'             =>  'required',
        // ]);

        $employee=new Employee;
        $employee->age=$request->age;
        if($request->file('file')){
            $image=Storage::disk('public')->put('',$request->file);
        }
        $employee->image=$image;
        $employee->hiring_date=$request->hiring_date;
        $employee->date_of_birth=$request->date_of_birth;
        $employee->name=$request->name;
        $employee->father_name=$request->father_name;
        $employee->department_id=$request->department_id;
        $employee->designation_id=$request->designation_id;
        $employee->nic=$request->nic;
        $employee->marital_status=$request->marital_status;
        $employee->address=$request->address;
        $employee->contact_no=$request->contact_no;
        $employee->employee_type=$request->employee_type;
        $employee->code=$request->code;
        $employee->mobile=$request->mobile;
        $employee->bank_name=$request->bank_name;
        $employee->bank_branch=$request->bank_branch;
        $employee->role_id=$request->role_id;
        $employee->shift_id=$request->shift_id;
        $employee->account_no=$request->account_no;
        $employee->confirmation_date=$request->confirmation_date;
        $employee->gender=$request->gender;
        $employee->save();
        return redirect()->route('employees');
    }

    public function edit($id){
        $isEdit=true;
        $department=Department::all();
        $designation=Designation::all();
        $role=Role::all();
        $shift=Shift::all();
        $employee=Employee::with('roles','shifts','designations','departments')->where('id',$id)->first();
        return view('employee.employee.create',compact($employee,'employee',$isEdit,'isEdit',$department,'department',
        $designation,'designation',$role,'role',$shift,'shift'));
    }

    public function update(Request $request,$id){

        $employee=Employee::find($id);
        // if($request->file('file')){
        //     $image=Storage::disk('public')->put('',$request->file);
        // }
        // $employee->image=$image;
        $employee->age=$request->age;
        $employee->hiring_date=$request->hiring_date;
        $employee->date_of_birth=$request->date_of_birth;
        $employee->name=$request->name;
        $employee->father_name=$request->father_name;
        $employee->department_id=$request->department_id;
        $employee->designation_id=$request->designation_id;
        $employee->nic=$request->nic;
        $employee->marital_status=$request->marital_status;
        $employee->address=$request->address;
        $employee->contact_no=$request->contact_no;
        $employee->employee_type=$request->employee_type;
        $employee->code=$request->code;
        $employee->mobile=$request->mobile;
        $employee->bank_name=$request->bank_name;
        $employee->bank_branch=$request->bank_branch;
        $employee->role_id=$request->role_id;
        $employee->shift_id=$request->shift_id;
        $employee->account_no=$request->account_no;
        $employee->confirmation_date=$request->confirmation_date;
        $employee->gender=$request->gender;
        $employee->save();
        return redirect()->route('employees');
    }

    public function print($id){
        $employee=Employee::with('roles','shifts','designations','departments')->where('id',$id)->first();
        return view('employee.employee.print',compact($employee,'employee'));
    }
}
