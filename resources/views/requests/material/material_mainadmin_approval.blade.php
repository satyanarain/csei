  {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                    'id'=>'theForm',
                                    'id'=>'theForm',
                                    'onsubmit'=>'return checkValue()',
                                    'files'=>true])!!}
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-validation">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Requisition No.</label>
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
                                                    <label class="col-lg-4 col-form-label" for="val-username">Requested Amount (Rs)</label>
                                                    <div class="col-lg-6" id='expected_amont'>
                                                        {{$requests->amount}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Purpose</label>
                                                    <div class="col-lg-6">
                                                        {{$requests->purpose}}  
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">TOR</label>
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
                                                        {{displayView($requests->name_of_project)}}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
                                                    <div class="col-lg-6">
                                                        {{displayView($requests->project_expense_head)}}
                                                    </div>
                                                </div>
                                                   @if(count($material_details)>0)
            <div   class="formmain1" onclick="showHide(this.id)" id="bank1">
                <div class="plusminusbutton" id="plusminusbuttonbank1"></div>&nbsp;&nbsp; <h2>Item Details</h2>
            </div>
<!--            <div class="row1"  id="formbank1">-->
                @if(count($material_details)>0)
                   <table class="table table-bordered table-striped table-hover bank_table">
                        <tr>
                        <th>S.No.</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Remarks</th>
                   </tr>
               
                @foreach($material_details as $value)
             
                    <tr>
                        <td>{{$value->s_no}}</td>
                        <td>{{$value->product_name}}></td>
                        <td>{{$value->purchase_quantity}}</td>
                         <td align="left" valign="top" style="text-align:left;">{{$value->remark}}</td>

                    </tr>
                </table>
                @endforeach
                @endif
<!--            </div>-->
            @endif 
<br>                   
  <div class="col-lg-6" style="padding:0px;">
                                                    <input  type="hidden"  name="id" value="{{$requests->id}}">
                                                    <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                                    <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                                    <button class="btn btn-primary submit" type="submit" name="admin"  value="admin" onclick="return loadAddApprove()"><i class="fa fa-check-circle"></i> Approve</button>
                                            </div>
                                        </div>
                                    </div>
         {!!Form::close()!!}