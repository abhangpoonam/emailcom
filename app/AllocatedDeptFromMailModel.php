<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllocatedDeptFromMailModel extends Model
{
    protected $table = "allocateddeptfrommail";
    protected $primaryKey = "AllocatedDeptID";

    // public function getAllCategories(){
    //     $data = CategoryMasterModel::where('IsActive','1')->get(['CategoryMasterID','DepartmentMasterID','CategoryName','IsActive'])->toArray();
    //     return $data;
    // }
    
     public function departments()
    {
        return $this->belongsTo('App\DepartmentMasterModel','DepartmentMasterID');
    }
      public function emailsendgroup()
    {
        return $this->belongsTo('App\EmailSendFromGroupDetailModel','EmailSendFromGroupDetailID');
    }
    
   
}
