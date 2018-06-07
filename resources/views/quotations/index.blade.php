@extends('layouts.napp')

@section('content')
<div class="row justify-content-center" id='printableArea'>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">

                {!!Form::open(['route'=>'quotations.store', 'id'=>'formValidate', 
                'onsubmit'=>'return validatePan()',
                'autocomplete'=>'off',
                'class'=>'formValidate', 'files'=>true])!!}


                <div class="form-validation">
                    <table width="100%" cellspacing="4" cellpadding="4" >
                        <tr>
                            <td  align="left"  style="text-align:center; background-color:#f2f2f2; border-bottom:#f8f8f8f8 ipx solid;" colspan="4">   
                                {{Html::image('/images/logonicons/csei-60x60.png',array('style'=>''))}}</td>
                        </tr>
                    </table>
                    <h4 class="header2" style="border-bottom:#ccc 0px solid;">Quotation Form</h4>
                    @include('partials.message')
                    <div class="table-scrollable form-body">
                      <table class="table table-bordered table-striped table-hover bank_table">
                            <thead>
                                <tr>
                                    <th class="table-row-heading">S No</th>
                                    <th class="table-row-heading">Product Name</th>
                                    <th class="table-row-heading">Quantity</th>
                                    <th class="table-row-heading">Cost / PC</th>
                                    <th class="table-row-heading">GST(%)</th>
                                    <th class="table-row-heading">Total Amount</th>
                                    <th class="table-row-heading">Time Line</th>
                                    <th class="table-row-heading">Requester Remark</th>
                                    <th class="table-row-heading" style="text-align:left;">Vendor Remark</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quotations as $quotation_value)
                                <tr>
                                    <td>
                                        <div class="dummy">
                                            <div class="input-icon right">
                                                <span>
                                                    <input type="text" class="form-control product_code" size="5" name="s_no[]" value="{{$quotation_value->s_no}}" readonly="readonly">
                                                    <input type="hidden" class="form-control product_code" size="5" name="material_id[]" value="{{$quotation_value->material_id}}" readonly="readonly">

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dummy">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control" size="5" name="product_name[]" required="required" value="{{$quotation_value->product_name}}" readonly="readonly">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dummy">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control quantity2" size="5" name="purchase_quantity[]" onkeypress="return isIntegerKey(event)" required="required" value="{{$quotation_value->purchase_quantity}}" readonly="readonly">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dummy">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control rate" size="5" name="purchase_unit_rate[]" onkeypress="return isIntegerKey(event)" required="required">
                                            </div>
                                        </div>
                                    </td>
                                     <td>
                                        <div class="dummy">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control gst" size="5" name="gst[]" onkeypress="return isNumberKey(event)" required="required">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dummy">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control tamnt" size="7" name="purchase_unit_amount[]" readonly="readonly">
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="dummy">
                                            <div class="input-icon right">
                                         
                                                <input type="text" class="form-control multiple_date_due" size="7" name="timeline[]" required="required">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dummy">
                                            <div class="input-icon right">
                                          {{$quotation_value->remark}}
                                          <input type="hidden" class="form-control tamnt" size="7" name="remark[]" readonly="readonly" value="{{$quotation_value->remark}}">
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="dummy">
                                            <div class="input-icon right">
                                                <textarea  class="form-control" size="7" name="vendor_remark[]" required="required"></textarea>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                      <table width="100%" cellspacing="4" cellpadding="4" border="0">
                       <tr><td align="right" valign="top" colspan="6" height="10"></td>
                        </tr>
                        <tr>
                                <td align="left" valign="top" colspan="6" style="text-align:left;">
                                <input type="hidden" class="form-control" size="7" name="vendor_id" readonly="readonly" readonly="readonly"  value="{{$vendor_id}}">
                                <input type="hidden" class="form-control" size="7" name="request_id" readonly="readonly" readonly="readonly"  value="{{$request_id}}">
                                <button type="reset" value="Reset" class="btn btn-primary submit">Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-primary submit" type="submit" name="action"><i class="fa fa-paper-plane"></i> Submit</button></td>
                        </tr>
                    </table> 
                   </div>
                {!!Form::close()!!}        

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection
