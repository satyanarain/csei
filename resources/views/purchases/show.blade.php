@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Purchase Order Details</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">All Purchase Order</a></li>
            <li class="breadcrumb-item active">Purchase Order Details</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
@endsection
@section('content')
<!-- Container fluid  -->
<div class="row justify-content-center" id='printableArea'>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    {!!Form::open(['route'=>'purchases.store', 'id'=>'formValidate', 
                    'onsubmit'=>'return validatePan()',
                    'autocomplete'=>'off',
                    'class'=>'formValidate', 'files'=>true])!!}
                      <table>
                        <tr>
                            <td  align="left"  style="text-align:center; background-color:#f2f2f2; border-bottom:#f8f8f8f8 ipx solid;" colspan="4">   
                                {{Html::image('/images/logonicons/csei-60x60.png',array('style'=>''))}}</td>
                        </tr>
                    <tr height="30px;" align="left" valign="top" >
                            <td width="45%"  style="bgcolor:#ccc;">
                                <table width="100%" align="left" style="text-align:left;"  class="table table-bordered  table-striped table-hover bank_table">

                                    <tr class="table-row" style="text-align:left; padding-bottom:20px;" >
                                                    <td align="left" valign="top" style="text-align:left">Phone</td><td align="left" valign="top" style="text-align:left">:</td>
                                                   <td align="left" valign="top" style="text-align:left"> 011 2570 5650</td> 
                                                   </tr>    
                                                   <tr> <td align="left" valign="top" style="text-align:left">Website</td><td align="left" valign="top" style="text-align:left">:</td><td align="left" valign="top" style="text-align:left">http://csei.org.in/</td> </tr>    
                                                   <tr> <td align="left" valign="top" style="text-align:left">Address</td><td align="left" valign="top" style="text-align:left">:</td><td align="left" valign="top" style="text-align:left">Suman Lata Bhadola Marg, Block W, Guru Arjun Nagar, Shadipur, New Delhi, Delhi 110008</td>    
                                                 </tr>
                                           </td>
                                    </tr>
                                </table>
                            </td> 
                            <td width="10%">&nbsp;<td>
                                <!--------------------------------ship to--------------------------->
                            <td width="45%" align="left" valign="top"> 
                                <table  class="table table-bordered  table-striped table-hover bank_table">
                                
<tr height="90" class="table-row" style="text-align:left; padding-bottom:20px;"><td width="30%" align="left" style="text-align:left;" > P. C. S | No.</td>
<td style="padding-top: 0px;text-align:left;" align="left" vlign="top"> {{$total}}{!! Form::hidden('po_number', $total, ['class' => 'form-control','style'=>"height:32px;"]) !!}</td>
                                    </tr> 
                                    <tr>
<td width="20%" align="left" vlign="top" style="text-align:left;" > Date </td><td style="text-align:left;" align="left" vlign="top"><?php echo $date = date("d-m-y");
?>{!! Form::hidden('date', $date, ['class' => 'form-control','style'=>"height:32px;"]) !!}
                                        </td>
                                    </tr>
                                </table>
   </td>   

                        </tr>


                    </table>  

                    <table width="100%" align="left" style="text-align:left;" border="0" class="table table-bordered  table-striped table-hover bank_table">
                        <tr>
                            <td align="left"  style="text-align:left; height:0px; width:45%"><b>To</b></td>
                            <td align="left"  style="text-align:left; height:0px;">&nbsp</td>
                        </tr>
                       <tr  style="text-align:left; padding-bottom:20px;">

                            <td  align="left" style="text-align:left; padding:10px 0px 10px 0px;">
                                
                                 <table >
                                             <td align="left" valign="top" style="text-align:left">Name</td><td align="left" valign="top" style="text-align:left">:</td><td align="left" valign="top" style="text-align:left">{{$vendor_quotation_lists->name}}</td> </tr>    
                                                   <tr> <td align="left" valign="top" style="text-align:left">Phone</td><td align="left" valign="top" style="text-align:left">:</td><td align="left" valign="top" style="text-align:left"> {{$vendor_quotation_lists->name}}</td> </tr>    
                                                   <tr> <td align="left" valign="top" style="text-align:left">Address</td><td align="left" valign="top" style="text-align:left">:</td><td align="left" valign="top" style="text-align:left">{{$vendor_quotation_lists->address}}</td>    
                                                 </tr>
                                             </table>
                                
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left"  style="text-align:left; height:30px;">
                                <input type="hidden" value="{{$vendor_quotation_lists->vendor_id}}" name="vendor_id">
                                <input type="hidden" value="{{$requests->id}}" name="request_id">
                            </td><td></td>
                        </tr>
                    </table>         
    <table class="table table-bordered table-striped table-hover bank_table">
                    @include('partials.item_list')
                        <?php
                        $vendor_quotation_list_all = DB::table('vendor_quotation_lists')->select('*')
                                ->leftjoin('requests', 'requests.id', 'vendor_quotation_lists.request_id')
                                ->leftjoin('vendors', 'vendors.id', 'vendor_quotation_lists.vendor_id')
                                ->where('vendor_quotation_lists.request_id', $requests->id)
                                ->where('vendor_quotation_lists.vendor_id', $vendor_quotation_lists->vendor_id)
                                ->get();
                        ?>
                        @foreach($vendor_quotation_list_all as $vendor_value_all)
                        <tr>
                            @include('partials.item_list_sub')
                            <?php $allready = alreadyComment('vendor_finalise_for_purchase_orders', $requests->id, $vendor_quotation_lists->vendor_id, 'request_id', 'vendor_id');
                            ?>

                        </tr>
                        @endforeach
                    </table>

                    <table width="100%" cellspacing="4" cellpadding="4" border="0">
                        <tr>
                            <td align="left" valign="top" colspan="6" height="10" style="text-align:left;" height="100"></td>
                        </tr>

                        <tr>
                            <td align="left" valign="top" colspan="6" height="10" style="text-align:left;">Terms & Condition</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" colspan="6" height="10" style="text-align:left;"><input type="checkbox" name="term" id="chkterms" onclick="checckTermPop()"></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" colspan="6" height="10" style="text-align:left;" height="100"></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" colspan="6" style="text-align:left;"><br>
                                <button class="btn btn-primary submit" type="submit" name="action" id="btncheck" onclick="return checckTerm()"><i class="fa fa-paper-plane"></i> Send For Order</button>
                            </td>
                        </tr>
                    </table> 

                    {!!Form::close()!!}        
                </div>  
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('scripts')
<script>
    function checckTerm() {
        if ($('#chkterms').is(':checked')) {
           // alert('you agreed conditions')
 return true;
        } else {
            alert('please check terms & conditions')
            return false;
        }
    }
    function checckTermPop() {

        if ($('#chkterms').is(':checked')) {
            $("#comment").show();

        }
    }
    function closeTermandCondition() {
        $("#comment").hide();
    }
</script>
@endpush