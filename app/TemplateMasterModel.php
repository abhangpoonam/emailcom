<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateMasterModel extends Model
{
    protected $table = "mailtemplate";
    protected $primaryKey = "MailTemplateID";

    public function departments()
    {
        return $this->belongsTo('App\DepartmentMasterModel','DepartmentMasterID');
    }
    public function EmailTask()
    {
        return $this->hasMany('App\EmailTaskModel','MailTemplateID');
    }
     public function TaskTemplateSplitDetails()
    {
        return $this->hasMany('App\TaskTemplateSplitDetailsModel','MailTemplateID');
    }
    
}
