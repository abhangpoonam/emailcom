<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTaskModel extends Model
{
    protected $table = "generatemailwithselectionmaster";
    protected $primaryKey = "GenerateMailWithSelectionMasterID";
    protected $fillable = ['Name', 'DepartmentMasterID','MailTemplateID', 'CategoryID',  'SubCategoryID','UserSelectionID','EmailSendFromGroupDetailID','FileName','UseSQLServer','SQLConnectionString','ConnectionString','ReadColumnsFromCSV','CSVRecordCount','ScheduleType','NextScheduleUpload','ScheduleFromGenerate', 'ScheduleToGenerate','StopMails', 'CreatedBy','CreatedDate','Comments','IsTransactionEmail', 'IsAddRefTrack','IsRemoveHeader', 'MailHeader', 'IsAddUnsubscribeLinkInTemplate'];
    public $timestamps = false;
   protected $with = ['EmailTaskforScheduleType','departments', 'UserSelection','Template', 'category','subcategory', 'EmailSendFromGroupDetail','TaskReferenceTracking','TaskTemplateSplitMaster'];

     public function TaskReferenceTracking()
    {
        return $this->hasOne('App\TaskRefereneTrackingModel','TaskID');
    }
    public function TaskTemplateSplitMaster()
    {
        return $this->hasOne('App\TaskTemplateSplitMasterModel','TaskID');
    }
    public function EmailTaskforScheduleType()
    {
        return $this->hasOne('App\EmailTaskModelforScheduleType','MasterSelectionID');
    }
    public function departments()
    {
        return $this->belongsTo('App\DepartmentMasterModel','DepartmentMasterID');
    }
     public function UserSelection()
    {
        return $this->belongsTo('App\UserSelectionModel','UserSelectionID');
    }
     public function Template()
    {
        return $this->belongsTo('App\TemplateMasterModel','MailTemplateID');
    }
     public function category()
    {
        return $this->belongsTo('App\CategoryMasterModel','CategoryID');
    }
     public function subcategory()
    {
        return $this->belongsTo('App\SubCategoryMasterModel','SubCategoryID');
    }
    public function EmailSendFromGroupDetail()
    {
        return $this->belongsTo('App\EmailSendFromGroupDetailModel','EmailSendFromGroupDetailID');
    }

       
}