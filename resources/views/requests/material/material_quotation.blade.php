 {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                    'id'=>'theForm',
                                    'files'=>true])!!}
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-validation">
                                                <h4 class="header2">Requisition Details</h4>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Request No.</label>
                                                    <div class="col-lg-6">
                                                        {{$requests->request_no}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Category</label>
                                                    <div class="col-lg-6">
                                                        {{$requests->name}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Date of Requisition</label>
                                                    <div class="col-lg-6">
                                                        {{dateView($requests->due_date)}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Purpose</label>
                                                    <div class="col-lg-6">
                                                        {{$requests->purpose}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Description of Use</label>
                                                    <div class="col-lg-6">
                                                        {{$requests->description_of_use}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Required By</label>
                                                    <div class="col-lg-6">
                                                        {{dateView($requests->required_by_date)}}  
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="due_date">Name Of Project<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        {{$requests->name_of_project}}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        {{$requests->project_expense_head}}
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Total Expected Expense</label>
                                                    <div class="col-lg-6">
                                                        {{$requests->amount}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                                    <div class="col-lg-6">
                                                        {{$requests->c_status}}
                                                    </div>
                                                </div>  
                                                     
                                                @if(count($material_details)>0)
                                               <div    onclick="showHide(this.id)" id="bank1" style="margin-top:-20px;">
                                                   &nbsp;&nbsp; <h2>Item Details<h2>
                                                </div>
                                                    @if(count($material_details)>0)
                                                    <table class="table table-bordered formmain">
                                                        <tr>
                                                            <th class="table-row-heading" width="10%">S.No.</th>
                                                            <th class="table-row-heading" width="30%">Product Name</th>
                                                            <th class="table-row-heading" width="10%">Quantity</th>
                                                            <th class="table-row-heading" width="50%">Remarks</th>
                                                        </tr>
                                                    </table>
                                                    @foreach($material_details as $value)
                                                 
                                                   <table class="table table-bordered table-striped table-hover bank_table">
                                           <tr>
                                                <td width="10%">
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <span><input type="text" class="form-control product_code" size="5" name="s_no[]" onkeypress="return isNumberKey(event)" required="required" value="{{$value->s_no}}"></span>
                                                              <input type="hidden" class="form-control product_code" size="5" name="material_id[]" onkeypress="return isNumberKey(event)" value="{{$value->id}}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="30%">
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <input type="text" class="form-control" size="5" name="product_name[]" required="required" value="{{$value->product_name}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td width="10%"><div class="dummy"><div class="input-icon right"><input type="text" class="form-control quantity2" size="5" name="purchase_quantity[]" onkeypress="return isIntegerKey(event)" required="required" value="{{$value->purchase_quantity}}"></div></div></td>
                                                <td width="38%">
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <textarea type="textarea" class="form-control" id="exampleTextarea" rows="6" size="5" name="remark[]"  required="required">{{$value->remark}}</textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td width="12%">
                                                    <span  class="rm_first"><button class="remove_bank_row">Remove</button></span>
                                                </td>
                                              </tr>
                                               </table>
                                              @endforeach
                                                    @endif
                                                     <div id="add_mat">
                                                    </div> 
                                             
                                                @endif 
                                                <br>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Vendor List</label>
                                                    <div class="col-lg-6">
                                                        <select id="vendor" name='vendor[]' class="form-control" multiple="multiple" required="required" style="height:100px;">
                                                       @foreach($vendors as $vendors)
                                                            <option value="{{$vendors->id}}">{{$vendors->name}}</option>
                                                          @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">No. of Days for Response</label>
                                                    <div class="col-lg-6">
                                                        
                                                        <select id="" class="form-control" required="required" name="no_of_days" id='no_of_days'>
                                                            <option value="">Select Days</option>
                                                            <?php for($i=1; $i<=15; $i++)
                                                            { ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                          </select>
                                                    </div>
                                                </div>
                                                </br>
                                                 <div   class="formmain" onclick="showHide(this.id)" id="bank2" style="margin-top:-20px;">
                                                    <div class="plusminusbutton" id="plusminusbuttonbank2">+</div>&nbsp;&nbsp;Log
                                                </div>
                                                <div class="row1"  id="formbank2" style="display:none">
                                                      @if(count($material_detail_logs)>0)
                                                    
                                                   <table class="table table-bordered table-striped table-hover bank_table">
                                                        <tr>
                                                            <th class="table-row-heading">S.No.</th>
                                                            <th class="table-row-heading">RFQ NO.</th>
                                                            <th class="table-row-heading">Product Name</th>
                                                            <th class="table-row-heading">Quantity</th>
                                                            <th class="table-row-heading">Remarks</th>
                                                        </tr>
                                                           @foreach($material_detail_logs as $value)
                                                         <tr>
                                                            <th>{{$value->s_no}}</th>
                                                            <th>{{$value->rfq_no}}</th>
                                                            <th>{{$value->product_name}}</th>
                                                            <th>{{$value->purchase_quantity}}</th>
                                                            <th>{{$value->remark}}</th>
                                                        </tr>
                                                    @endforeach
                                               </table>
                                            
                                                    @endif
                                                </div>
                                                
                                                
                                                
                                                
                                                
                                                 <br>    <div class="col-lg-6">
                                                    <input  type="hidden"  name="id" value="{{$requests->id}}">
                                                    <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                                    <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                                     @if(count($material_details)>0)
                                                    <button class="btn btn-primary submit pull-left" type="submit" name="quotation"  value="quotation" onclick="return loadAddQuotation()"><i class="fa fa-paper-plane"></i>Submit
        </button>                            &nbsp;&nbsp; 
         @endif
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                          
 {!!Form::close()!!}
 

                               