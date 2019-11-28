<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskRefereneTrackingModel extends Model
{
    protected $table = "taskreferenetracking";
    protected $primaryKey = "TaskReferenceID";
    protected $fillable = ['TaskID', 'TemplateID','RefLink', 'CreatedDate',  'IsActive'];
     public $timestamps = false;
     public function Task()
    {
        return $this->belongsTo('App\EmailTaskModel','TaskID');
    }
     
   
}