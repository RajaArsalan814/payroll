<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Shift;
use App\Department;
use App\Employee;
class MachineAttendance extends Model
{
    protected $table='attendance_machine';

    public function employee()
    {
        return $this->hasOne('App\Employee', 'id', 'employee_id');
    }

    public function shift()
    {
        return $this->hasOne('App\Shift', 'id', 'shift_id');
    }

    public $timestamps=false;


    // public function shifts()
    // {
    //     return $this->hasOne('App\Shift', 'id', 'shift_id');
    // }

    // public function departments()
    // {
    //     return $this->hasOne('App\Department', 'id', 'department_id');
    // }

    // public function designations()
    // {
    //     return $this->hasOne('App\Designation', 'id', 'designation_id');
    // }

    // public function getDateFormat()
    // {
    //     return 'Y-m-d H:i:s.u';
    // }
}
