<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskTemplateSplitDetailsModel extends Model
{
    protected $table = "tasktemplatesplitdetails";
    protected $primaryKey = "TaskSplitTemplateID";
    protected $fillable = ['TaskSplitMasterID', 'TaskID','MailTemplateID','IsActive'];
     public $timestamps = false;
     
     public function TaskTemplateSplitMaster()
    {
        return $this->belongsTo('App\TaskTemplateSplitMasterModel','TaskSplitMasterID');
    }
     
     
    
   
}
