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
                                <label class="col-lg-4 col-form-label" for="val-username">Date of Release <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    {!! Form::text('date_of_release',null,['class'=>'form-control multiple_date',required])!!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Comment<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                   {!! Form::textarea('voucher_commens',null,['class'=>'form-control',required])!!}
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Amount (Rs)<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                     {!! Form::text('release_voucher_amount',null,['class'=>'form-control',required,'onkeypress'=>'return isNumberKey(event)'])!!}
                                    
                                </div>
                            </div>
                              <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                        <div class="col-lg-6">
                                            <input type="checkbox" name="status" required>
                                        </div>
                                    </div>
                            
                                        <div class="col-lg-6">
                                             <input  type="hidden"  name="id" value="{{$requests->id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                            <button class="btn btn-primary submit" type="submit" name="savevoucher"  value="savevoucher" onclick="return loadAdd()"><i class="fa fa-check-circle"></i> Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                       
                                        </div>

                    </div>
                </div>

            </div>
         {!!Form::close()!!}