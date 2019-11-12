<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Shift;
use App\Department;
use App\Designation;
class Amount extends Model
{
    protected $table='amount';


    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
