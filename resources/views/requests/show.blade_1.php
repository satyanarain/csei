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
    @if(($requests->status==3 || $requests->status==5) && ($request_account=='accountants'))
	
            <div class="card">
                <div class="card-body">
                 <div class="form-validation">

                        <form class="form-valide" action="#" method="post">

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Voucher No.</label>
                                <div class="col-lg-6">
                                    {{$requests->request_no}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Name of Requester</label>
                                <div class="col-lg-6">
                                    {{$requests->requester_name}}  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Category</label>
                                <div class="col-lg-6">
                                    {{$requests->category_id}}  
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
                                <label class="col-lg-4 col-form-label" for="val-username">Date Requested</label>
                                <div class="col-lg-6">
                                    {{$requests->due_date}}  
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Amount Requested</label>
                                <div class="col-lg-6">
                                    {{$requests->amount}}  
                                </div>
                            </div>
                           <span id="amount_date">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Amount Issued
                                        @if($requests->amount_issued=='')  <span class="text-danger">*</span> @endif
                                    </label>
                                    <div class="col-lg-6">
                                        @if($requests->amount_issued!='')
                                        {{$requests->amount_issued}}
                                        @else
                                        <input type="text" class="form-control" id="amount_issued" name="amount_issued" placeholder="Ammount Issued">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Date Issued @if($requests->date_issued=='')<span class="text-danger">*</span>@endif</label>
                                    <div class="col-lg-6">
                                        @if($requests->date_issued!='')
                                        {{$requests->date_issued}}
                                        @else
                                        <input type="text" class="form-control multiple_date" id="date_issued" name="date_issued" placeholder="Enter a date..">
                                        @endif
                                    </div>
                                </div>
                            </span>
                            
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date"><b>Project Expense Head</b></label>
                                        <div class="col-lg-6">
                                            {{displayView($requests->project_expense_head)}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date"><b>Status</b></label>
                                        <div class="col-lg-6">
                                            {{$requests->c_status}}
                                        </div>
                                    </div>
                                    
                                <div class="form-group row">
                                    <table class="table table-bordered table-striped table-hover bank_table">
                                        <tr class="table-row" >
                                            <td  colspan="" align="left" class="table-row-heading" style="text-align:left;" width="10%">   
                                                S. No.
                                            </td>
                                            <td   align="left" class="table-row-heading" style="text-align:left;"  width="40">   
                                                Brief Detail<span class="text-danger">*</span>
                                            </td>
                                            <td  align="left" class="table-row-heading" style="text-align:left;"  width="15%">   
                                                Amount Requested
                                            </td>
                                            <td  align="left" class="table-row-heading" style="text-align:left;"  width="35%">   
                                                Remarks
                                            </td>
                                           
                                        </tr>
                                    </table>
                                    <?php // print_r($request_details); ?>
                                    @foreach($request_details as $value)
                                    <table class="table table-bordered table-striped table-hover bank_table" >
                                        <tr class="table-row-nopadding">
                                            <td  colspan="" align="left" valign="top" style="text-align:left;" width="10%">   
                                               {{ $value->s_no}}
                                            </td>
                                            <td  colspan=""   align="left" valign="top" style="text-align:left;" width="40%">   
                                            {{ $value->brief_details}}
                                            </td>
                                            <td  colspan="" align="left" valign="top" style="text-align:left;" width="15%">   
                                              {{ $value->expected_expense}}
                                            </td>
                                            <td  colspan="" align="left" valign="top"  style="text-align:left;" width="35%">   
                                                  {{ $value->remark}}
                                            </td>
                                          </tr>   
                                        </table>  
                                    @endforeach
                                    
                                     </div>
                             @if($requests->date_issued=='')
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <div type="submit" class="btn btn-primary" onclick="verifyRequest( {{$requests->id}}  )" id="save">Save</div>
                                </div>
                            </div>
                            @endif
                                          
                             
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto" id="hiddenpdf" @if($requests->date_issued!='') @else style="display:none" @endif>
                                     <div type="submit" class="btn btn-primary" onclick="printDiv('printableArea')"><i class="fa fa-print"></i>&nbsp;Print</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--                                    <div type="submit" class="btn btn-primary" onclick="verifyRequest11111( {{$requests->id}}  )">Pdf</div>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
      @else

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col s12 m6 l6">	
                            <div class="col s12 m12 l12">
                                <div class="card-panel">
                                    <h4 class="header2">Requests Details</h4>
                                    {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                    'id'=>'theForm',
                                    'files'=>true])!!}
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="roles"><b>Request No.</b></label>
                                        <div class="col-lg-6">{{$requests->request_no}}
                                      </div>        
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="roles"><b>Category</b></label>
                                        <div class="col-lg-6">
                                          {{displayNameFoMultipleID('categories','id',$requests->category_id) }}
                                        </div>        
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="amount"><b> Total Amount (Rs)</b></label>
                                        <div class="col-lg-6">
                                            {{$requests->amount}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="purpose"><b>Purpose</b></label>
                                        <div class="col-lg-6">
                                            {{$requests->purpose}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date"><b>Date</b></label>
                                        <div class="col-lg-6">
                                            {{dateView($requests->due_date)}}
                                        </div>
                                    </div>
                            
                                    <div class="form-group row">
                                           @if($view=='requested_requests')
                                        <label class="col-lg-4 col-form-label" for="due_date"><b>Name of Project<span class="text-danger">*</span></b></label>
                                              @endif
                                                 @if($view=='view'  || $view=='verifireactive')
                                               <label class="col-lg-4 col-form-label" for="due_date"><b>Name of Project</b></label>
                                                  @endif
                                        <div class="col-lg-6">
                                        <?php //echo $view; ?>
                                        @if($view=='requested_requests')
                                        <input type="text" name="name_of_project"  class="form-control"  value="{{$requests->name_of_project}}" required="">
                                             @endif
                                             @if($view=='view'  || $view=='verifireactive')
                                            {{displayView($requests->name_of_project)}}
                                          @endif
                                        
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                          @if($view=='requested_requests')
                                        <label class="col-lg-4 col-form-label" for="due_date"><b>Project Expense Head</b><span class="text-danger">*</span></label>
                                        @endif
                                        @if($view=='view'  || $view=='verifireactive')
                                          <label class="col-lg-4 col-form-label" for="due_date"><b>Project Expense Head</b></label>
                                           @endif
                                        <div class="col-lg-6">
                                          @if($view=='requested_requests')
                                          <input type="text" name="project_expense_head" class="form-control" value="{{$requests->project_expense_head}}" required="">
                                             @endif
                                             @if($view=='view'  || $view=='verifireactive')
                                            {{displayView($requests->project_expense_head)}}
                                          @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date"><b>Status</b></label>
                                        <div class="col-lg-6">
                                            {{$requests->c_status}}
                                        </div>
                                    </div>
                                    
                                <div class="form-group row">
                                    <table class="table table-bordered table-striped table-hover bank_table">
                                        <tr class="table-row" >
                                            <td  colspan="" align="left" class="table-row-heading" style="text-align:left;" width="10%">   
                                                S. No.
                                            </td>
                                            <td   align="left" class="table-row-heading" style="text-align:left;"  width="40">   
                                                Brief Detail<span class="text-danger">*</span>
                                            </td>
                                            <td  align="left" class="table-row-heading" style="text-align:left;"  width="15%">   
                                                Amount Requested
                                            </td>
                                            <td  align="left" class="table-row-heading" style="text-align:left;"  width="35%">   
                                                Remarks
                                            </td>
                                           
                                        </tr>
                                    </table>
                                    <?php // print_r($request_details); ?>
                                    @foreach($request_details as $value)
                                    <table class="table table-bordered table-striped table-hover bank_table" >
                                        <tr class="table-row-nopadding">
                                            <td  colspan="" align="left" valign="top" style="text-align:left;" width="10%">   
                                               {{ $value->s_no}}
                                            </td>
                                            <td  colspan=""   align="left" valign="top" style="text-align:left;" width="40%">   
                                            {{ $value->brief_details}}
                                            </td>
                                            <td  colspan="" align="left" valign="top" style="text-align:left;" width="15%">   
                                              {{ $value->expected_expense}}
                                            </td>
                                            <td  colspan="" align="left" valign="top"  style="text-align:left;" width="35%">   
                                                  {{ $value->remark}}
                                            </td>
                                          </tr>   
                                        </table>  
                                    @endforeach
                                    
                                     </div>
                        
                                   
                                    @if($view!='view')

                                    <input  type="hidden"  name="id" value="{{$requests->id}}">
                                    <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="purpose">Comments</label>
                                        <div class="col-lg-6">
                                            <textarea  name="comments" id="comments"  class="form-control"></textarea>
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <div class="col-lg-4">
                                        </div>
                                        <div class="col-lg-6">
                                            @if($requests->status==1)
                                            <button class="btn btn-primary submit" type="submit" name="verify"  value="Verify" onclick="return loadAdd()"><i class="fa fa-check-circle"></i> Verify</button>

                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger submit" type="submit" name="rejected" value="Rejected" onclick="return Validate()"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                                Reject</button>
                                            @else
                                            <button class="btn btn-primary submit" type="submit" name="approve"  value="Approve" onclick="return loadAdd()"><i class="fa fa-check-circle"></i> Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger submit" type="submit" name="approverejected" value="Rejected" onclick="return Validate()"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                                Reject</button>
                                            @endif
                                        </div>
                                    </div>
                                    {!!Form::close()!!}
                                    @endif               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!--    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    
     Modal 
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
         Modal content
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>-->


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
        
      var  name_of_project    =   $("name_of_project").val();
      var  project_expense_head  =  $("project_expense_head").val();
       
    if(name_of_project!='')
    {
       alert("please enter name of project")     
        return false;
   
    }else if(&& project_expense_head!='')
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
    document.getElementById('theForm').submit();
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