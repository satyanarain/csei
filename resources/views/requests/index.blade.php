@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Requests</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">All Requests</li>
      </ol>
    </div>
  </div>
  <!-- End Bread crumb -->
  @endsection

  @section('content')
  <table class="m_3012731993381030246inner-body" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;margin:0 auto;padding:0;width:570px" cellspacing="0" cellpadding="0" align="center" width="570">
                    <tbody><tr>
                            <td class="m_3012731993381030246content-cell" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px"><span class="im">
                                    <h1 style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:left">Dear {{$name}},</h1>
<!--                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">A request for Rs. {{$amount}} has been created. Please review and Verify.</p>-->
                                <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                   You have been issued Rs. {{$amount}} against your request number {{$request_no}} has been completed .</p>
                                <p style="color:#2f3133;">DETAILS</p>
                                    <p>
                                    <table align="left" valign="top" border="0" style="border:1px solid #dee2e6;" width="100%">
                                     <?php  
                                      $sql = DB::table('requests')->select('*')->where('request_no',$request_no)->first();
                                      $id=$sql->id;
                                      $sql_vou = DB::table('vouchers')->select('*')->where('request_id',$id)->first();
                                      ?>
                                           <tr style="border-bottom-width: 1px; padding-top: 3px;padding-bottom: 3px; color:#2f3133; height:40px;border: 1px solid #dee2e6; background-color:#e9ecef;">
                                                <td style="padding:0px 0px 0px 10px;" align="left" valign="top" width="25%">
                                                    Payment Type
                                                 </td>
                                                 <td style="padding:0px 0px 0px 10px; text-align:left;color:#2f3133;" align="left" valign="top" width="75%">
                                                 <?php if($sql_vou==1)
                                                 {
                                                  echo "Bank";
                                                 }else {
                                                  echo "Cash"; 
                                                 } ?>
                                                </td>
                                                </tr>
                                           <tr style="border-bottom-width: 1px; padding-top: 3px;padding-bottom: 3px; color:#2f3133; height:40px;border: 1px solid #dee2e6; background-color:#e9ecef;">
                                                <td style="padding:0px 0px 0px 10px;text-align:left;" align="left" valign="top" >
                                                   Amount Requested
                                                 </td>
                                                 <td style="padding:0px 0px 0px 10px;text-align:left;color:#2f3133;" align="left" valign="top" style="padding:0px 0px 0px 10px; text-align:left;">
                                                 {{$sql->amount}}
                                                </td>
                                                </tr>
                                               <tr style="border-bottom-width: 1px; padding-top: 3px;padding-bottom: 3px;color:#2f3133;  height:40px;border: 1px solid #dee2e6; background-color:#e9ecef;">
                                                <td style="padding:0px 0px 0px 10px;text-align:left;" align="left" valign="top">
                                                   Release Amount
                                                 </td>
                                                 <td style="padding:0px 0px 0px 10px;text-align:left;color:#2f3133;" align="left" valign="top">
                                                 {{$sql_vou->release_voucher_amount}}
                                                </td>
                                                </tr>
                                             </table>
                                    </p>
                                    <br> 
                                    <br> 
                                 <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">Thanks,<br>
                                    CSEI Team</p>
                              </td>
                        </tr>
                    </tbody>
                </table>
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
           <div class="table-responsive m-t-40">
               
               
               
               
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                <tr>
                 <th style="display:none">id</th>
                  <th>Date of Requisition</th>
                 <th>Requisition No.</th>
                 <th>Category</th>
                  <th>Purpose</th>
                  <th>Status</th>
                @include('partials.action')
               </tr>
             </thead>
             <tbody>
              @foreach($requests as $key=>$request)
              <tr>
                  <td style="display:none">{{$request->id}}</td>
               <td>
                {{dateView($request->due_date)}}
              </td>
                <td>{{$request->request_no}}</td>
               <td>{{displayView($request->name)}}</td>
                <td>{{$request->purpose}}</td>
<!--                 <td>{{$request->amount}}</td>-->
                 <td>
                 <div class="{{$request->b_class}}">  {{$request->c_status}}</div>
                 </td>
                <td>
                @if($request->status == 1)
                <a href="{{route('requests.edit', $request->id)}}" class="btn btn-success m-b-10 m-l-5 pull-left"><i class="fa fa-pencil"></i> Edit</a>
                @endif
                <a href="{{route('requests.show',[$request->id,'view'])}}" class="btn btn-primary m-b-10 m-l-5 pull-left"><i class="fa fa-search"></i> View</a>
              
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
 
@endsection
@push('scripts')

@endpush