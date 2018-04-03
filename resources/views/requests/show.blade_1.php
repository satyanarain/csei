@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
   @if($requests->status==1)
   <h3 class="text-primary">Requested Request Details</h3> </div>
   @endif
    @elseif($requests->status==2)
    <h3 class="text-primary">Verified Request Details</h3> </div>
    @endif
    @elseif($requests->status==3)
     <h3 class="text-primary">Aproved Request Details</h3> </div>
  @endif
<div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('verifiers.requests')}}">Requested Requests</a></li>
        <li class="breadcrumb-item active">Details</li>
    </ol>
</div>
</div>
<!-- End Bread crumb -->
@endsection

@section('content')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
     @if($requests->status==3)
     <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
<!--                                <table class="table-bordered">
                                    <tr><td>Voucher No </td><td>{{$requests->id}}</td><tr>
                                </table>-->
                                
                                
                                <div class="form-validation">
                                    <form class="form-valide" action="#" method="post">
                                      
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Voucher No.</label>
                                            <div class="col-lg-6">
                                              {{$requests->id}}  
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
                                              {{$requests->cat_name}}  
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
                                                @if($requests->amount_issued!='')  <span class="text-danger">*</span> @endif
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
                                            <label class="col-lg-4 col-form-label" for="val-username">Date Issued @if($requests->date_issued!='')<span class="text-danger">*</span>@endif</label>
                                            <div class="col-lg-6">
                                                  @if($requests->date_issued!='')
                                                   {{$requests->date_issued}}
                                                @else
                               <input type="text" class="form-control multiple_date" id="date_issued" name="date_issued" placeholder="Enter a date..">
                                @endif
                                            </div>
                                        </div>
                                         </span>
                                        
 @if($requests->date_issued=='')
                                 <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <div type="submit" class="btn btn-primary" onclick="verifyRequest( {{$requests->id}}  )" id="save">Save</div>
                                            </div>
                                 </div>
   @endif
                                <div class="form-group row">
                                     <div class="col-lg-8 ml-auto" id="hiddenpdf" @if($requests->date_issued!='') @else style="display:none" @endif>
                                                <div type="submit" class="btn btn-primary" onclick="verifyRequest122( {{$requests->id}}  )">Print</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div type="submit" class="btn btn-primary" onclick="verifyRequest11111( {{$requests->id}}  )">Pdf</div>
                                            </div>
                                    
                                  </div>
                              
                                       
                                    </form>
                                     </div>
                                </div>

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
                                        <label class="col-lg-4 col-form-label" for="roles">Category </label>
                                        <div class="col-lg-6">{{$requests->cat_name}}

                                        </div>        
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="amount">Amount (Rs) </label>
                                        <div class="col-lg-6">
                                            {{$requests->amount}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="purpose">Purpose </label>
                                        <div class="col-lg-6">
                                            {{$requests->purpose}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Due Date </label>
                                        <div class="col-lg-6">
                                            {{dateView($requests->due_date)}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                        <div class="col-lg-6">
                                            {{$requests->c_status}}
                                        </div>
                                    </div>
                                    <?php
                                    $request_only_view = Request::fullUrl();
                                    $view = end(explode('?', $request_only_view));
                                    ?>
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
                                                Rejected</button>
                                            @else
                                            <button class="btn btn-primary submit" type="submit" name="approve"  value="Approve" onclick="return loadAdd()"><i class="fa fa-check-circle"></i> Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger submit" type="submit" name="approverejected" value="Rejected" onclick="return Validate()"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                                Rejected</button>
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


@endsection
<script>
    function loadAdd()
    {
        $(".loder_id").show();
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
function verifyRequest(id,user_id)
{
   var amount_issued  =  $("#amount_issued").val();
   var date_issued    =  $("#date_issued").val();
   
   if(amount_issued=='')
   {
       alert("Please enter amount issued");
       return false
   }
  else if(date_issued=='')
   {
       alert("Please enter issued date");
       return false
   }else{
   
   
   
     $.ajax({
             type :'get',
             url:'/requests/'+id+'/save_voucher',
             data:"amount_issued="+amount_issued+"&date_issued="+date_issued,
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