@if(isset($result))
 
 {!! $result->render() !!}
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" >
		<tbody><tr >
			<th class="th-sm">Task ID</th>
            <th class="th-sm">Task Name</th>
            <th class="th-sm">Created Date</th>
            <th class="th-sm">Schedule Date</th>
            <th class="th-sm">Mail Sent Date</th>
            <th class="th-sm">Task Status</th>
            <th class="th-sm">Total</th>
            <th class="th-sm">Generated</th>
            <th class="th-sm">Sent</th>
            <th class="th-sm">Open</th>
            <th class="th-sm">Bounce</th>
            <th class="th-sm">Un Subscribe</th>
            <th class="th-sm">Error / Pending</th>
            <th class="th-sm"></th>
            <th class="th-sm"></th>
            <th class="th-sm"></th>
		</tr>


            @foreach($result as $row)
             <tr>
			<td>{{$row['GenerateMailWithSelectionID']}}</td>
            <td>{{$row['Name']}}</td>
            <td>{{$row['CreatedDate']}}</td>
            <td>{{$row['ScheduleFromGenerate']}}</td>
            <td>{{$row['MailSentStartedDateTime']}}</td>
            <td>{{$row['TaskStatus']}}</td>
            <td>{{$row['CSVRecordCount']}}</td>
            <td>{{$row['GenerateMailCount']}}</td>
            <td>{{$row['MailSentCount']}}</td>
            <td>{{$row['OpenMailCount']}}</td>
            <td>{{$row['BounceMailCount']}}</td>
            <td>{{$row['UnsubscribeCount']}}</td>
            <td>{{$row['GenerateMailCount']-$row['MailSentCount']}}</td>
            <td><button data-id="{{$row['GenerateMailWithSelectionID']}}" class='userinfo'>schedule</button></td>
            <td><a href="">stop</a></td>
            <td><a href="">test</a></td>
           </tr>
            @endforeach
		
	</tbody></table>
   
    @endif