<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllocatedDepartmentModel extends Model
{
    protected $table = "allocateddepartments";
    protected $primaryKey = "LoginDepartmentID";

      public function departments()
    {
        return $this->belongsTo('App\DepartmentMasterModel','DepartmentMasterID');
    }
     public function users()
    {
        return $this->belongsTo('App\LoginModel','EmailAddress','EmailAddress');
    }
}
