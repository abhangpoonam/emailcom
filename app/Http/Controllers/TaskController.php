<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
// use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\LoginModel;
use App\DepartmentMasterModel;
use App\CategoryMasterModel;
use App\SubCategoryMasterModel;
use App\TemplateMasterModel;
use App\UserSelectionModel;
use App\AllocatedDeptFromMailModel;
use App\EmailSendFromGroupDetailModel;
use App\SqlServerConnectionMasterModel;
use App\EmailTaskModel;
use App\EmailTaskModelforScheduleType;
use App\TaskRefereneTrackingModel;
use App\TaskTemplateSplitMasterModel;
use App\TaskTemplateSplitDetailsModel;



class TaskController extends Controller
{

    public function addemailtask(){
        $SqlServerConnections=SqlServerConnectionMasterModel::all();   
        //logged in user dept
        $username=Session::get('email');
        $loginuserdept = LoginModel::with('allocateddept')->where('EmailAddress', '=', $username)->first();
       $departmentsid=$loginuserdept->allocateddept->pluck('DepartmentMasterID'); 
       $departments = DepartmentMasterModel::whereIn('DepartmentMasterID',$departmentsid)->get();
        return view('Task.addemailtask', compact('departments','SqlServerConnections'));
        
    }
    function loadcategory( Request $request )
    {
        
         $category = [];$fromemail=[];$template=[];$userselection=[];

           $categories = CategoryMasterModel::all();          
          foreach( $categories as $state )
          {
             $category[$state->CategoryID] = $state->CategoryName;
          }
          $newdata["category"][] = $category;
          //templates
          $template=$this->loadtemplate($request);
          $newdata["template"][] = $template;
          //userselection
          $userselection=$this->load_userselection($request);
          $newdata["userselection"][] = $userselection;           
            //loadfromemail
           $fromemail=$this->load_fromemail($request);
           $newdata["fromemail"][] = $fromemail;
           
           echo json_encode($newdata);

            

    }
    function loadtemplate(Request $request )
    {
        //dd($request);
          $template = [];
          $templates = DepartmentMasterModel::find($request->get('id'))->templates;          
          foreach( $templates as $state )
          {
             $template[$state->MailTemplateID] = $state->Name;
          }
          return $template;

    }
    function load_userselection(Request $request )
    {
          $userselection = [];
          $userselections = DepartmentMasterModel::find($request->get('id'))->userselection;          
          foreach($userselections as $state )
          {
             $userselection[$state->UserSelectionID] = $state->UserSelectionName;
          }
          return $userselection;

    }
    function load_fromemail(Request $request )
    {
          $fromemail = []; 

      $allocateddept =AllocatedDeptFromMailModel::with('departments')->where('DepartmentMasterID', '=', $request->get('id'))->get();
      $groupids=$allocateddept->pluck('EmailSendFromGroupDetailID'); 
       $emailsendgroups = EmailSendFromGroupDetailModel::whereIn('EmailSendFromGroupDetailID',$groupids)->get();
     
                  foreach($emailsendgroups as $state )
                  {

                     $fromemail[$state->EmailSendFromGroupID] = $state->EmailAddress;
                  }

           
          return $fromemail;

    }
    
    function loadsubcategory( Request $request )
    {
        
           $subcategories = CategoryMasterModel::find($request->get('id'))->subcategories;
          $output = [];
          foreach( $subcategories as $state )
          {
             $output[$state->SubCategoryID] = $state->SubCategoryName;
          }
          return $output;
    }
    function upload_task_csv( Request $request )
    { 
       
        $file = $request->file('files'); 
        $getPath = $file->getRealPath();
        $file_name = $file->getClientOriginalName();
         $row = 1; $present=0;
        if (($handle = fopen($getPath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
               
                for ($c=0; $c < $num; $c++) {
                  
                    if($data[$c]==" ")$row++;
                    elseif ($data[$c]=="EmailAddress")
                    {
                         $new_name = $file_name."_".date('m-d-Y-His'). '.' . $file->getClientOriginalExtension();
                            $file->move(public_path('uploads'), $new_name);
                            return response()->json([
                           'message'   => 'file Upload Successfully',
                           'file_url' => '/public/upload/'.$new_name,
                           'present'=>$present,
                           'rows'=>$num
                          ]);


                    }

                   
                }
            }

            fclose($handle);
        }
            if($present==0)
            
                {
                   
                     return response()->json([
                   'message'   => "EmailAddress not exists in attached file.",
                   'file_url' => $file_name,
                   'present'=>$present
                  ]);
                    
                }

   }
   function store_task(Request $request)
   {

          $task1 = EmailTaskModel::create([
                 'Name' => $request->taskname,
                 'DepartmentMasterID' => $request->department,
                 'MailTemplateID' => $request->template,
                 'CategoryID' => $request->category,
                 'SubCategoryID' => $request->subcategory,
                 'UserSelectionID' => isset($request->userselection) ? $request->userselection : 0,
                 'EmailSendFromGroupDetailID' => $request->fromemail,
                 'FileName' => $request->sourcefile,
                 'UseSQLServer' => isset($request->selectiontyperadio) ? 1 : 0,
                 'SQLConnectionString' => $request->source,
                 'ConnectionString' => '',
                 'ReadColumnsFromCSV' =>'',
                 'CSVRecordCount' => $request->sourcefilecount,                 
                 'ScheduleType' => $request->scheduletype,
                 'NextScheduleUpload' => $request->datauploaddate." ".$request->datauploaddate_hh.":".$request->datauploaddate_mm.":".$request->datauploaddate_ss,
                 'ScheduleFromGenerate'=> $request->sendmailstartdate." ".$request->sendmailstartdate_hh.":".$request->sendmailstartdate_mm.":".$request->sendmailstartdate_ss,
                 'ScheduleToGenerate' => $request->sendmailenddate." ".$request->sendmailenddate_hh.":".$request->sendmailenddate_mm.":".$request->sendmailenddate_ss,
                 'StopMails' => isset($request->taskstartedradio) ? 1 : 0,                 
                 'CreatedBy' => Session::get('email'),
                 'CreatedDate' => now(),
                 'Comments' => '',
                 'IsTransactionEmail' => isset($request->transactionmail) ? 1 : 0,
                 'IsAddRefTrack' => isset($request->reftracking) ? 1 : 0,
                 'IsRemoveHeader' => isset($request->remvmailheaderchkbox) ? 1 : 0,
                 'MailHeader' => $request->mailheadertext,                 
                 'IsAddUnsubscribeLinkInTemplate' =>isset($request->unsublink) ? 1 : 0
                 ]);
          $p1=$task1->save();  

           $task2 = EmailTaskModelforScheduleType::create([
                 'Name' => $request->taskname,
                 'MasterSelectionID'=>$task1->GenerateMailWithSelectionMasterID,
                 'DepartmentMasterID' => $request->department,
                 'MailTemplateID' => $request->template,
                 'CategoryID' => $request->category,
                 'SubCategoryID' => $request->subcategory,
                 'UserSelectionID' => isset($request->userselection) ? $request->userselection : 0,
                 'EmailSendFromGroupDetailID' => $request->fromemail,
                 'FileName' => $request->sourcefile,
                 'UseSQLServer' => isset($request->selectiontyperadio) ? 1 : 0,
                 'SQLConnectionString' => $request->source,
                 'ConnectionString' => '',
                 'ReadColumnsFromCSV' =>'',
                 'CSVRecordCount' => $request->sourcefilecount,  
                 'ReadColumnsFromDB'=>null,
                 'ReadColumnsAttrID'=>null,  

                   'ScheduleType' => $request->scheduletype,
                 'NextScheduleUpload' => $request->datauploaddate." ".$request->datauploaddate_hh.":".$request->datauploaddate_mm.":".$request->datauploaddate_ss,
                 'ScheduleFromGenerate'=> $request->sendmailstartdate." ".$request->sendmailstartdate_hh.":".$request->sendmailstartdate_mm.":".$request->sendmailstartdate_ss,
                 'ScheduleToGenerate' => $request->sendmailenddate." ".$request->sendmailenddate_hh.":".$request->sendmailenddate_mm.":".$request->sendmailenddate_ss,
                 'StopMails' => isset($request->taskstartedradio) ? 1 : 0,                 
                 'CreatedBy' => Session::get('email'),
                 'CreatedDate' => now(),          
               
                 'Comments' => '',
                 'IsTransactionEmail' => isset($request->transactionmail) ? 1 : 0,
                 'IsAddRefTrack' => isset($request->reftracking) ? 1 : 0,
                 'IsRemoveHeader' => isset($request->remvmailheaderchkbox) ? 1 : 0,
                 'MailHeader' => $request->mailheadertext,                 
                 'IsAddUnsubscribeLinkInTemplate' =>isset($request->unsublink) ? 1 : 0,
                 'MailSentCountPerHour'=>$request->mailsendspeed

                 ]);
          $p2=$task2->save();
          if(isset($request->reftracking))
           {
              $task3 = TaskRefereneTrackingModel::create([               
                 'TaskID' => $task1->GenerateMailWithSelectionMasterID,
                 'TemplateID'=>$request->template,
                 'RefLink' => "ref=ie".$request->sendmailstartdate."&utm_source=iemail&utm_medium=email&utm_content=".$request->sendmailstartdate."",
                 'CreatedDate' =>  now(),
                 'IsActive' => 1 ]);
              $task3->save();

           }
           if($request->template==-2)
           {
              $task4 = TaskTemplateSplitMasterModel::create([               
                 'TaskID' => $task1->GenerateMailWithSelectionMasterID,
                 'Unit'=>$request->unit,
                 'Quantity' => $request->count,
                 'AutoCalResultDateTime'=>$request->autoresult." ".$request->autoresult_hh.":".$request->autoresult_mm.":".$request->autoresult_ss,
                 'CreatedBy' => Session::get('email'),
                 'CreatedDate' =>  now(),
                 'IsActive' => 1 ]);
              $task4->save();
             
              $task5 = TaskTemplateSplitDetailsModel::create([               
                 'TaskSplitMasterID' => $task4->TaskSplitMasterID,
                 'TaskID'=>$task1->GenerateMailWithSelectionMasterID,
                 'MailTemplateID' => $request->template_A,
                 'IsActive' => 1 ]);
              $task5->save();

              $task6= TaskTemplateSplitDetailsModel::create([               
                 'TaskSplitMasterID' => $task4->TaskSplitMasterID,
                 'TaskID'=>$task1->GenerateMailWithSelectionMasterID,
                 'MailTemplateID' => $request->template_B,
                 'IsActive' => 1 ]);
              $task6->save();

           }
          if(($p1) && ($p2))
          {
           return redirect()->route('addemailtask');
          }
         
      
   }
   public function SearchEmailTask(Request $request)
   {

          $category=[];
          $categories = CategoryMasterModel::all();  
        //logged in user dept
        $username=Session::get('email');
        $loginuserdept = LoginModel::with('allocateddept')->where('EmailAddress', '=', $username)->first();
       $departmentsid=$loginuserdept->allocateddept->pluck('DepartmentMasterID'); 
       $departments = DepartmentMasterModel::whereIn('DepartmentMasterID',$departmentsid)->get();
        if ($request->ajax()) 
        {

               
            $result=$this->SearchEmailTask_Result($request);
             
            return view('Task.EmailTaskSearchresult', compact('result'));
        }
        return view('Task.SearchEmailTask', compact('departments','categories'));
       
   }
   public function SearchEmailTask_Result(Request $request)
   {
      //dd($request);
      $formrequest =$request->all();     
      $emailmodel = EmailTaskModelforScheduleType::query();
        if(!empty($formrequest['taskid'])){
            $array=explode(",",$formrequest['taskid']);
            $emailmodel->whereIn('GenerateMailWithSelectionID',$array);
        }
         if(!empty($formrequest['taskname'])){
            $emailmodel->where('Name','like','%'.$formrequest['taskname'].'%');
        }
         if(!empty($formrequest['templateid'])){
            $emailmodel->where('MailTemplateID','=',$formrequest['templateid']);
        }
         if(!empty($formrequest['department'])){
            $emailmodel->where('DepartmentMasterID','=',$formrequest['department']);
        }
         if(!empty($formrequest['category'])){
            $emailmodel->where('CategoryID','=',$formrequest['category']);
        }
        if(!empty($formrequest['userselection'])){
            $emailmodel->where('UserSelectionID','=',$formrequest['userselection']);
        }
        if(!empty($formrequest['schedule'])){
            $emailmodel->where('ScheduleType','=',$formrequest['schedule']);
        }
        if(!empty($formrequest['createdFromDateSearch'])){
          //dd($formrequest['createdFromDateSearch']);
            $emailmodel->whereDate('CreatedDate','>=',$formrequest['createdFromDateSearch']);
        }
         if(!empty($formrequest['createdToDateSearch'])){
          //dd($formrequest['createdFromDateSearch']);
            $emailmodel->whereDate('CreatedDate','<=',$formrequest['createdToDateSearch']);
        }
        if(!empty($formrequest['scheduleSearchSendFromDate'])){
          //dd($formrequest['createdFromDateSearch']);
            $emailmodel->whereDate('ScheduleFromGenerate','>=',$formrequest['scheduleSearchSendFromDate']);
        }
         if(!empty($formrequest['scheduleSearchSendToDate'])){
          //dd($formrequest['createdFromDateSearch']);
            $emailmodel->whereDate('ScheduleToGenerate','<=',$formrequest['scheduleSearchSendToDate']);
        }

       
       
     $result = $emailmodel->orderBy('GenerateMailWithSelectionID')->paginate(20);
     return $result;

    //return view('EmailTaskSearchresult', compact('result'));

     
     
    
   }
   public function getPopup(Request $request)
   {
      $template='';$templatedetail='';
   $taskdetail=EmailTaskModelforScheduleType::where('GenerateMailWithSelectionID',$request->id)->first();
   $task=EmailTaskModel::where('GenerateMailWithSelectionMasterID',$taskdetail->MasterSelectionID)->first();
   //dd($task);
      $taskdetail->templatename='';
            if($taskdetail->MailTemplateID>0)
              {
                $template=$task->Template;
                if($template)
                {
                  $taskdetail->templatename=$template->Name;
                } 
                 
               }
                 else
               {
                  if($taskdetail->MailTemplateID==-1)
                  {
                    $taskdetail->templatename="Select from source";

                  }
                  elseif($taskdetail->MailTemplateID==-2)
                  {
                     $taskdetail->templatename="Select from two";

                  }
                  elseif($taskdetail->MailTemplateID==-3)
                  {
                     $taskdetail->templatename="Create duplicate";

                  }
                  if($taskdetail->MailTemplateID==-4)
                   {
                     $taskdetail->templatename="Create new db";
                   }

                }
     
     return view('Task.popup',compact('taskdetail','task'));

   }
      
  
    
}
