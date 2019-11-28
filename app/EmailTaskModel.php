<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTaskModel extends Model
{
    protected $table = "generatemailwithselectionmaster";
    protected $primaryKey = "GenerateMailWithSelectionMasterID";
    protected $fillable = ['Name', 'DepartmentMasterID','MailTemplateID', 'CategoryID',  'SubCategoryID','UserSelectionID','EmailSendFromGroupDetailID','FileName','UseSQLServer','SQLConnectionString','ConnectionString','ReadColumnsFromCSV','CSVRecordCount','ScheduleType','NextScheduleUpload','ScheduleFromGenerate', 'ScheduleToGenerate','StopMails', 'CreatedBy','CreatedDate','Comments','IsTransactionEmail', 'IsAddRefTrack','IsRemoveHeader', 'MailHeader', 'IsAddUnsubscribeLinkInTemplate'];
    public $timestamps = false;

     public function TaskReferenceTracking()
    {
        return $this->hasOne('App\TaskRefereneTrackingModel','TaskID');
    }
    public function TaskTemplateSplitMaster()
    {
        return $this->hasOne('App\TaskTemplateSplitMasterModel','TaskID');
    }

       
}