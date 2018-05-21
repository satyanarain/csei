 <p>ITEM DETAILS</p>
                                    <p>
                                      <table align="left" valign="top" border="0" style="border:1px solid #dee2e6;">
                                          <tr style="border-bottom-width: 1px;padding:30px 5px 0px 0px; background-color: #c3e3b5; height:40px;">
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;">S.No.</th>
                                                <th  align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;">Product Name</th>
                                                <th align="left" valign="top" style="background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;">Quantity</th>
                                                <th align="left" valign="top" style=" text-align:left;background-color:#204d74;color:#fff; font-weight: bold;padding:10px 0px 0px 10px;">Remarks</th>
                                               
                                            </tr>
   <?php 
  $sql = DB::table('requests')->select('*')->where('request_no',$request_no)->first();
   $request_id=$sql->id;
    $material_details = DB::table('material_details')->select('*')->where('request_id',$request_id)->get();
 ?>
                          @foreach($material_details as $value)          
                                                       
                                           <tr style="border-bottom-width: 1px; padding-top: 3px;padding-bottom: 3px;  height:40px;border: 1px solid #dee2e6; background-color:#e9ecef;">
                                                <td style="padding:0px 0px 0px 10px;" align="left" valign="top">
                                                {{$value->s_no}}
                                                     
                                                </td>
                                                 <td style="padding:0px 0px 0px 10px;" align="left" valign="top">
                                                 {{$value->product_name}}
                                                </td>
                                                 <td width="10%" align="left" valign="top" style="padding:0px 0px 0px 10px;">{{$value->purchase_quantity}}</td>
                                                <td style="padding:0px 0px 0px 10px;text-align:left; " align="left" valign="top">
                                                        {{$value->remark}}
                                                 </td>
                                                </tr>
                                               @endforeach 
                                               </table>
                                    </p>
                                    <br> 
                                    <br> 