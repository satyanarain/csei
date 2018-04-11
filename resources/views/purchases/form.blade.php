<div class="form-group row" >
                            <div class="col-lg-12">


                                <table width="100%" cellspacing="4" cellpadding="4" >
                                    <tr>
                                        <td  align="left"  style="text-align:center; background-color:#f2f2f2; border-bottom:#f8f8f8f8 ipx solid;" colspan="4">   
                                            {{Html::image('/images/logonicons/csei-60x60.png',array('style'=>''))}}</td>
                                    </tr>

                                    <tr height="30px;" align="left" valign="top">
                                        <td width="45%"  style="bgcolor:#ccc;">
                                            <table width="100%" align="left" style="text-align:left;">

                                                <tr class="table-row">
                                                    <td width="50%" align="left"  style="text-align:left;">   
                                                        <h6>CSEI</h6></td>
                                                </tr>
                                                <tr class="table-row" style="text-align:left; padding-bottom:20px;">
                                                    <td width="50%" align="left" style="text-align:left; padding:10px 0px 10px 0px;">  
                                                        Phone   : 011 2570 5650<br>
                                                        Website : http://csei.org.in/<br>
                                                        Address : Suman Lata Bhadola Marg, Block W, Guru Arjun Nagar, Shadipur, New Delhi, Delhi 110008
                                                    </td>
                                                </tr>
                                            </table>
                                        </td> 
                                        <td width="10%">&nbsp;<td>
                                            <!--------------------------------ship to--------------------------->
                                        <td width="45%" align="left" valign="top"> 
                                            <table width="100%" align="left" vlign="top" style="text-align:left;" border="0">
                                                <tr class="table-row" >
                                                    <td  align="left" vlign="top"  style="text-align:left;color:#00aff0" colspan="2">   
                                                        <h4  style="text-align:left;color:#00aff0">Purchase Order</h4></td>
                                                </tr>
                                                <tr height="90" class="table-row" ><td width="20%" align="left" style="text-align:left;" >PO  No.</td>
                                                    <td style="padding-top: 10px;">
                                                       @if($purchases->po_number!='')
                                                          {!! Form::text('po_number', null, ['class' => 'form-control','style'=>"height:32px;"]) !!}
                                                        @else
                                                      @php $purchases= maxId('purchases','po_number') @endphp
                                                     {!! Form::text('po_number', $purchases, ['class' => 'form-control','style'=>"height:32px;"]) !!}
                                                    @endif
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td width="20%" align="left" vlign="top" style="text-align:left;" >Date</td><td>
                                                        {!! Form::text('po_date', null, ['class' => 'form-control multiple_date','style'=>"height:32px;", 'required'=>'required','readonly'=>'readonly']) !!}
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>   

                                    </tr>
                                    <tr height="30px;"  align="left"  valign="top">
                                        <td width="45%"  style="bgcolor:#ccc;"  align="left"  valign="top">
                                            <table width="100%" align="left"  valign="top" border="0" style="text-align:left;">
                                                <tr class="table-row" >
                                                    <td  colspan="2" align="left" class="table-row-heading" style="text-align:left;">   
                                                        Vendor 
                                                    </td>
                                                </tr>
                                                <tr height="90" class="table-row" >
                                                    <td width="20%" align="left" style="text-align:left;" >Name<span class="required"></span></td>
                                                    <td style="padding-top: 10px;">
                                                       {!! Form::text('v_name', null, ['class' => 'form-control','style'=>"height:32px;",'required'=>'required']) !!}
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td width="20%" align="left" vlign="top" style="text-align:left;" >Address<span class="required"></span></td><td>
                                                     {!! Form::text('v_address', null, ['class' => 'form-control','style'=>"height:32px;",'required'=>'required']) !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="20%" align="left" vlign="top" style="text-align:left;" >Phone<span class="required"></span></td>
                                                    <td>
                                                        {!! Form::text('v_phone', null, ['class' => 'form-control','style'=>"height:32px;",'required'=>'required']) !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="20%" align="left" vlign="top" style="text-align:left;" >Mobile<span class="required"></span></td><td>
                                                         {!! Form::text('v_mobile', null, ['class' => 'form-control','style'=>"height:32px;",'required'=>'required']) !!}
                                                    </td>
                                                </tr>

                                            </table>
                                        </td> 
                                        <td width="10%">&nbsp;<td>
                                            <!--------------------------------ship to--------------------------->
                                        <td width="45%" align="left" valign="top"> 
                                            <table width="100%" align="left"  valign="top" border="0" style="text-align:left;">
                                                <tr class="table-row" >
                                                    <td  colspan="2" align="left" class="table-row-heading" style="text-align:left;">   
                                                        Ship To
                                                    </td>
                                                </tr>
                                                <tr height="90" class="table-row" >
                                                    <td width="20%" align="left" style="text-align:left;" >Name</td>
                                                    <td style="padding-top: 10px;">
                                                       {!! Form::text('s_name', null, ['class' => 'form-control','style'=>"height:32px;",'required'=>'required']) !!}
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td width="20%" align="left" vlign="top" style="text-align:left;" >Address</td><td>
                                                     {!! Form::text('s_address', null, ['class' => 'form-control','style'=>"height:32px;",'required'=>'required']) !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="20%" align="left" vlign="top" style="text-align:left;" >Phone</td>
                                                    <td>
                                                        {!! Form::text('s_phone', null, ['class' => 'form-control','style'=>"height:32px;",'required'=>'required']) !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="20%" align="left" vlign="top" style="text-align:left;" >Mobile</td><td>
                                                         {!! Form::text('s_mobile', null, ['class' => 'form-control','style'=>"height:32px;",'required'=>'required']) !!}
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>   

                                    </tr>

                                </table>

                                <div class="form-group ">
                                    <div class="col-md-9" style="padding:0px 0px 0px 0px; margin-bottom:10px;">
                                        </br>
                                        <div class="btn btn-success add-more pull-left" type="button" id="add_bank_info" style="margin-bottom:10px;"><i class="fa fa-plus" ></i> Add</div>

                                    </div>

                                </div>                             
                                <div class="table-scrollable form-body">
                                    <table class="table table-bordered table-striped table-hover bank_table">
                                        <thead>
                                            <tr>
                                                <th class="table-row-heading">Code</th>
                                                <th class="table-row-heading">Product Name</th>
                                                <th class="table-row-heading">Quantity</th>
                                                <th class="table-row-heading">Unit Rate</th>
                                                <th class="table-row-heading">Total Amount</th>
                                                <th class="table-row-heading">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <span><input type="text" class="form-control product_code" size="5" name="product_code[]"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <input type="text" class="form-control" size="5" name="product_name[]" required="required">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <input type="text" class="form-control quantity2" size="5" name="purchase_quantity[]" onkeypress="return isIntegerKey(event)" required="required">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <input type="text" class="form-control rate" size="5" name="purchase_unit_rate[]" onkeypress="return isNumberKey(event)" required="required">
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
                                                    <span style="display:none" class="rm_first"><button class="remove_bank_row">Remove</button></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" align="left"  valign="top" border="0" cellspacing="4" cellpadding="4" class="table table table-striped table-hover">
                                        <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   

                                        </td>
                                        <td  colspan="" align="left" valign="top" style="text-align:left;"  width="30%">   

                                        </td>
                                        <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   

                                        </td>
                                        <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="20%">   
                                            &nbsp;&nbsp;&nbsp;&nbsp;Total
                                        </td>
                                        <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="20%">   
                                            
                                            {!! Form::text('total', null, ['class' => 'form-control','style'=>"height:40px;",'id'=>'grandTotal','readonly'=>'readonly']) !!}
                                           
                                        </td>
                                        <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="10%">   

                                        </td>

                                        </tr>
                                    </table>
                                    </div>
                                <table width="100%" cellspacing="4" cellpadding="4" border="0">

                                    <tr height="30px;"  align="left"  valign="top">
                                        <td width="45%"  style="bgcolor:#ccc;"  align="left"  valign="top">
                                            <table width="100%" align="left"  valign="top" border="0" style="text-align:left;">
                                                <tr class="table-row" >
                                                    <td  colspan="2" align="left" class="table-row-heading" style="text-align:left;">   
                                                        REQUISITIONER 
                                                    </td>
                                                </tr>

                                                <tr style="text-align:left;height:50px; ">
                                                    <td width="20%" align="left" vlign="top" style="text-align:left;" >Name</td><td>
                                                  
                                                          {!! Form::text('requisitioner', null, ['class' => 'form-control','style'=>"height:32px;",'required'=>'required']) !!}
                                                    </td>
                                                </tr>


                                            </table>
                                        </td> 
                                        <td width="10%">&nbsp;<td>
                                            <!--------------------------------ship to--------------------------->
                                        <td width="45%" align="left" valign="top"> 


                                        </td>   

                                    </tr>
                                    <tr><td align="right" valign="top" colspan="6" height="10">
                                        </td></tr>
                                    <tr><td align="left" valign="top" colspan="6">
                                        
                                                    <button class="btn btn-primary submit pull-left" type="submit" name="action"><i class="fa fa-paper-plane"></i> Submit
                                                   
                                        </td></tr>
                                </table> 


                            </div>
                        </div>