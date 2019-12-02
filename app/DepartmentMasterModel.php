<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentMasterModel extends Model
{
    protected $table = "departmentmaster";
    protected $primaryKey = "DepartmentMasterID";
   
    //  public function categories()
    // {
    //     return $this->hasMany('App\CategoryMasterModel','DepartmentMasterID');
    // }
      public function templates()
    {
        return $this->hasMany('App\TemplateMasterModel','DepartmentMasterID');
    }
     public function userselection()
    {
        return $this->hasMany('App\UserSelectionModel','DepartmentMasterID');
    }
      public function allocateduser()
    {
        return $this->hasMany('App\AllocatedDepartmentModel','DepartmentMasterID');
    }
    public function allocateddeptfrommail()
    {
        return $this->hasMany('App\AllocatedDeptFromMailModel','DepartmentMasterID');
    }
     public function EmailTask()
    {
        return $this->hasMany('App\EmailTaskModel','DepartmentMasterID');
    }
   
   
}
