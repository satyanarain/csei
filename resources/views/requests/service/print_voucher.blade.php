 <div class="card"  >
   
        <div class="form-validation" id="printableArea">
<!--            <table  style=" border-top:none "  align="center" >
                <tr><td height="80" style="text-align:center;" align="center"> {{Html::image('/images/logonicons/csei-60x60.png',array('style'=>''))}}</td></tr>
            </table>-->
            <table  align="left">
                <tr>
                  <th align='left' height='120'>
                   {{Html::image('/images/logonicons/csei-60x60.png',array('style'=>'','align'=>'left'))}}</br>
                  </th>
                  <th><div  class="table_con" style=" font-size: 30px; font-weight: bold; text-align: center; margin-top: 10px;margin-left:5px;font-family: 'Open Sans', sans-serif; "> Centre for Social Equity & Inclusion</div></th>
                  <th>
<!--                      <img src="{{ asset("/images/ranbow.png") }}" alt="User Image" >-->
                  </th></th>
                </tr>
                </table>
               </br>
               </br>
            <table class="table"  style="width:100%;">
                <tr>
                    <td class="table_con">Date As : {{date("d-m-Y")}}</th>
                    <td></td>
                    <td  class="table_con">Cash Voucher No.: CSEI/V-1/{{date("Y-m-d")}}</th>
                </tr>
            </table> 
   </br>
   </br>
  
   <table   style="width:100%;" class="table" >
                <tr>
                    <td width="40%"  class="table_con" style="text-align:left;" height="50"> Requisition No.</th>
                    <td  width="60%" class="table_con" style="text-align:left;">{{$requests->request_no}}  </td>
               </tr>
                <tr>
                    <td width="40%"  class="table_con" style="text-align:left;" height="50"> Category</th>
                    <td  width="60%" class="table_con" style="text-align:left;">{{$requests->name}}  </td>
               </tr>
                <tr>
                    <td width="40%"  class="table_con" style="text-align:left;" height="50"> Date of Requisition</th>
                    <td  width="60%" class="table_con" style="text-align:left;">{{dateView($requests->due_date)}}  </td>
               </tr>
              <tr>
                    <td width="40%"  class="table_con" style="text-align:left;" height="50"> Purpose</th>
                    <td  width="60%" class="table_con" style="text-align:left;">   {{$requests->purpose}}</td>
               </tr>
                <tr>
                    <td width="40%"  class="table_con" style="text-align:left;" height="50"> Name Of Project</th>
                    <td  width="60%" class="table_con" style="text-align:left;">    {{$requests->name_of_project}}</td>
               </tr>
                <tr>
                    <td width="40%"  class="table_con" style="text-align:left;" height="50"> Project Expense Head</th>
                    <td  width="60%" class="table_con" style="text-align:left;">    {{$requests->project_expense_head}}</td>
               </tr>
                <tr>
                    <td width="40%"  class="table_con" style="text-align:left;" height="50"> Date of Release</th>
                    <td  width="60%" class="table_con" style="text-align:left;">    {{dateView($requests->date_of_release)}} </td>
               </tr>
                <tr>
                    <td width="40%"  class="table_con" style="text-align:left;" height="50"> Amount (Rs)</th>
                    <td  width="60%" class="table_con" style="text-align:left;"> {{displayView($requests->release_voucher_amount)}} </td>
               </tr>
               
    </table>
          <table   style="width:100%;">
                <tr>
                    <td width="33%"  class="table_con" style="text-align:left;" height="50"> </th>
                    <td  width="33%"></td>
                    <td   width="33%"></th>
                </tr>
               <tr>
                    <td  width="33%" style="border-bottom:#ccc 1px solid;"></th>
                    <td  width="33%"></td>
                    <td   width="33%" style="border-bottom:#ccc 1px solid;"></th>
                </tr>
                <tr>
                    <td  width="33%" style="text-align:center" class="table_con">Approved By</th>
                    <td  width="33%"></td>
                    <td   width="33%" style="text-align:center" align="left" class="table_con">Signed By</th>
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
 