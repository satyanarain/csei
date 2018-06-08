<p>ITEM DETAILS</p><p><table align="left" valign="top" border="0"  width="100%" >
                                          <tr style="border-bottom-width: 1px;padding:30px 5px 0px 0px; background-color: #c3e3b5; height:40px;">
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px; border-right:#fff 1px solid; ">S.No.</th>
                                                <th  align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px; border-right:#fff 1px solid;">Product Name</th>
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;border-right:#fff 1px solid;">Quantity</th>
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;border-right:#fff 1px solid;">Cost / PC</th>
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;border-right:#fff 1px solid;">GST(%)</th>
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;border-right:#fff 1px solid;">Total Amount</th>
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;border-right:#fff 1px solid;">Time Line</th>
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;border-right:#fff 1px solid;">Requester Remark</th>
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;border-right:#fff 1px solid;">Vendor Remark</th>
                                               <th align="left" valign="top" style=" text-align:left;background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;">Remarks</th>
                                            </tr>
   <?php 
                            $sql = DB::table('requests')->select('*')->where('request_no',$request_no)->first();
                             $request_id=$sql->id;
                             $vendor_quotation_list_all = DB::table('vendor_quotation_lists')->select('*')
                            ->leftjoin('requests', 'requests.id', 'vendor_quotation_lists.request_id')
                            ->leftjoin('vendors', 'vendors.id', 'vendor_quotation_lists.vendor_id')
                            ->where('vendor_quotation_lists.request_id', $request_id)
                            ->get();
 ?>
                          @foreach($vendor_quotation_list_all as $value)          
                                                       
                                           <tr style="border-bottom-width: 1px; padding-top: 3px;padding-bottom: 3px;  height:40px;border: 1px solid #dee2e6; background-color:#e9ecef;">
                                                <td style="padding:0px 0px 0px 10px;" align="left" valign="top">
                                                {{$value->s_no}}
                                                 </td>
                                                 <td style="padding:0px 0px 0px 10px;" align="left" valign="top">
                                                 {{$value->product_name}}
                                                </td>
                                                 <td width="10%" align="left" valign="top" style="padding:0px 0px 0px 10px;">{{$value->purchase_quantity}}</td>
                                                 <td width="10%" align="left" valign="top" style="padding:0px 0px 0px 10px;">{{$value->purchase_unit_rate}}</td>
                                                   <td width="10%" align="left" valign="top" style="padding:0px 0px 0px 10px;">{{$value->gst}}</td>
                                                 <td width="10%" align="left" valign="top" style="padding:0px 0px 0px 10px;">{{$value->purchase_unit_amount}}</td>
                                                 <td width="10%" align="left" valign="top" style="padding:0px 0px 0px 10px;">{{$value->timeline}}</td>
                                                 <td width="10%" align="left" valign="top" style="padding:0px 0px 0px 10px;">{{$value->remark}}</td>
                                                 <td width="10%" align="left" valign="top" style="padding:0px 0px 0px 10px;">{{$value->vendor_remark }}</td>
                                                <td style="padding:0px 0px 0px 10px;text-align:left; " align="left" valign="top">
                                                        {{$value->remark}}
                                                 </td>
                                                </tr>
                                               @endforeach 
                                               </table>
                                    </p>
                                    <br> 
                                    <br> 