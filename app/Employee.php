<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Shift;
use App\Department;
use App\Designation;
class Employee extends Model
{
    protected $table='employee';


    public function attendance()
    {
        return $this->hasMany('App\Attendance', 'employee_id', 'id');
    }

    public function roles()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function shifts()
    {
        return $this->hasOne('App\Shift', 'id', 'shift_id');
    }

    public function departments()
    {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }

    public function designations()
    {
        return $this->hasOne('App\Designation', 'id', 'designation_id');
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
