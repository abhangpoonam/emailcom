<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskTemplateSplitDetailsModel extends Model
{
    protected $table = "tasktemplatesplitdetails";
    protected $primaryKey = "TaskSplitTemplateID";
    protected $fillable = ['TaskSplitMasterID', 'TaskID','MailTemplateID','IsActive'];
     public $timestamps = false;
      protected $with= ['template'];
     
     public function TaskTemplateSplitMaster()
    {
        return $this->belongsTo('App\TaskTemplateSplitMasterModel','TaskSplitMasterID');
    }
      public function template()
    {
        return $this->belongsTo('App\TemplateMasterModel','MailTemplateID');
    }
     
    
   
}
