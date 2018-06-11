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
                                <label class="col-lg-4 col-form-label" for="val-username">Service Description</label>
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
                                        <label class="col-lg-4 col-form-label" for="due_date">Name Of Project</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="name_of_project" id="name_of_project"  class="form-control"  value="{{$requests->name_of_project}}" >
                                        </div>
                            </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
                                        <div class="col-lg-6">
                                             <input type="text" name="project_expense_head" id='project_expense_head' class="form-control" value="{{$requests->project_expense_head}}" >
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
                     <div class="form-group row">
                         <label class="col-lg-4 col-form-label" for="purpose">Comments</label>
                         <div class="col-lg-6">
                             <textarea  name="comments" id="comments"  class="form-control"></textarea>
                         </div>
                     </div>       
             @if(count($material_details)>0)
            <div   class="formmain1" onclick="showHide(this.id)" id="bank1">
                <div class="plusminusbutton" id="plusminusbuttonbank1"></div>&nbsp;&nbsp; <h2>Item Details</h2>
            </div>
<!--            <div class="row1"  id="formbank1">-->
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
                                    <span><input type="text" class="form-control product_code" size="5" name="s_no[]" onkeypress="return isNumberKey(event)" required="required" value="{{$value->s_no}}" readonly="readonly"></span>
                                </div>
                            </div>
                        </td>
                        <td width="30%">
                            <div class="dummy">
                                <div class="input-icon right">
                                    <input type="text" class="form-control" size="5" name="product_name[]" required="required" value="{{$value->product_name}}" readonly="readonly">
                                </div>
                            </div>
                        </td>
                        <td width="10%"><div class="dummy"><div class="input-icon right"><input type="text" class="form-control quantity2" size="5" name="purchase_quantity[]" onkeypress="return isIntegerKey(event)" required="required" value="{{$value->purchase_quantity}}" readonly="readonly"></div></div></td>
                         <td width="50%" align="left" valign="top" style="text-align:left;">{{$value->remark}}</td>

                    </tr>
                </table>
                @endforeach
                @endif
<!--            </div>-->
            @endif 
<br>    <div class="col-lg-6">
<input  type="hidden"  name="id" value="{{$requests->id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                              <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                              <button class="btn btn-primary submit pull-left" type="submit" name="approve"  value="Approve" onclick="return loadAddApprove()" style=" margin-right:40px;"><i class="fa fa-check-circle"></i> Approve</button>
                                            <button class="btn btn-danger submit pull-right" type="submit" name="approverejected" value="Rejected"  onclick="return loadAdd()"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                                Constraints</button>                                            
                                        </div>

                    </div>
                </div>

            </div>
                                    
 {!!Form::close()!!}
 

                               