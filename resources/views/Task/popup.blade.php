
    

    <div>
        <div id="upMain">
	
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class ="Table">
                  <tr>
                        <td align="left" class="EmptySmallestRow">
                            <div id="ucMsg_vsSummary" style="display:none;">

	</div>
<span id="ucMsg_lblMessage" style="font-weight:bold;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>&nbsp;&nbsp;<u>Task Details</u>&nbsp;&nbsp;</b>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" valign="top">
                            
                                    <table width="100%" border="0" cellspacing="5">
                                
                                    <tr>
                                        <td align="left" width="30%">
                                            <b>Task ID:</b>
                                        </td>
                                        <td align="left" width="70%">
                                            <span id="rpGenerateMail_lblTaskID_0">{{$taskdetail->GenerateMailWithSelectionID}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <b>Task Name:</b>
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblTaskName_0">{{$taskdetail->Name}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <b>Task Status:</b>
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblStatus_0">{{$taskdetail->TaskStatus}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Template Name:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblMailTemplateName_0">{{$taskdetail->templatename}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Source:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblSource_0">

                                           @if($taskdetail->UseSQLServer==1)                                           
                                            From Database
                                            @else
                                            from csv
                                            @endif

                                        </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Source Name:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblFileName_0"> @if($taskdetail->UseSQLServer==1)                                           
                                            {{$taskdetail->SQLConnectionString}}
                                            @else
                                            {{$taskdetail->FileName}}
                                            @endif</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            User Selection:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblUserSelName_0">
                                                @if($task->UserSelection) 
                                                {{$task->UserSelection->UserSelectionName}}
                                                @endif</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            From Mail:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblFromMail_0"> @if($task->EmailSendFromGroupDetail) 
                                                {{$task->EmailSendFromGroupDetail->EmailAddress}}
                                                @endif</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Process Start Date:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblDataUpdateStartDateTime_0">{{$taskdetail->ScheduleFromGenerate}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Process End Date:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblMailSentCompletedDateTime_0">{{$taskdetail->ScheduleToGenerate}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <hr />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Uploaded Mails:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblUploadedMails_0">469</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Total Mails:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblTotalMails_0">{{$taskdetail->CSVRecordCount}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Sent Mail:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_Label3_0">{{$taskdetail->MailSentCount}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Open Mail:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblOpenCount_0">{{$taskdetail->OpenMailCount}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Bounce Mail:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblBounceMails_0">{{$taskdetail->BounceMailCount}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Pending/Error Mail:
                                        </td>
                                        <td align="left">
                                            <span id="rpGenerateMail_lblErrorMails_0">{{$taskdetail['GenerateMailCount']-$taskdetail['MailSentCount']}}</span>
                                        </td>
                                    </tr>
                                
                                    </table>
                                
                        </td>
                        <td width="60%" align="center" valign="top">
                            <table border="0" width="100%">
                                <tr>
                                    <td>
                                        <div>
		<table cellspacing="0" id="gvMultiTemplate" style="width:100%;border-collapse:collapse;">
			<tr class="GridViewHeaderStyle">
				<th scope="col">Template ID</th><th scope="col">Template Name</th><th scope="col">Sent Count</th><th scope="col">Open Count</th><th scope="col">Bounce/Error Count</th><th scope="col">&nbsp;</th>
			</tr>
                @if($taskdetail->MailTemplateID>0)
                  @if($task->Template)
            <tr class="GridViewRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>{{$task->Template->MailTemplateID}}</td><td>{{$task->Template->Name}}</td><td>467</td><td>18</td><td>0</td><td>  <a id="gvMultiTemplate_lnkDomainDetails_0" href="javascript:__doPostBack(&#39;gvMultiTemplate$ctl02$lnkDomainDetails&#39;,&#39;&#39;)" style="color:Blue;">Details</a> </td>
			</tr>
                 @endif
               @endif
           
		</table>
	</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <hr />
                                        <!-- <span id="lblDetails" title="Refund Request Initiated">Domain wise details for task 'Refund Request Initiated'</span> -->
                                    </td>
                                </tr>
                               <!--  <tr>
                                    <td>
                                        <div>
		<table cellspacing="0" id="gvGeneratedDomainWise" style="width:98%;border-collapse:collapse;">
			<tr class="GridViewHeaderStyle">
				<th scope="col">Domain Name</th><th scope="col">Total Mail</th><th scope="col">Send Mails</th><th scope="col">Open Mails</th><th scope="col">Bounce/Error Mails</th>
			</tr><tr class="GridViewRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>gmail.com</td><td>429</td><td>429</td><td>18</td><td>0</td>
			</tr><tr class="GridViewAlternatingRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>yahoo.com</td><td>17</td><td>17</td><td>0</td><td>0</td>
			</tr><tr class="GridViewRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>yahoo.co.in</td><td>7</td><td>7</td><td>0</td><td>0</td>
			</tr><tr class="GridViewAlternatingRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>rediffmail.com</td><td>6</td><td>6</td><td>0</td><td>0</td>
			</tr><tr class="GridViewRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>yahoo.in</td><td>3</td><td>3</td><td>0</td><td>0</td>
			</tr><tr class="GridViewAlternatingRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>ymail.com</td><td>2</td><td>2</td><td>0</td><td>0</td>
			</tr><tr class="GridViewRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>outlook.com</td><td>2</td><td>2</td><td>0</td><td>0</td>
			</tr><tr class="GridViewAlternatingRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>live.in</td><td>2</td><td>2</td><td>0</td><td>0</td>
			</tr><tr class="GridViewRowStyle" onmouseover="this.style.color= &#39;#E39309&#39;;" onmouseout="this.style.color= &#39;#8C4510&#39;;">
				<td>hotmail.com</td><td>1</td><td>1</td><td>0</td><td>0</td>
			</tr>
		</table>
	</div>
                                    </td>
                                </tr> -->
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="EmptySmallestRow">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="TableFooterRow">
                        </td>
                    </tr>
                </table>
            
</div>
        <div id="upgMain" style="display:none;">
	
                <div class="overlay">
                    <img class="imgwait" />
                    Processing...
                </div>
                <div class="bgDiv">
                </div>
            
</div>
    </div>
    