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
                                <div class="col-lg-6" >{{$requests->amount}}</div>
                                <input type="hidden" value="{{$requests->amount}}" id='expected_amont'>
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
                                        <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                        <div class="col-lg-6">
                                            {{$requests->c_status}}
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Date of Release <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            {!! Form::text('date_of_release',null,['class'=>'form-control multiple_date_due',required])!!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Comment<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                           {!! Form::textarea('voucher_commens',null,['class'=>'form-control',required])!!}
                                        </div>
                                    </div>
                           
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Release Amount (Rs)<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                     {!! Form::text('release_voucher_amount',null,['class'=>'form-control',required,'onkeypress'=>'return isNumberKey(event)','id'=>'release_voucher_amount'])!!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Payment Type<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="radio" name="payment_type" value="1" required="required"> Cash&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="payment_type" value="2" required="required"> Bank
                                </div>
                            </div>
                          <div class="col-lg-6">
                                             <input  type="hidden"  name="id" value="{{$requests->id}}">
                                              <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                            <button class="btn btn-primary submit" type="submit" name="savevoucher"  value="savevoucher" ><i class="fa fa-check-circle"></i> Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       </div>
                           </div>
                </div>
               </div>
         {!!Form::close()!!}