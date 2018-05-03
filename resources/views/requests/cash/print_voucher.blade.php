 <div class="card"  >
   
        <div class="form-validation" id="printableArea">
            <table  style=" border-top:none "  align="center" >
                <tr>
                    
                    <td height="80" style="text-align:center;" align="center"> {{Html::image('/images/logonicons/csei-60x60.png',array('style'=>''))}}</td>
                    
                </tr>

            </table> 
            <table class="table" align="center">
                <tr>
                  <th style="margin-left: 110px; width: 94px;">
<!--                      <img src="{{ asset("/images/pmpml.png") }}" alt="User Image" >-->
                  </th>
                  <th><div style=" font-size: 30px; font-weight: bold; text-align: center; margin-top: 10px; ">Centre for Social Equity & Inclusion(CSEI)</div></th>
                  <th>
<!--                      <img src="{{ asset("/images/ranbow.png") }}" alt="User Image" >-->
                  </th></th>
                </tr>
                </table>
               </br>
            <table class="table"  style="width:100%;">
                <tr>
                    <td class="text-left">Date As : {{date("d-m-Y")}}</th>
                    <td></td>
                    <td class="text-right">Voucher No.: CSEI/V-1/{{date("Y-m-d")}}</th>
                </tr>
            </table> 
   </br>
  
   <table   style="width:100%;" class="table">
                <tr>
                    <td width="40%"  height="50">Requisition No.</th>
                    <td  width="60%" style="text-align:left; font-weight:normal;color:#555;">{{$requests->request_no}}  </td>
               </tr>
                <tr>
                    <td width="40%"  height="50">Category</th>
                    <td  width="60%" style="text-align:left; font-weight:normal;color:#555;">{{$requests->name}}  </td>
               </tr>
                <tr>
                    <td width="40%"  height="50">Date of Requisition</th>
                    <td  width="60%" style="text-align:left; font-weight:normal;color:#555;">{{dateView($requests->due_date)}}  </td>
               </tr>
              <tr>
                    <td width="40%"  height="50">Purpose</th>
                    <td  width="60%" style="text-align:left; font-weight:normal;color:#555;">   {{$requests->purpose}}</td>
               </tr>
                <tr>
                    <td width="40%"  height="50">Name Of Project</th>
                    <td  width="60%" style="text-align:left; font-weight:normal;color:#555;">    {{$requests->name_of_project}}</td>
               </tr>
                <tr>
                    <td width="40%"  height="50">Project Expense Head</th>
                    <td  width="60%" style="text-align:left; font-weight:normal;color:#555;">    {{$requests->project_expense_head}}</td>
               </tr>
                <tr>
                    <td width="40%"  height="50">Date of Release</th>
                    <td  width="60%" style="text-align:left; font-weight:normal;color:#555;">    {{dateView($requests->date_of_release)}} </td>
               </tr>
                <tr>
                    <td width="40%"  height="50">Amount (Rs)</th>
                    <td  width="60%" style="text-align:left; font-weight:normal;color:#555;"> {{displayView($requests->release_voucher_amount)}} </td>
               </tr>
               
    </table>
          <table   style="width:100%;">
                <tr>
                    <td width="33%"  height="50"></th>
                    <td  width="33%"></td>
                    <td   width="33%"></th>
                </tr>
               <tr>
                    <td  width="33%" style="border-bottom:#ccc 1px solid;"></th>
                    <td  width="33%"></td>
                    <td   width="33%" style="border-bottom:#ccc 1px solid;"></th>
                </tr>
                <tr>
                    <td  width="33%" style="text-align:center">Approved By</th>
                    <td  width="33%"></td>
                    <td   width="33%" style="text-align:center" align="left">Signed By</th>
                </tr>
                <tr>
                    <td  width="33%" style="text-align:center"></th>
                    <td  width="33%"></td>
                    <td   width="33%" style="text-align:center" align="left"></th>
                </tr>
            </table> 
   <br>
        </div>
</br>
     <div class="col-lg-6" id="print">
    <button class="btn btn-primary submit pull-left" type="submit"  onclick="printDiv('printableArea')">
        <i class="fa fa-check-circle"></i> Print</button>
</div>




</div>
 