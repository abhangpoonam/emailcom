@extends('dashboard')


@if($addemailtemplate)
@section('title', 'Add Email Template') {{-- For different pages you can change your title here --}}    
@section('middle_content') {{--Put your middle content--}}
<?php 
    
    ?>
    <div class="card">
    <!--    <div class="card-header" style="height: 40px;">
            <h4 class="card-title">Add Template</h4>
        </div>-->
        <div class="card-body">
            <form enctype="multipart/form-data" id="form-add-email-template" name="form-add-email-template" method="post">
            <!--<div class="container">-->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <span class=" ">Template Name</span>
                        <input value="" placeholder="" type="text" class="form-control" name="" id="">
                    </div>
                    <div class="form-group">
                        <span class=" ">Category</span>
                        <select class="form-control">
                            <option>Select</option>
                            @foreach($categories as $category)
                            <option value="{{$category['CategoryMasterID']}}">{{$category['CategoryName']}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <span class=" ">Department</span>
                        <select class="form-control">
                            <option>Select</option>
                            @foreach($departments as $department)
                            <option value="{{$department['DepartmentMasterID']}}">{{$department['DepartmentName']}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <span class=" ">Sub Category</span>
                        <select class="form-control">
                            <option>Select</option>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <span class=" ">Date of Expiry</span>
                        <input value="" placeholder="" type="text" class="form-control" name="" id="">
                    </div>
                    <div class="form-group">
                        <span class=" "></span>
                        <div class="input-group" style="margin-top: 50px;">
                        <label>Transaction Mail</label>
                        <input style="" value="" placeholder="" type="checkbox" class="form-control" name="" id="" />
                        <label>Instant Mail</label>
                        <input style="" value="" placeholder="" type="checkbox" class="form-control" name="" id="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                    <div class="form-group">
                        <span class=" ">Body Attribute</span>
                        <select id="ip-body-attr-list" name="ip-body-attr-list" multiple style="height: 120px;width: 120px;" class="form-control">
                        </select>
                    </div>
                    <div class="col-1 form-group" style="margin:auto;">
                        <button type="button" onclick="exchangeAttribute('ip-body-attr-list','ip-body-attr-list-final',1);" class="btn btn-primary btn-sm customBtn-class"> > </button>
                        <button type="button" onclick="exchangeAttribute('ip-body-attr-list','ip-body-attr-list-final',0);" class="btn btn-primary btn-sm customBtn-class"> >> </button>
                        <button type="button" onclick="exchangeAttribute('ip-body-attr-list-final','ip-body-attr-list',0);" class="btn btn-primary btn-sm customBtn-class"> << </button>
                        <button type="button" onclick="exchangeAttribute('ip-body-attr-list-final','ip-body-attr-list',1);" class="btn btn-primary btn-sm customBtn-class"> < </button>
                    </div>
                    <div class="form-group" style="margin-left: auto;margin-right: auto;">
                        <span class=" ">_</span>
                        <select id="ip-body-attr-list-final" name="ip-body-attr-list-final" multiple style="height: 120px;width: 120px;" class="form-control">
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <span class="">New Attribute</span>
                    <div class="input-group">
                        <input id="ip-body-new-attr" name="ip-body-new-attr" placeholder="Enter new Attribute" type="text" class="form-control" name="" id="">
                        <button onclick="addNewAttribute('ip-body-new-attr','ip-body-attr-list-final',1);" type="button" class="btn btn-primary btn-sm"> + </button>
                        <button onclick="addAttrInBody();" type="button" class="btn btn-primary btn-sm"> Insert in Body </button>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                    <div class="form-group" style="margin-left: auto;">
                        <span class="">Subject Attribute</span>
                        <select id="ip-subject-attr-list" name="ip-subject-attr-list" multiple style="height: 120px;width: 120px;" class="form-control">
                        </select>
                    </div>
                    <div class="col-1 form-group" style="margin: auto;">
                        <button type="button" onclick="exchangeAttribute('ip-subject-attr-list','ip-subject-attr-list-final',1);" class="btn btn-primary btn-sm customBtn-class"> > </button>
                        <button type="button" onclick="exchangeAttribute('ip-subject-attr-list','ip-subject-attr-list-final',0);" class="btn btn-primary btn-sm customBtn-class"> >> </button>
                        <button type="button" onclick="exchangeAttribute('ip-subject-attr-list-final','ip-subject-attr-list',0);" class="btn btn-primary btn-sm customBtn-class"> << </button>
                        <button type="button" onclick="exchangeAttribute('ip-subject-attr-list-final','ip-subject-attr-list',1);" class="btn btn-primary btn-sm customBtn-class"> < </button>
                    </div>
                    <div class="form-group" style="margin-left: auto;margin-right: auto;">
                        <span class="">_</span>
                        <select id="ip-subject-attr-list-final" name="ip-subject-attr-list-final" multiple style="height: 120px;width: 120px;" class="form-control">
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <span class="">New Attribute</span>
                    <div class="input-group">
                        <input id="ip-sub-new-attr" name="ip-sub-new-attr" placeholder="Enter new Attribute" type="text" class="form-control" name="" id="">
                        <button onclick="addNewAttribute('ip-sub-new-attr','ip-subject-attr-list-final',1);" type="button" class="btn btn-primary btn-sm"> + </button>
                        <button onclick="addAttrInSub();" type="button" class="btn btn-primary btn-sm"> Insert in Sub </button>
                    </div>
                    </div>
                </div>
                <div class="col-md-4 row">
                    <!--<div>-->
                        <span onclick="toggleStaticAttribute('span-show-static-attr','span-hide-static-attr');" id="span-show-static-attr" style="cursor: pointer;">Show Static Attributes</span>
                        <span onclick="toggleStaticAttribute('span-hide-static-attr','span-show-static-attr');" id="span-hide-static-attr" style="cursor: pointer;display: none;">Hide Static Attributes</span>
                    <!--</div>-->
                    <div id="div-email-static-attr" style="display: none;margin-top: -68px;" class="row">
                        <div class="form-group" style="margin-left: auto;">
                            <span class=""></span>
                            <select id="ip-static-attr-list" name="ip-static-attr-list" multiple style="height: 120px;width: 120px;" class="form-control">
                                
                            </select>
                        </div>
                        <div class="col-1 form-group" style="margin-left: auto;margin-right: auto;">
                            <button type="button" onclick="exchangeAttribute('ip-static-attr-list','ip-static-attr-list-final',1);" class="btn btn-primary btn-sm customBtn-class"> > </button>
                            <button type="button" onclick="exchangeAttribute('ip-static-attr-list','ip-static-attr-list-final',0);" class="btn btn-primary btn-sm customBtn-class"> >> </button>
                            <button type="button" onclick="exchangeAttribute('ip-static-attr-list-final','ip-static-attr-list',0);" class="btn btn-primary btn-sm customBtn-class"> << </button>
                            <button type="button" onclick="exchangeAttribute('ip-static-attr-list-final','ip-static-attr-list',1);" class="btn btn-primary btn-sm customBtn-class"> < </button>
                        </div>
                        <div class="form-group" style="margin-left: auto;margin-right: auto;">
                            <span class=""></span>
                            <select id="ip-static-attr-list-final" name="ip-static-attr-list-final" multiple style="height: 120px;width: 120px;" class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span class=" ">Description</span>
                        <!--<input value="" placeholder="" type="text" class="form-control" name="" id="">-->
                        <textarea cols="3" rows="3" id="ip-email-body-desc" name="ip-email-body-desc" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span class=" ">Subject</span>
                        <!--<input id="ip-email-template-subject" name="ip-email-template-subject" value="" placeholder="" type="text" class="form-control" name="" id="">-->
                        <textarea cols="3" rows="3" id="ip-email-template-subject" name="ip-email-template-subject" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <span class=" ">Upload File</span>
                        <div class="input-group">
                        <input id="ip-email-file-upload" name="ip-email-file-upload" value="" placeholder="" type="file" class="form-control" name="" id="" />
                        <button onclick="uploadEmailFiles();" type="button" class="btn btn-primary btn-sm" style="margin-left: 2px;">Upload</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <span class=" ">Upload Folder</span>
                        <div class="input-group">
                        <input id="ip-email-folder-upload" name="ip-email-folder-upload" value="" placeholder="" type="file" class="form-control" name="" id="" />
                        <button onclick="uploadEmailFolder();" type="button" class="btn btn-primary btn-sm" style="margin-left: 2px;">Upload</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea cols="80" id="editor1" name="editor1" rows="10" data-sample-short></textarea>
                    </div>
                </div>
    <!--            <div class="col-md-4">
                </div>-->
                    <!--<div class="col-md-2"></div>-->
    <!--                <div class="col-md-2">
                        <div class="form-group">
                        <span class=" ">Body Attribute</span>
                        <input value="" placeholder="" type="text" class="form-control" name="" id="">
                        </div>
                    </div>-->
                    
                
    <!--            <div class="col-md-4">
                    <div class="form-group">
                        <span class=" ">Subject Attribute</span>
                        <input value="" placeholder="" type="text" class="form-control" name="" id="">
                    </div>
                </div>-->
            </div>
            <!--</div>-->
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <?php if(isset($editData[0]->Status) && $editData[0]->Status=='Approved'){ ?>
    <script>
        $('#btn-approve-sms-template').hide();
        $('#btn-disApprove-sms-template').show();
    </script>
    <?php } else if(isset($editData[0]->Status) && $editData[0]->Status=='Disapproved'){ ?>
    <script>
        $('#btn-approve-sms-template').show();
        $('#btn-disApprove-sms-template').hide();
    </script>
    <?php }else{ ?>
    <script>
        $('#btn-approve-sms-template').show();
        $('#btn-disApprove-sms-template').hide();
        
        function toggleStaticAttribute(hideId,displayId){
            $('#'+displayId).show();
            $('#'+hideId).hide();
            $('#div-email-static-attr').toggle();
        }
    </script>
    <?php } ?>
    <script>
        function exchangeAttribute(fromId,toId,flag){
            var data = $('#'+fromId).val();
            var option = '';
            
            if(flag==0){
                $('#'+fromId+' option').each(function()
                {
                    // Add $(this).val() to your list
                    option += '<option value="'+$(this).val()+'">'+$(this).val()+'</option>';
                    $('option[value="'+$(this).val()+'"]', '#'+fromId).remove();
                });
                $('#'+toId).append(option);
                return;
            }
            
            if(data==null){
                toastr.error("Select atleast one element");
                return;
            }
            
            for(var i=0;i<data.length;i++){
                var exist = $('#'+toId+' option[value='+data[i]+']').length;
                if(exist==0){
                    option += '<option value="'+data[i]+'">'+data[i]+'</option>';
                    
                    $('option[value="'+data[i]+'"]', '#'+fromId).remove();
                }
            }
            
            $('#'+toId).append(option);
        }
        
        function addNewAttribute(fromId, toId, flag){
            var data = $('#'+fromId).val();
            var option = '';
            
            if(data==''){
                toastr.error("invalid attribute");
                return;
            }
            
            var exist = $('#'+toId+' option[value='+data+']').length;
            if(exist==0){
                option += '<option value="'+data+'">'+data+'</option>';
            }
            
            $('#'+toId).append(option);
        }
        
        function addAttrInBody(){
                var myValueget = $('#ip-body-attr-list-final option');
                var myValueget1 = $('#ip-body-attr-list-final option:selected');
                var myValue = $.map(myValueget,function(option){
                    return option.value;
                });

                var myValue1 = $.map(myValueget1,function(option1){
                    return option1.value;
                });

               
                if(myValue.length > 1 && myValue1.length == 0){
                    toastr.warning("Select only one element to insert");
                    return;
                }
                else if(myValue1.length == 1){
                    myValue2 = myValue1[0];
                }
                
                myValue3 = '{'+myValue1+'}';
               
                myValue4 = myValue3.toString();
                //console.log(myValue4);
                CKEDITOR.instances['editor1'].insertText(myValue4);
               // $('#editor1').append(myValue4);
    
        }
        function addAttrInSub(){
            var $txt = jQuery("#ip-email-template-subject");
            var txtToAdd = $('#ip-subject-attr-list-final').val();
            console.log(txtToAdd);
            if(txtToAdd.length == 0){
                toastr.warning("Select only one element to insert");
                return;
            }
            
            var caretPos = $txt[0].selectionStart;
            var textAreaTxt = $txt.val();
            txtToAdd = '{'+txtToAdd+'}';
            txtToAdd = txtToAdd.toString();
            $txt.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
        }
    </script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    <script src="{{asset('toastr/toastr.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('toastr/toastr.scss')}}" />
@endsection
@else
@section('title','Welcome!!')
@section('middle_content')

@endsection
@endif
