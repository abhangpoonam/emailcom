@extends('dashboard')


@section('title', 'Add Email Task') {{-- For different pages you can change your title here --}}    
@section('middle_content') {{--Put your middle content--}}
<?php 
    
    ?>
    <div class="card">
    <!--    <div class="card-header" style="height: 40px;">
            <h4 class="card-title">Add Template</h4>
        </div>-->
        <div class="card-body">

           <b class="divHeaderText">&nbsp;&nbsp;Add Email Task List&nbsp;&nbsp;</b>
            <form enctype="multipart/form-data" id="form-add-email-template" name="form-add-email-template" action="/store_task" method="post">
           <input type="hidden" value={{csrf_token()}} name="_token"> 
            <!--<div class="container">-->
           <div class="form-group row">
                <label for="taskname" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-3">
                  <input type="text"  class="form-control" id="taskname" name="taskname" value="" required>
                </div>
                <label for="template" class="col-sm-2 col-form-label">Template</label>
                <div class="col-sm-3">
                        <select class="form-control" id="template" name="template" required>
                            <option value="" selected="selected">--Select--</option>
                           
                            <option value="-1">Select from source</option> 
                             <option value="-2">Select from two</option> 
                             <option value="-3">Create duplicate</option> 
                             <option value="-4">Create new db</option> 
                            
                        </select>                   
                </div>
               
            </div>
            <div class="form-group row">
               
                <label for="department" class="col-sm-2 col-form-label">Department</label>

                <div class="col-sm-3">
                        <select class="form-control" id="department" name="department" required>
                            <option value="" selected="selected">--Select--</option>
                            @foreach($departments as $department)
                            <option value="{{$department['DepartmentMasterID']}}">{{$department['DepartmentName']}}</option> 
                            @endforeach
                        </select>                   
                </div>
                <label for="unit" class="col-sm-2 col-form-label hideshow">Select Unit</label>

                <div class="col-sm-3 hideshow"> 
                        <select class="form-control" id="unit" name="unit">
                           <option selected="selected" value="">--Select--</option>
                           <option value="Percentage">Percentage</option>
                           <option value="Number">Number</option>
                        </select>                   
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
               <div class="col-sm-3" >
                        <select class="form-control" id="category" name="category" >
                             <option selected="selected" value="">--Select--</option>
                            
                        </select>                   
                </div>
               
                <label for="count" class="col-sm-2 col-form-label hideshow">Select Count</label>
               
                       <div class="col-sm-1 hideshow">
                    <input type="text"  class="form-control" id="count" name="count" value="">
                              
                </div>
            </div>
            <div class="form-group row">
                <label for="subcategory" class="col-sm-2 col-form-label">Subcategory</label>
                <div class="col-sm-3">
                        <select class="form-control" id="subcategory" name="subcategory" >
                            <option value="" selected="selected">--Select--</option>
                           
                        </select>                   
                </div>
               
                <label for="template_A" class="col-sm-2 col-form-label hideshow">Select Template A</label>

                <div class="col-sm-3 hideshow">
                        <select class="form-control" id="template_A" name="template_A">
                             <option selected="selected" value="">--Select--</option>
                        </select>                   
                </div>
            </div>  
             <div class="form-group row">
                <label for="fromemail" class="col-sm-2 col-form-label">From email</label>
                <div class="col-sm-3">
                        <select class="form-control" id="fromemail" name="fromemail" required>
                            <option value="">--Select--</option>
                            
                        </select>                   
                </div>
                
                <label for="template_B" class="col-sm-2 col-form-label hideshow">Select Template B</label>

                <div class="col-sm-3 hideshow">
                        <select class="form-control" id="template_B" name="template_B">
                            <option selected="selected" value="">--Select--</option>
                            
                        </select>                   
                </div>
            </div>  
             <div class="form-group row">
                <label for="scheduletype" class="col-sm-2 col-form-label">Schedule Type</label>
                <div class="col-sm-3">
                        <select class="form-control" id="scheduletype" name="scheduletype" required>
                            <option value="">--Select--</option>
                            <option value="1">Once</option> 
                            <option value="2">Daily</option> 
                            
                        </select>                   
                </div>
               
                <label for="autoresult" class="col-sm-2 col-form-label hideshow">Auto Result Type</label>

                <div class="col-sm hideshow">
               <input type="text"  class="form-control" name="autoresult" id="autoresult" value="">
                                      
                </div>
                <div class="col-sm-1 hideshow">
                    <select class="form-control" id="autoresult_hh" name="autoresult_hh">
                             <option value="" selected="selected">Select</option>
                            @for($hours=0; $hours<24; $hours++)
                            <option value="{{$hours}}">
                            {{$hours}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="autoresult_hh" class="col-form-label hideshow">hh</label>
                 <div class="col-sm-1 hideshow">
                    <select class="form-control" id="autoresult_mm" name="autoresult_mm">
                           <option value="" selected="selected">Select</option>
                            @for($mm=0; $mm<60; $mm++)
                            <option value="{{$mm}}">
                            {{$mm}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="autoresult_mm" class="col-form-label hideshow">mm</label>
                 <div class="col-sm-1 hideshow">
                    <select class="form-control" id="autoresult_ss" name="autoresult_ss">
                             <option value="" selected="selected">Select</option>
                            @for($mm=0; $mm<60; $mm++)
                            <option value="{{$mm}}">
                            {{$mm}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="autoresult_ss" class="col-form-label hideshow">ss</label>
            </div>  
             <div class="form-group row">
                <label for="userselection" class="col-sm-2 col-form-label">User Selection</label>
                <div class="col-sm-3">
                        <select class="form-control" id="userselection" name="userselection">
                            <option value="">--Select--</option>
                           
                        </select>                   
                </div>
               
                <label class="col-sm-2 col-form-label">Selection Type</label>

                <div class="col-sm-3" id="selectiontypediv">
                <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="selectiontyperadio_csv" name="selectiontyperadio" value="0" checked="checked">
              <label class="custom-control-label" for="selectiontyperadio_csv">CSV File</label>
            </div>

            <!-- Default inline 2-->
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="selectiontyperadio_sqlserver" name="selectiontyperadio" value="1" >
              <label class="custom-control-label" for="selectiontyperadio_sqlserver">SQL Server</label>
            </div>

                        
                </div>
            </div>  
             
             
             <div class="form-group row">
            
               
                <div class="col-sm-12" >
                  <div id="togglesourcecontent2" style="display: none;">
                   <label for="source" class="col-sm-2 col-form-label">Source</label>
                        <select class="form-control select2" id="source" name="source" data-live-search="true" data-live-search-style="startsWith">
                            <option value="" selected="selected">Select</option>
                            @foreach($SqlServerConnections as $SqlServerConnection)
                            <option value="{{$SqlServerConnection['sqlserverconnectionmasterid']}}">{{$SqlServerConnection['ConnectionName']}}</option> 
                            @endforeach
                        </select>  
                        </div> 

                        <div  id="togglesourcecontent1">
                  <label for="multiFiles" class="col-sm-2 col-form-label"></label>
                  <input type="hidden" id="sourcefile" name="sourcefile" value="">
                  <input type="hidden" id="sourcefilecount" name="sourcefilecount" value="">
                 <input type="file" id="multiFiles" name="files[]"  accept=".csv"/>
                 <input type="button" name="publish" id="uploadbutton" value="Upload">
                 <div id="sourceresult" style="display: inline">
                 
                </div>               
                </div>
                
                </div>
                 
                
            </div> 

             <div class="form-group row">
               

                 <label for="taskstartedradio" class="col-sm-2 col-form-label">Task Started</label>

                <div class="col-sm-3">
                <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="taskstartedradio_auto" name="taskstartedradio" checked="checked" value='0'>
              <label class="custom-control-label" for="taskstartedradio_auto">Auto</label>
            </div>

            <!-- Default inline 2-->
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="taskstartedradio_manual" name="taskstartedradio" value='1'>
              <label class="custom-control-label" for="taskstartedradio_manual">Manual</label>
            </div>
                </div>
               
                  <label for="mailsendspeed" class="col-sm-2 col-form-label">Mail send speed per hour</label>

                <div class="col-sm-1">
                    <input type="text"  class="form-control" id="mailsendspeed" name="mailsendspeed" value="" required>
                                      
                </div>
               
            </div>  
             

             <div class="form-group row">
                <label for="datauploaddate" class="col-sm-2 col-form-label">Data ready to upload date</label>

                <div class="col-sm-2">
                    <input type="text"  class="form-control" id="datauploaddate" name="datauploaddate" value="" required>
                                      
                </div>
                 <div class="col-sm-1">
                    <select class="form-control" id="datauploaddate_hh" name="datauploaddate_hh" required>
                             <option  value="" selected="selected">Select</option>
                            @for($hours=0; $hours<24; $hours++)
                            <option value="{{$hours}}">
                            {{$hours}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="datauploaddate_hh" class="col-form-label">hh</label>
                 <div class="col-sm-1">
                    <select class="form-control" id="datauploaddate_mm" name="datauploaddate_mm" required>
                           <option  value="" selected="selected">Select</option>
                            @for($mm=0; $mm<60; $mm++)
                            <option value="{{$mm}}">
                            {{$mm}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="datauploaddate_mm" class="col-form-label">mm</label>
                 <div class="col-sm-1">
                    <select class="form-control" id="datauploaddate_ss" name="datauploaddate_ss" required>
                             <option  value="-1" selected="selected">Select</option>
                            @for($mm=0; $mm<60; $mm++)
                            <option value="{{$mm}}">
                            {{$mm}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="datauploaddate_ss" class="col-form-label">ss</label>
              
                
            </div> 
            <div class="form-group row">
                <label for="sendmailstartdate" class=" col-sm-2  col-form-label">Send mail start date</label>

                <div class="col-sm-2">
                    <input type="text"  class="form-control" id="sendmailstartdate" name="sendmailstartdate" value="" required>
                                      
                </div>
               <div class="col-sm-1">
                    <select class="form-control" id="sendmailstartdate_hh" name="sendmailstartdate_hh" required>
                             <option  value="" selected="selected">Select</option>
                            @for($hours=0; $hours<24; $hours++)
                            <option value="{{$hours}}">
                            {{$hours}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="sendmailstartdate_hh" class="col-form-label">hh</label>
                 <div class="col-sm-1">
                    <select class="form-control" id="sendmailstartdate_mm" name="sendmailstartdate_mm" required>
                           <option  value="" selected="selected">Select</option>
                            @for($mm=0; $mm<60; $mm++)
                            <option value="{{$mm}}">
                            {{$mm}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="sendmailstartdate_mm" class="col-form-label">mm</label>
                 <div class="col-sm-1">
                    <select class="form-control" id="sendmailstartdate_ss" name="sendmailstartdate_ss" required>
                             <option  value="" selected="selected">Select</option>
                            @for($mm=0; $mm<60; $mm++)
                            <option value="{{$mm}}">
                            {{$mm}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="sendmailstartdate_ss" class="col-form-label">ss</label>
              
               
                
            </div>  
             <div class="form-group row">
                <label for="sendmailenddate" class="col-sm-2 col-form-label">Send mail end date</label>

                <div class="col-sm-2">
                    <input type="text"  class="form-control" id="sendmailenddate" name="sendmailenddate" value="" required>
                                      
                </div>
               <div class="col-sm-1">
                    <select class="form-control" id="sendmailenddate_hh" name="sendmailenddate_hh" required>
                             <option  value="" selected="selected">Select</option>
                            @for($hours=0; $hours<24; $hours++)
                            <option value="{{$hours}}">
                            {{$hours}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="sendmailenddate_hh" class="col-form-label">hh</label>
                 <div class="col-sm-1">
                    <select class="form-control" id="sendmailenddate_mm" name="sendmailenddate_mm" required>
                           <option  value="" selected="selected">Select</option>
                            @for($mm=0; $mm<60; $mm++)
                            <option value="{{$mm}}">
                            {{$mm}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="sendmailenddate_mm" class="col-form-label">mm</label>
                 <div class="col-sm-1">
                    <select class="form-control" id="sendmailenddate_ss" name="sendmailenddate_ss" required>
                             <option  value="" selected="selected">Select</option>
                            @for($mm=0; $mm<60; $mm++)
                            <option value="{{$mm}}">
                            {{$mm}}</option> 
                            @endfor
                        </select>  
                </div>
                 <label for="sendmailenddate_ss" class="col-form-label">ss</label>
              
                
            </div> 
            
           
             <div class="form-group row">
               
                 
                
                 <label  class="col-sm-2 col-form-label"></label>

                <div class="col-sm-6">
                <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="remvmailheaderchkbox" name="remvmailheaderchkbox" value="1">
              <label class="custom-control-label" for="remvmailheaderchkbox">Remove mail header</label>
            </div>

            <div class="custom-control custom-text custom-control-inline">
              <input type="text"  class="form-control" id="mailheadertext" name="mailheadertext" value="">
            </div>
                </div>
               
                
               
            </div>  
              <div class="form-group row">
               
                 
                
                 <label for="inputPassword" class="col-sm-2 col-form-label"></label>

                 <div class="col-sm-8">

                 
                <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="transactionmail" name="transactionmail" value="1">
              <label class="custom-control-label" for="transactionmail">Transaction mail</label>
            </div>

            <!-- Default inline 2-->
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="reftracking" name="reftracking" value="1">
              <label class="custom-control-label" for="reftracking">Add ref tracking</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="unsublink" name="unsublink" value="1">
              <label class="custom-control-label" for="unsublink">Add unsubscribe link in template</label>
            </div>

                        
                </div>
               
                
               
            </div>  
             
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-default">Cancel</button>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
     <script src="{{ asset('js/jquery-1.9.10.js') }}"></script>
 <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
 <script src="{{ asset('js/select2.min.js') }}"></script>
 <script>
   $('.select2').select2(); 
$('#department').change(function(){
   $("#category").find('option[value!=""]').remove();
   $("#subcategory").find('option[value!=""]').remove();
  $('#template').find('option[value!=""][value!="-1"][value!="-2"][value!="-3"][value!="-4"]').remove();
  $("#template").val('');
  $("#userselection").find('option[value!=""]').remove();
   $("#fromemail").find('option[value!=""]').remove();
  $(".hideshow").hide();
   var id =$('#department option:selected').val();
   
   //alert(id);
   $.ajax({
      url : '{{ route( 'loadcategory' ) }}',
      data: {
        "_token": "{{ csrf_token() }}",
        "id": id
        },
      type: 'post',
      dataType: 'json',
      success: function( result )
      {
        console.log(result);
        var category=result['category'][0];
           $.each( category, function(k, v) {
                $('#category').append($('<option>', {value:k, text:v}));
           });

            var template=result['template'][0];
           $.each( template, function(k, v) {
                $('#template').append($('<option>', {value:k, text:v}));
           });
             
             var userselection=result['userselection'][0];           
           $.each( userselection, function(k, v) {
                $('#userselection').append($('<option>', {value:k, text:v}));
           });

           var fromemail=result['fromemail'][0];           
           $.each( fromemail, function(k, v) {
                $('#fromemail').append($('<option>', {value:k, text:v}));
           });
      }
   });
});
$('#category').change(function(){  
  $("#subcategory").find('option[value!=""]').remove();
   var id =$('#category option:selected').val();
   
   //alert(id);
   $.ajax({
      url : '{{ route( 'loadsubcategory' ) }}',
      data: {
        "_token": "{{ csrf_token() }}",
        "id": id
        },
      type: 'post',
      dataType: 'json',
      success: function( result )
      {
          
           $.each( result, function(k, v) {
                $('#subcategory').append($('<option>', {value:k, text:v}));
           });
      }
   });
});
$('#template').change(function(){

   $(".hideshow").hide();
   $("#template_A").find('option[value!=""]').remove();
   $("#template_B").find('option[value!=""]').remove();
   var templateid =$('#template option:selected').val();
   if(templateid=="-2")
   {
    $(".hideshow").show();
     var id =$('#department option:selected').val();
     $.ajax({
      url : '{{ route( 'loadtemplate' ) }}',
      data: {
        "_token": "{{ csrf_token() }}",
         "id": id
        },
      type: 'post',
      dataType: 'json',
      success: function( result )
      {
        
           $.each( result, function(k, v) {
                $('#template_A').append($('<option>', {value:k, text:v}));
                $('#template_B').append($('<option>', {value:k, text:v}));
           });

      }
   });
         // $('#unit').attr('required');
          $("#unit").prop('required',true);
          $('#count').prop('required',true);
          $('#template_A').prop('required',true);
          $('#template_B').prop('required',true);
          $('#autoresult').prop('required',true);
          $('#autoresult_hh').prop('required',true);
          $('#autoresult_mm').prop('required',true);
          $('#autoresult_ss').prop('required',true);
   }
   else
   {

          $('#unit').prop('required',false);
          $('#count').prop('required',false);
          $('#template_A').prop('required',false);
          $('#template_B').prop('required',false);
          $('#autoresult').prop('required',false);
          $('#autoresult_hh').prop('required',false);
          $('#autoresult_mm').prop('required',false);
          $('#autoresult_ss').prop('required',false);
   }
   
   //alert(id);
  
});


     $(function () {
    $('#autoresult').datepicker({
      viewMode: 'years',
       format: 'yyyy-mm-dd',
           
            todayHighlight: true,
            autoclose: true,
    });
    $('#datauploaddate').datepicker({
      viewMode: 'years',
       format: 'yyyy-mm-dd',
           
            todayHighlight: true,
            autoclose: true,
    });
    $('#sendmailstartdate').datepicker({
      viewMode: 'years',
       format: 'yyyy-mm-dd',
           
            todayHighlight: true,
            autoclose: true,
    });
    $('#sendmailenddate').datepicker({
      viewMode: 'years',
       format: 'yyyy-mm-dd',
           
            todayHighlight: true,
            autoclose: true,
    });

   
  });


     $("#selectiontypediv input[type='radio']").on("change", function() {
  // Regardless of WHICH radio was clicked, is the
  //  showSelect radio active?
   if ($("#selectiontyperadio_csv").is(':checked')) {
   
     $('#togglesourcecontent1').show();
     $('#togglesourcecontent2').hide();
   } else if ($("#selectiontyperadio_sqlserver").is(':checked')) {
    
      $('#togglesourcecontent1').hide();
     $('#togglesourcecontent2').show();
   }
 });
   
   $('#remvmailheaderchkbox').change(function() {
    
   if ($("#remvmailheaderchkbox").is(':checked')) {
    
         $('#mailheadertext').prop('required',true);
   } else {
        
         $('#mailheadertext').prop('required',false);
   }
 });
    
    
      $('#uploadbutton').on('click', function () {
      var form_data = new FormData();
      //var ins = document.getElementById('multiFiles').files.length;      
        form_data.append("files", document.getElementById('multiFiles').files[0]);
        form_data.append("_token", "{{ csrf_token() }}");
       
        $.ajax({
          url : '{{ route( 'upload_task_csv' ) }}',
          data: form_data,
          type: 'post',
          dataType: 'json',
           processData: false,
          contentType: false,
          success: function( result )
          {

            if(result.present)
            {
              $("#sourceresult").html(result.message);
              $("#sourcefile").val(result.file_url);
              $("#sourcefilecount").val(result.rows);
            }
            else
            {
               $("#sourceresult").html(result.message);
               $("#sourcefile").val("");
               $("#sourcefilecount").val('0');
            }
            
            
          }
        });
      });

 </script>

@endsection

