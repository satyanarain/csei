<div class="form-group row" >
                            <div class="col-lg-12">
                            <table width="100%" cellspacing="4" cellpadding="4" >
                                    <tr height="30px;" align="left" valign="top">
                                        <td width="45%"  style="bgcolor:#ccc;">
                                            <table class="table table-bordered table-striped table-hover bank_table">

                                                <tr class="table-row">
                                                    <td width="50%" align="left"  style="text-align:left;">From : Supplier</td>
                                                    <td width="50%" align="left"  style="text-align:left;">{{ $vendor_quotation_lists->name }}</td>
                                                </tr>
                                                <tr class="table-row">
                                                    <td width="50%" align="left"  style="text-align:left;">To : Receiving</td>
                                                    <td width="50%" align="left"  style="text-align:left;"><input type="text" name="recieving" class="form-control" required="required">
                                                    <input type="hidden" name="request_id" class="form-control" value="{{$requests->id}}">
                                                    
                                                    </td>
                                                </tr>
                                               
                                            </table>
                                        </td> 
                                        <td width="10%">&nbsp;<td>
                                            <!--------------------------------ship to--------------------------->
                                        <td width="45%" align="left" valign="top"> 
                                           <table class="table table-bordered table-striped table-hover bank_table">

                                                <tr class="table-row">
                                                    <td width="50%" align="left"  style="text-align:left;">Order Date</td>
                                                    <td width="50%" align="left"  style="text-align:left;">{{ dateView($vendor_quotation_lists->created_at) }}</td>
                                                </tr>
                                                <tr class="table-row">
                                                    <td width="50%" align="left"  style="text-align:left;">Requisition Date</td>
                                                    <td width="50%" align="left"  style="text-align:left;">{{$requests->due_date}}</td>
                                                </tr>
                                                <tr class="table-row">
                                                    <td width="50%" align="left"  style="text-align:left;">Requisition By</td>
                                                    <td width="50%" align="left"  style="text-align:left;">
                                                        {{$requests->username}}
                                                    </td>
                                                </tr>
                                               
                                            </table>

                                        </td>   

                                    </tr>
                                    

                                </table>

                                <div class="form-group ">
                                    <div class="col-md-9" style="padding:0px 0px 0px 0px; margin-bottom:10px;">
                                     </div>

                                </div>                             
                                <div class="table-scrollable form-body">
                                    
                                    <table class="table table-bordered table-striped table-hover bank_table">
                     
                      <tr>
                        <th  class="table-row-heading">S No</th>
                        <th  class="table-row-heading">Product Name</th>
                        <th  class="table-row-heading">Order Qty.</th>
                        <th  class="table-row-heading">Received Qty.</th>
                        <th class="table-row-heading">Cost / PC</th>
                        <th class="table-row-heading">GST</th>
                        <th  class="table-row-heading">Total Amount</th>
                      
                    </tr>
                     <tr>
                        <th>{{$vendor_quotation_lists->s_no}}
                            <input type="hidden" class="form-control product_code" size="5" name="s_no" value="{{$vendor_quotation_lists->s_no}}" readonly="readonly">
                            <input type="hidden" class="form-control product_code" size="5" name="material_id" value="{{$vendor_value->material_id}}" readonly="readonly">
                        </th>
                        <th>{{$vendor_quotation_lists->product_name}}
                            <input type="hidden" class="form-control" size="5" name="product_name" required="required" value="{{$vendor_quotation_lists->product_name}}" readonly="readonly">
                        </th>
                        <th> {{$vendor_quotation_lists->purchase_quantity}}
                            <input type="hidden" class="form-control" size="5" name="order_quantity"  required="required" value="{{$vendor_quotation_lists->purchase_quantity}}" readonly="readonly" placeholder="qty">
                        </th>
                        <th> <input type="text" class="form-control quantity2" size="5" name="receive_quantity"  required="required"></th>
                        <th><input type="text" class="form-control rate" size="5" name="purchase_unit_rate"  required="required" readonly="readonly" value="{{$vendor_quotation_lists->purchase_unit_rate}}"></th>
                        <th>{{$vendor_quotation_lists->gst}}
                            <input type="hidden" class="form-control rate" size="5" name="gst"  required="required" readonly="readonly" value="{{$vendor_quotation_lists->gst}}">
                        </th>
                        <th> <input type="text" class="form-control" size="7" name="purchase_unit_amount" readonly="readonly" value="{{$vendor_quotation_lists->purchase_unit_amount}}"></th>
                      

                    </tr>
               
                   
                </table>
                 
                                    </div>
                                <table width="100%" cellspacing="4" cellpadding="4" border="0">

                                    <tr><td align="right" valign="top" colspan="6" height="10">
                                        </td></tr>
                                    <tr><td align="left" valign="top" colspan="6">
                                        
                                                    <button class="btn btn-primary submit" type="submit" name="action"><i class="fa fa-paper-plane"></i> Submit
                                                   
                                        </td></tr>
                                </table> 


                            </div>
                        </div>