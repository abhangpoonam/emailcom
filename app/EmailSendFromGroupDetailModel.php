<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSendFromGroupDetailModel extends Model
{
    protected $table = "emailsendfromgroupdetail";
    protected $primaryKey = "EmailSendFromGroupDetailID";

   
     public function allocateddeptfrommail()
    {
        return $this->hasMany('App\AllocatedDeptFromMailModel','EmailSendFromGroupDetailID');
    }

}
