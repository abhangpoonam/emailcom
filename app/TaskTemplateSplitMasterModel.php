<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskTemplateSplitMasterModel extends Model
{
    protected $table = "tasktemplatesplitmaster";
    protected $primaryKey = "TaskSplitMasterID";
    protected $fillable = ['TaskID', 'Unit','Quantity', 'AutoCalResultDateTime',  'IsActive','CreatedBy','CreatedDate'];
     public $timestamps = false;
     public function Task()
    {
        return $this->belongsTo('App\EmailTaskModel','TaskID');
    }

    public function TaskTemplateSplitDetails()
    {
        return $this->hasMany('App\TaskTemplateSplitDetailsModel','TaskSplitMasterID');
    }
   
}
