@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Requests</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('requests.index')}}">Requests</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    @endsection

    @section('content')
    <!-- Container fluid  -->
    <div class="row justify-content-center" id='printableArea'>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                 <div class="form-validation">
<!--                     <table class="table">
                         <tr><td>Name</td><td>Test</td></tr>
                         
                     </table>-->
                        <form class="form-valide" action="#" method="post">

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
                                                             <input type="" class="form-control" style="height:32px;">
                                                         </td>
                                                     </tr> 
                                                     <tr>
                                                         <td width="20%" align="left" vlign="top" style="text-align:left;" >Date</td><td><input type="" class="form-control multiple_date" style="height:32px;"></td>
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
                                                         <td width="20%" align="left" style="text-align:left;" >Name</td>
                                                         <td style="padding-top: 10px;">
                                                             <input type="" class="form-control" style="height:32px;">
                                                         </td>
                                                     </tr> 
                                                   <tr>
                                                         <td width="20%" align="left" vlign="top" style="text-align:left;" >Address</td><td><input type="" class="form-control" style="height:32px;"></td>
                                                     </tr>
                                                     <tr>
                                                         <td width="20%" align="left" vlign="top" style="text-align:left;" >Phone</td><td><input type="" class="form-control" style="height:32px;"></td>
                                                     </tr>
                                                     <tr>
                                                         <td width="20%" align="left" vlign="top" style="text-align:left;" >Mobile</td><td><input type="" class="form-control" style="height:32px;"></td>
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
                                                             <input type="" class="form-control" style="height:32px;">
                                                         </td>
                                                     </tr> 
                                                     <tr>
                                                         <td width="20%" align="left" vlign="top" style="text-align:left;" >Address</td><td><input type="" class="form-control" style="height:32px;"></td>
                                                     </tr>
                                                     <tr>
                                                         <td width="20%" align="left" vlign="top" style="text-align:left;" >Phone</td><td><input type="" class="form-control" style="height:32px;"></td>
                                                     </tr>
                                                     <tr>
                                                         <td width="20%" align="left" vlign="top" style="text-align:left;" >Mobile</td><td><input type="" class="form-control" style="height:32px;"></td>
                                                     </tr>
                                                    
                                                 </table>

                                             </td>   

                                         </tr>

                                     </table>
                               
                                 <table width="100%" align="left"  valign="top"  style="text-align:left; margin-bottom:0px; " border="0">
                                     <tr class="table-row" >
                                         <td  colspan="6" align="left"  style="text-align:left;">   
                                             
                                                 <div class="form-group ">
                                                     <div class="col-md-9" style="padding:0px 0px 0px 0px; margin-bottom:10px;">
                                                         </br>
                                                         <div class="btn btn-success add-more pull-left" type="button" id="add_field_button_classes" style="margin-bottom:10px;"><i class="fa fa-plus" ></i> Add</div>
                                                         
                                                     </div>

                                                 </div> 
                                            
                                         </td>
                                     </tr> 
                                     
                                     <tr class="table-row" >
                                                         <td  width="10%" colspan="" align="left" class="table-row-heading" style="text-align:left;">   
                                                             Code
                                                         </td>
                                                         <td  width="30%" align="left" class="table-row-heading" style="text-align:left;">   
                                                            Product name
                                                         </td>
                                                         <td  width="10%" align="left" class="table-row-heading" style="text-align:left;">   
                                                           Quantity  
                                                         </td>
                                                         <td  width="20%" align="left" class="table-row-heading" style="text-align:left;">   
                                                             Unit Price
                                                         </td>
                                                         <td  width="15%" align="left" class="table-row-heading" style="text-align:left;">   
                                                             Total
                                                         </td>
                                                         <td  width="15%" align="left" class="table-row-heading" style="text-align:left;">   
                                                             Action
                                                         </td>
                                     </tr>
                                   
                                       </table>
                                      <table width="100%" align="left"  valign="top" border="0" id="myTable">
                                          <tr>
                                              <td>
                                                  <div class="copy show" id="input_fields_wrap_classes">
                                                      <table width="100%" align="left"  valign="top"  style="text-align:left; margin-top:0px; " border="0">
                                                           <tr class="table-row-nopadding">
                                                              <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   
                                                                  <input type="" name="product_code[]" id="product_code" class="form-control" style="height:32px; padding:0px; margin:0px;">
                                                              </td>
                                                              <td  colspan=""   align="left" valign="top" style="text-align:left;"  width="30%">   
                                                                  <input type="" name="product_name[]" id="product_name" class="form-control" style="height:32px;" >
                                                              </td>
                                                              <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   
                                                                  <input  name="quantity[]" id="quantity" type="" class="form-control" style="height:32px;" onkeypress=" return isIntegerKey(event)">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="20%">   
                                                                  <input type=""  name="unit_price[]" id="unit_price" class="form-control" style="height:32px;"   onkeypress="return isNumberKey(event)">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%">   
                                                                  <input type=""  name="total" id="total" class="form-control1" style="height:32px;">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%">   
                                                                  <input type="" class="form-control" style="height:32px;">
                                                              </td>
                                                          </tr>   
                                                           <tr class="table-row-nopadding">
                                                              <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   
                                                                  <input type="" name="product_code[]" id="product_code" class="form-control" style="height:32px; padding:0px; margin:0px;">
                                                              </td>
                                                              <td  colspan=""   align="left" valign="top" style="text-align:left;"  width="30%">   
                                                                  <input type="" name="product_name[]" id="product_name" class="form-control" style="height:32px;" >
                                                              </td>
                                                              <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   
                                                                  <input  name="quantity[]" id="quantity" type="" class="form-control" style="height:32px;" onkeypress=" return isIntegerKey(event)">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="20%">   
                                                                  <input type=""  name="unit_price[]" id="unit_price" class="form-control" style="height:32px;"   onkeypress="return isNumberKey(event)">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%">   
                                                                  <input type=""  name="total" id="total" class="form-control1" style="height:32px;">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%">   
                                                                  <input type="" class="form-control" style="height:32px;">
                                                              </td>
                                                          </tr>   
                                                           <tr class="table-row-nopadding">
                                                              <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   
                                                                  <input type="" name="product_code[]" id="product_code" class="form-control" style="height:32px; padding:0px; margin:0px;">
                                                              </td>
                                                              <td  colspan=""   align="left" valign="top" style="text-align:left;"  width="30%">   
                                                                  <input type="" name="product_name[]" id="product_name" class="form-control" style="height:32px;" >
                                                              </td>
                                                              <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   
                                                                  <input  name="quantity[]" id="quantity" type="" class="form-control" style="height:32px;" onkeypress=" return isIntegerKey(event)">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="20%">   
                                                                  <input type=""  name="unit_price[]" id="unit_price" class="form-control" style="height:32px;"   onkeypress="return isNumberKey(event)">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%">   
                                                                  <input type=""  name="total" id="total" class="form-control1" style="height:32px;">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%">   
                                                                  <input type="" class="form-control" style="height:32px;">
                                                              </td>
                                                          </tr>   
                                                      </table>          
                                                  </div>
                                              </td>
                                          </tr>
                                         
                                       </table>
                                      <tr>
                                               <table width="100%" align="left"  valign="top" border="0">
                                                              <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   
                                                                 
                                                              </td>
                                                              <td  colspan="" align="left" valign="top" style="text-align:left;"  width="30%">   
                                                                
                                                              </td>
                                                              <td  colspan="" align="left" valign="top" style="text-align:left;"  width="10%">   
                                                                  
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="20%">   
                                                                   Total
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%">   
                                                               <input type="" class="form-control" style="height:32px;" id="totalsum">
                                                              </td>
                                                              <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%">   
                                                                 
                                                              </td>
                                                  
                                           </tr>
                                         </table>
                                      
                                     <table width="100%" cellspacing="4" cellpadding="4" >

                                        <tr height="30px;"  align="left"  valign="top">
                                             <td width="45%"  style="bgcolor:#ccc;"  align="left"  valign="top">
                                                 <table width="100%" align="left"  valign="top" border="0" style="text-align:left;">
                                                     <tr class="table-row" >
                                                         <td  colspan="2" align="left" class="table-row-heading" style="text-align:left;">   
                                                             REQUISITIONER 
                                                         </td>
                                                     </tr>
                                                    
                                                   <tr style="text-align:left;height:50px; ">
                                                         <td width="20%" align="left" vlign="top" style="text-align:left;" >Name</td><td><input type="" class="form-control" style="height:32px;"></td>
                                                     </tr>
                                                    
                                                    
                                                 </table>
                                             </td> 
                                             <td width="10%">&nbsp;<td>
                                                 <!--------------------------------ship to--------------------------->
                                             <td width="45%" align="left" valign="top"> 
                                               

                                             </td>   

                                         </tr>

                                     </table> 
                                      
                                  
                             </div>
                            </div>
                           
                            
                        </form>
                     
                     <div class="col-sm-2">
  <button id="add_bank_info" class="addCF"><i class="fa fa-plus"></i>&nbsp;Add New</button>
</div>
<div class="table-scrollable form-body">
  <table class="table table-bordered table-striped table-hover bank_table">
    <thead>
      <tr>
        <th>Names</th>
        <th>Names</th>
        <th>Quantity</th>
        <th>Unit Rate</th>
        <th>Total Amount</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="dummy">
            <div class="input-icon right">
              <select name="pr_article_no[]" id="sp_name" class="form-control">
                <option value="">--Select Options--</option>
                <option value="0"></option>
                <option value="1">Item A</option>
                <option value="2">Item B</option>
                <option value="3">Item C</option>
              </select>
            </div>
          </div>
        </td>
        <td>
          <div class="dummy">
            <div class="input-icon right">
              <select name="pr_article_no1[]" id="sp_name" class="form-control">
                <option value="">--Select Options--</option>
                <option value="0"></option>
                <option value="1">Item A</option>
                <option value="2">Item B</option>
                <option value="3">Item C</option>
              </select>
            </div>
          </div>
        </td>
        <td>
          <div class="dummy">
            <div class="input-icon right">
              <input type="text" class="form-control quantity2" size="5" name="purchase_quantity[]">
            </div>
          </div>
        </td>
        <td>
          <div class="dummy">
            <div class="input-icon right">
              <input type="text" class="form-control rate" size="5" name="purchase_unit_rate[]">
            </div>
          </div>
        </td>
        <td>
          <div class="dummy">
            <div class="input-icon right">
              <input type="text" class="form-control tamnt" size="7" name="purchase_unit_amount[]">
            </div>
          </div>
        </td>
        <td>
          <button class="remove_bank_row">Remove</button>
        </td>
      </tr>
    </tbody>
  </table>
  <hr>
  <div style="font-weight: bold">Grand total: <span id="grandTotal"></span></div>
</div>
                     
                     
                     
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection

    @push('scripts')
  
    @endpush