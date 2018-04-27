@extends('layouts.nmaster')
@section('breadcrumb')
 <?php
    $request_only_view = Request::fullUrl();
    $view = end(explode('?', $request_only_view));
 ?>
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        @if($requests->status==1)
        <h3 class="text-primary">Requested Request Details</h3>
        @elseif($requests->status==2)
        <h3 class="text-primary">Verified Request Details</h3>
        @elseif($requests->status==3)
        <h3 class="text-primary">Aproved Request Details</h3>
        @else
        <h3 class="text-primary">Request Details</h3> 
        @endif
    </div>

    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Requests</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
@endsection
@section('content')
<!-- Container fluid  -->
  <div class="row justify-content-center" id='printableArea'>
        <div class="col-lg-6">
    <!-- Start Page Content -->
    <?php    
    $request_account=Request::fullUrl();
     $request_account=end(explode('?',$request_account));
    ?> 
    <?php if($view=='view')
    { ?>
	<div class="card">
                <div class="card-body">
                 <div class="form-validation">
                     <h4 class="header2">RequestsD etails</h4>
                    

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Request No.</label>
                                <div class="col-lg-6">
                                    {{$requests->request_no}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Category</label>
                                <div class="col-lg-6">
                                    {{$requests->name}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Date of Requisition</label>
                                <div class="col-lg-6">
                                    {{dateView($requests->due_date)}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Amount Requested</label>
                                <div class="col-lg-6">
                                    {{$requests->amount}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Purpose</label>
                                <div class="col-lg-6">
                                    {{$requests->purpose}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Description of Use</label>
                                <div class="col-lg-6">
                                    {{$requests->description_of_use}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Name Of Project</label>
                                        <div class="col-lg-6">
                                            {{displayView($requests->name_of_project)}}
                                        </div>
                                    </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
                                        <div class="col-lg-6">
                                            {{displayView($requests->project_expense_head)}}
                                        </div>
                                    </div>

                    </div>
                </div>

            </div>
    <?php } ?>
    <?php
    /*************verification system***************************************************/
    
    if($view=='requested_requests')
    { ?>
     {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                    'id'=>'theForm_verifier',
                                    'files'=>true])!!}
	<div class="card">
                <div class="card-body">
                 <div class="form-validation">
                     <h4 class="header2">RequestsD etails</h4>
                     

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Request No.</label>
                                <div class="col-lg-6">
                                    {{$requests->request_no}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Category</label>
                                <div class="col-lg-6">
                                    {{$requests->name}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Date of Requisition</label>
                                <div class="col-lg-6">
                                    {{dateView($requests->due_date)}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Amount (Rs)</label>
                                <div class="col-lg-6">
                                    {{$requests->amount}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Purpose</label>
                                <div class="col-lg-6">
                                    {{$requests->purpose}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Description of Use</label>
                                <div class="col-lg-6">
                                    {{$requests->description_of_use}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Required By</label>
                                <div class="col-lg-6">
                                    {{$requests->required_by_date}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Name Of Project<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" name="name_of_project"  class="form-control"  value="{{$requests->name_of_project}}" >
                                        </div>
                            </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                             <input type="text" name="project_expense_head" class="form-control" value="{{$requests->project_expense_head}}" onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                     
                                 <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="purpose">Comments</label>
                                        <div class="col-lg-6">
                                            <textarea  name="comments" id="comments"  class="form-control"></textarea>
                                        </div>
                                    </div>
                     
                             <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                        <div class="col-lg-6">
                                            {{$requests->c_status}}
                                        </div>
                                    </div>
                            
                                        <div class="col-lg-6">
                                            
                                             <input  type="hidden"  name="id" value="{{$requests->id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                            
                                            <button class="btn btn-primary submit" type="submit" name="verify"  value="Verify" onclick="return loadAdd()"><i class="fa fa-check-circle"></i> Verify</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger submit" type="submit" name="rejected" value="Rejected" onclick="return Validate()"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                            Reject</button>
                                             
                                        </div>

                    </div>
                </div>

            </div>
         {!!Form::close()!!}
    <?php } ?>
    <?php if($view=='verifireactive')
    { ?>
     {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                    'id'=>'theForm',
                                    'files'=>true])!!}
	<div class="card">
                <div class="card-body">
                 <div class="form-validation">
                     <h4 class="header2">RequestsD etails</h4>
                      

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Request No.</label>
                                <div class="col-lg-6">
                                    {{$requests->request_no}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Category</label>
                                <div class="col-lg-6">
                                    {{$requests->name}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Date of Requisition</label>
                                <div class="col-lg-6">
                                    {{dateView($requests->due_date)}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Amount (Rs)</label>
                                <div class="col-lg-6">
                                    {{$requests->amount}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Purpose</label>
                                <div class="col-lg-6">
                                    {{$requests->purpose}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Description of Use</label>
                                <div class="col-lg-6">
                                    {{$requests->description_of_use}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Required By</label>
                                <div class="col-lg-6">
                                    {{$requests->required_by_date}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Name Of Project<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                             {{$requests->name_of_project}}
                                        </div>
                                    </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                             {{$requests->project_expense_head}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="purpose">Comments</label>
                                        <div class="col-lg-6">
                                            <textarea  name="comments" id="comments"  class="form-control"></textarea>
                                        </div>
                                    </div>
                     
                             <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                        <div class="col-lg-6">
                                            {{$requests->c_status}}
                                        </div>
                                    </div>
                            
                                        <div class="col-lg-6">
                                             <input  type="hidden"  name="id" value="{{$requests->id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                            <button class="btn btn-primary submit" type="submit" name="approve"  value="Approve" onclick="return loadAdd()"><i class="fa fa-check-circle"></i> Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger submit" type="submit" name="approverejected" value="Rejected" onclick="return Validate()"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                                Reject</button>                                            
                                        </div>

                    </div>
                </div>

            </div>
                                     {!!Form::close()!!}
    <?php } ?>
    <?php if($view=='accountants')
    { ?>
     {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                    'id'=>'theForm',
                                    'files'=>true])!!}
	<div class="card">
                <div class="card-body">
                 <div class="form-validation">
              
                       <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Date of Release <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    {!! Form::text('date_of_release',null,['class'=>'form-control multiple_date',required])!!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Comment<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                   {!! Form::textarea('comment',null,['class'=>'form-control',required])!!}
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Amount (Rs)<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                     {!! Form::textarea('comment',null,['class'=>'form-control',required])!!}
                                    
                                </div>
                            </div>
                              <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                        <div class="col-lg-6">
                                            <input type="checkbox" name="status" required>
                                        </div>
                                    </div>
                            
                                        <div class="col-lg-6">
                                             <input  type="hidden"  name="id" value="{{$requests->id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                            <button class="btn btn-primary submit" type="submit" name="savevoucher"  value="savevoucher" onclick="return loadAdd()"><i class="fa fa-check-circle"></i> Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                       
                                        </div>

                    </div>
                </div>

            </div>
                                     {!!Form::close()!!}
    <?php } ?>

    



</div>

</div>
</div>

@endsection
<script>

    function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    }



    function loadAdd()
    {
        
      var  name_of_project    =   $("#name_of_project").val();
      var  project_expense_head  =  $("#project_expense_head").val();
       
    if(name_of_project=='')
    {
       alert("please enter name of project")     
        return false;
   
    }else if(project_expense_head=='')
    {
   alert("please enter project expense head")     
        return false;
    }else {
       $(".loder_id").show();  
    }
}


    function Validate()
    {

    var comments = $("#comments").val();
    if (comments == '')
    {
    alert("Please enter comment.");
    return false;
    } else
    {
    $(".loder_id").show();
    //document.getElementById('theForm_verifier').submit();
    }
    }
</script>

<script>
    function verifyRequest(id, user_id)
            {
            var amount_issued = $("#amount_issued").val();
            var date_issued = $("#date_issued").val();
            if (amount_issued == '')
            {
            alert("Please enter amount issued");
            return false
            }
            else if (date_issued == '')
            {
            alert("Please enter issued date");
            return false
            } else{

            $.ajax({
            type :'get',
                    url:'/requests/' + id + '/save_voucher',
                    data:"amount_issued=" + amount_issued + "&date_issued=" + date_issued,
                    success:function(data)
                    {
                    $("#amount_date").html(data);
                    $("#hiddenpdf").show();
                    $("#save").hide();
                    $("#amount_issued").hide();
                    $("#date_issued").hide();
                    }

            });
            }
            }
</script>




@push('scripts')

@endpush