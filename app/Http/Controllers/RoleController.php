<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use DB;
class RoleController extends Controller
{
    public function create(){




        $isEdit=false;
        $role=role::all();

        return view('employee.role.create',compact($isEdit,'isEdit',$role,'role'));
    }

    public function index(){
        $role=Role::all();
        return view('employee.role.role',compact($role,'role'));
    }

    public function store(Request $request){

        $role=new Role;
        $role->role_desc=$request->role_desc;
        $role->save();
        return redirect()->route('roles');
    }

    public function edit($id){
        $isEdit=true;
        $role=Role::where('id',$id)->first();
        return view('employee.role.create',compact($role,'role',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){

        $role=Role::find($id);
        $role->role_desc=$request->role_desc;
        $role->save();
        return redirect()->route('roles');
    }


}
