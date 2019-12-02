@extends('dashboard')


@section('title', 'Search Email Task') {{-- For different pages you can change your title here --}}    
@section('middle_content') {{--Put your middle content--}}
<?php 
    
    ?>
    <div class="card">
    <!--    <div class="card-header" style="height: 40px;">
            <h4 class="card-title">Add Template</h4>
        </div>-->
        <div class="card-body">


 <p><b class="divHeaderText">&nbsp;&nbsp;Search Email Task List&nbsp;&nbsp;</b></p>


    <form method="get"  enctype="multipart/form-data" id="frmTaskList">
        <input type="hidden" value={{csrf_token()}} name="_token"> 
      <div class="form-row">
       <div class="form-group col-md-2" >
        <label for="taskid">TaskID</label>
        <input type="text" class="form-control" id="taskid" name="taskid" placeholder="Task Id">
      </div>
      <div class="form-group col-md-2" >
        <label for="taskname">TaskName</label>
        <input type="text" class="form-control" id="taskname" name="taskname" placeholder="Task Name">
      </div>
      <div class="form-group col-md-2" >
        <label for="templateid">TemplateID</label>
        <input type="text" class="form-control" id="templateid" name="templateid" placeholder="Template Id">
      </div>
      <div class="form-group col-md-2" >
        <label for="department">Department</label>
         <select  id="department" name="department" class="form-control">
           <option value="" selected="selected">--All--</option>
                            @foreach($departments as $department)
                            <option value="{{$department['DepartmentMasterID']}}">{{$department['DepartmentName']}}</option> 
                            @endforeach
                        </select>                      
      </div>
      <div class="form-group col-md-2" >
        <label for="category">Category</label>
         <select  id="category" name="category" class="form-control">
           <option value="" selected="selected">--All--</option>
                            @foreach($categories as $cat )
                            <option value="{{$cat['CategoryID']}}">{{$cat['CategoryName']}}</option> 
                            @endforeach
                        </select>                      
      </div>
      <div class="form-group col-md-2" >
        <label for="userselection">Selection</label>
         <select  name="userselection" id="userselection"  class="form-control">
           <option value="" selected="selected">--All--</option>
         </select>                      
      </div>
    </div>
    <div style="margin-top: 10px;"></div>
    <div class="form-row">
       <div class="form-group col-md-2" >
         <label for="createdFromDateSearch">Created From Date</label>        
          <input type="text" class="form-control" id="createdFromDateSearch" name="createdFromDateSearch" >
         
          <i class="fa fa-calendar calnderstyle">  </i>
      </div>
    

      <div class="form-group col-md-2" >
        <label for="createdToDateSearch">Created To Date</label>
        <input type="text" class="form-control" id="createdToDateSearch" name="createdToDateSearch" >
        <i class="fa fa-calendar calnderstyle">  </i>
      </div>

      <div class="form-group col-md-2" >
        <label for="scheduleSearchSendFromDate">Schedule From Date</label>
      <input type="text" class="form-control" id="scheduleSearchSendFromDate" name="scheduleSearchSendFromDate" >
      <i class="fa fa-calendar calnderstyle">  </i>
      </div>

      <div class="form-group col-md-2" >
        <label for="scheduleSearchSendToDate">Schedule To Date</label>
      <input type="text" class="form-control" id="scheduleSearchSendToDate" name="scheduleSearchSendToDate">  <i class="fa fa-calendar calnderstyle">  </i>         
      </div>

      <div class="form-group col-md-2" >
        <label for="schedule">Schedule</label>
         <select  id="schedule" name="schedule" class="form-control">           
            <option selected="selected" value=" ">All Last Task</option>
            <option value="1">Once</option>
            <option value="2">Daily</option>
            <option value="0">Stop</option>
           </select>                      
      </div>
      <div class="form-group col-md-2" style="padding-top: 2%;">

       <button type="submit" class="btn btn-primary">Search &nbsp;<i class="fa fa-search"></i></button>
       <a href="{{ url('addemailtask') }}" class="btn btn-success">Add Task</a>                   
      </div>
    </div>

</form>

   
           
        </div>

        <div class="modal fade" id="empModal" role="dialog" >
    <div class="modal-dialog" style="max-width:100%;">
 
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">User Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
 
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
     </div>
    </div>
   </div>

   <div id="searchresult" class="position-sticky" style="display:none;">      
<button  class='btn btn-warning pull-right' style='margin-right: 2%;' onclick="exportTableToCSV('TaskDetail.csv')" >Export </button>
 </div>
        <div id="result" style="overflow-x: auto; ">
            @include('Task.EmailTaskSearchresult')
        </div> 
       
        <!-- /.card-body -->
    </div>

      <script src="{{ asset('js/jquery-1.9.10.js') }}"></script>
 <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  
 
  
<script>
   
$('#department').change(function(){

  $("#userselection").find('option[value!="0"]').remove();  
   var id =$('#department option:selected').val();
   
   //alert(id);
   $.ajax({
      url : '{{ route( 'load_userselection' ) }}',
      data: {
        "_token": "{{ csrf_token() }}",
        "id": id
        },
      type: 'post',
      dataType: 'json',
      success: function( result )
      {
          
             var userselection=result;           
           $.each( userselection, function(k, v) {
                $('#userselection').append($('<option>', {value:k, text:v}));
           });

          
      }
   });
});
  $(function () {
    $('#createdFromDateSearch').datepicker({
      viewMode: 'years',
       format: 'yyyy-mm-dd',
           
            todayHighlight: true,
            autoclose: true,
    });
    $('#createdToDateSearch').datepicker({
      viewMode: 'years',
       format: 'yyyy-mm-dd',
           
            todayHighlight: true,
            autoclose: true,
    });
    $('#scheduleSearchSendFromDate').datepicker({
      viewMode: 'years',
       format: 'yyyy-mm-dd',
           
            todayHighlight: true,
            autoclose: true,
    });
    $('#scheduleSearchSendToDate').datepicker({
      viewMode: 'years',
       format: 'yyyy-mm-dd',
           
            todayHighlight: true,
            autoclose: true,
    });

   
  });

  $("#frmTaskList").submit(function(stay){
   var formdata = $(this).serialize(); // here $(this) refere to the form its submitting
    $.ajax({
        type: 'GET',
        url: "{{ url('/SearchEmailTask') }}",
        data: formdata, // here $(this) refers to the ajax object not form
        datatype: "html",
        success: function (data) {
          $("#searchresult").show();
          $("#result").html(data);
          
        },
    });
    stay.preventDefault(); 
});
 
 
</script>
<script type="text/javascript">
 
function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}


    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {

                return false;

            }else{

               // getData(page);

            }
        }
    });
    $(document).ready(function()

    {
        $(document).on('click', '.pagination a',function(event)

        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
             var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page);

        });
    });

  

    function getData(page){
     var formdata = $("#frmTaskList").serialize(); // here $(this) refere to the form its submitting
     //var url='/SearchEmailTask?page='+page;
    $.ajax({
        type: 'GET',
        url: '?page=' + page,
        data: formdata, // here $(this) refers to the ajax object not form
        datatype: "html",
        success: function (data) {

          $("#result").html(data);
        },
    });
    
    }
$(document).ready(function(){
  $( "body" ).delegate( ".userinfo", "click", function() {  
  //alert("hi");
   
   var userid = $(this).data('id');
   //alert(userid);

    $.ajax({
        type: 'POST',
        url: "{{ url('/popup') }}",
         data: {
          "_token": "{{ csrf_token() }}",
          "id": userid
        },
        datatype: "html",
        success: function (data) {
        $('.modal-body').html(data);
      // Display Modal
      $('#empModal').modal('show'); 
          
        },
    });
});  


});
</script>
   
@endsection

