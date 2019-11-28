<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTaskModelforScheduleType extends Model
{
    protected $table = "generatemailwithselection";
    protected $primaryKey = "GenerateMailWithSelectionID";
     protected $fillable = ['Name','MasterSelectionID','DepartmentMasterID','MailTemplateID','CategoryID', 'SubCategoryID' ,'UserSelectionID','EmailSendFromGroupDetailID','FileName','UseSQLServer','SQLConnectionString', 'ConnectionString','ReadColumnsFromCSV','CSVRecordCount',  'ReadColumnsFromDB','ReadColumnsAttrID', 'ScheduleType', 'NextScheduleUpload','ScheduleFromGenerate','ScheduleToGenerate', 'StopMails',  'CreatedBy','CreatedDate','Comments','IsTransactionEmail', 'IsAddRefTrack','IsRemoveHeader','MailHeader','IsAddUnsubscribeLinkInTemplate','MailSentCountPerHour'];
     public $timestamps = false;
}