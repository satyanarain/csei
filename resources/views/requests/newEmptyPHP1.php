@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        @if($requests->status==1)
        <h3 class="text-primary">Requested Request Details</h3> </div>
    @elseif($requests->status==2)
    <h3 class="text-primary">Verified Request Details</h3> </div>
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
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="#" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                       
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
             
    
    <!-- Start Page Content -->
<!--    <div class="row">
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
                                     @if($requests->status==3)
                                   <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="roles">Voucher No.</label>
                                        <div class="col-lg-6">{{$requests->id}}</div>        
                                    </div>
                                       <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="roles">Name of Requester.</label>
                                        <div class="col-lg-6">{{$requests->requester_name}}</div>        
                                    </div>
                                      @endif
                                  <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="roles">Category </label>
                                        <div class="col-lg-6">{{$requests->cat_name}}

                                        </div>        
                                    </div>
                                      
                                      
                                      @if($requests->status==3)
                                      
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="amount">Requested Amount(Rs) </label>
                                        <div class="col-lg-6">
                                            {{$requests->amount}}
                                        </div>
                                    </div>
                                      @else
                                      <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="amount">Amount(Rs) </label>
                                        <div class="col-lg-6">
                                            {{$requests->amount}}
                                        </div>
                                    </div>
                                       @endif
                                      
                                     @if($requests->status==3)
                                       <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="amount">Amount Issued</label>
                                        <div class="col-lg-6">
                                            {{$requests->amount}}
                                        </div>
                                    </div>
                                       <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="amount">Date Issued </label>
                                        <div class="col-lg-6">
                                            {{$requests->amount}}
                                        </div>
                                    </div>
                                       @endif
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
                                        @if($requests->status!=3)
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
                                      @endif
                                    
                                    
                                    
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
<!--
<script>
function verifyRequest(id,user_id)
          {
            var r = confirm("Are you sure to verify?");
if (r == true) {
    if(id!='')
    {
         $(".loder_id").show(); 
     $.ajax({
             type :'get',
             url:'/requests/verify_request/',
             data:"user_id="+user_id+"&id="+id,
             success:function(data)
             {
                 alert(data)
              $(".loder_id").hide();  
               $("#"+id).fadeOut( "slow" ); 
              
             }
                  
            });
        }         
           
         
} else {
     return false;
    
} 
} 


</script>-->




@push('scripts')

@endpush