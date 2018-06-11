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
                                        <label class="col-lg-4 col-form-label" for="purpose">Comments</label>
                                        <div class="col-lg-6">
                                            <textarea  name="comments" id="comments"  class="form-control"></textarea>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                        <div class="col-lg-6">
                                            {{$requests->c_status}}
                                        </div>
                                    </div>
                            
                                        <div class="col-lg-6">
                                             <input  type="hidden"  name="id" value="{{$requests->id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                              <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                              <button class="btn btn-primary submit" type="submit" name="approve"  value="Approve" onclick="return loadAdd()" style="margin-left:10px;"><i class="fa fa-check-circle"></i> Approve</button>&nbsp;&nbsp;
                                            <button class="btn btn-danger submit" type="submit" name="approverejected" value="Rejected" onclick="return loadAdd()"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                                Reject</button>                                            
                                        </div>

                    </div>
                </div>

            </div>
                                    
 {!!Form::close()!!}
 

                               