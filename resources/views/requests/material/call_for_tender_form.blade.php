 {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                    'id'=>'theForm',
                                    'files'=>true])!!}
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-validation">
                                                <div class="form-group row">
                                                    Request No.
                                                    <div class="col-lg-6">
                                                        {{$requests->request_no}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    Category
                                                    <div class="col-lg-6">
                                                        {{$requests->name}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    Date of Requisition
                                                    <div class="col-lg-6">
                                                        {{dateView($requests->due_date)}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    Purpose
                                                    <div class="col-lg-6">
                                                        {{$requests->purpose}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    TOR
                                                    <div class="col-lg-6">
                                                        {{$requests->description_of_use}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    Required By
                                                    <div class="col-lg-6">
                                                        {{dateView($requests->required_by_date)}}  
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    Name Of Project
                                                    <div class="col-lg-6">
                                                        {{displayView($requests->name_of_project)}}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    Project Expense Head
                                                    <div class="col-lg-6">
                                                        {{displayView($requests->project_expense_head) }}
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    Total Expected Expense
                                                    <div class="col-lg-6">
                                                        {{$requests->amount}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                  Status
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
                                                            <th class="table-row-heading">S.No.</th>
                                                            <th class="table-row-heading">Product Name</th>
                                                            <th class="table-row-heading">Quantity</th>
                                                            <th class="table-row-heading">Remarks</th>
                                                        </tr>
                                                    </table>
                                                    @foreach($material_details as $value)
                                                 
                                                   <table class="table table-bordered table-striped table-hover bank_table">
                                           <tr>
                                                <td>
                                                    {{$value->s_no}}"></span>
                                                              <input type="hidden" class="form-control product_code" size="5" name="material_id[]" onkeypress="return isNumberKey(event)" value="{{$value->id}}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <input type="text" class="form-control" size="5" name="product_name[]" required="required" value="{{$value->product_name}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td><div class="dummy"><div class="input-icon right"><input type="text" class="form-control quantity2" size="5" name="purchase_quantity[]" onkeypress="return isIntegerKey(event)" required="required" value="{{$value->purchase_quantity}}"></div></div></td>
                                                <td>
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <textarea type="textarea" class="form-control" id="exampleTextarea" rows="6" size="5" name="remark[]"  required="required">{{$value->remark}}</textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td>
                                                    <span  class="rm_first"><button class="remove_bank_row">Remove</button></span>
                                                </td>
                                              </tr>
                                               </table>
                                              @endforeach
                                                    @endif
                                                     
                                                @endif 
                                                <br>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Identify Vendor List<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <select id="vendor" name='vendor[]' class="form-control" multiple="multiple" required="required" style="height:100px;">
                                                       @foreach($vendors as $vendors)
                                                            <option value="{{$vendors->id}}">{{$vendors->name}}</option>
                                                          @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Vendor Response Date<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        {!! Form::text('vendor_response_date',null,['class'=>'form-control multiple_date_due','required'=>'required'])   !!}
                                                               
                                                    </div>
                                                </div>
                                                </br>
                                                 @if(count($material_detail_logs)>0)
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
                                                @endif
                                                <br>    <div class="col-lg-6" style="padding:0px;">
                                                    <input  type="hidden"  name="id" value="{{$requests->id}}">
                                                    <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                                    <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                                     @if(count($material_details)>0)
                                                    <button class="btn btn-primary submit" type="submit" name="quotation"  value="quotation" onclick="return loadAddQuotation()"><i class="fa fa-paper-plane"></i> Submit
                                                    </button>                            &nbsp;&nbsp; 
         @endif
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                          
 {!!Form::close()!!}
 

                               