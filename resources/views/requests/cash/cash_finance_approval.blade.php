  {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                    'id'=>'theForm',
                                    'id'=>'theForm',
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
                          <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Status</label>
                                        <div class="col-lg-6">
                                            {{$requests->c_status}}
                                        </div>
                                    </div> 
                     <div class="col-lg-6" style="padding:0px;">
                                             <input  type="hidden"  name="id" value="{{$requests->id}}">
                                              <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                            <button class="btn btn-primary submit" type="submit" name="finance"  value="finance" style="margin-right:40px;" onclick="return loadAddApprove()"><i class="fa fa-check-circle"></i> Approve</button>
                                             <button class="btn btn-danger submit" type="submit" name="approverejected" value="Rejected" onclick="return loadAdd()"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                                Constraints
                                             </button> 
                                            
                                       </div>
                           </div>
                </div>
               </div>
         {!!Form::close()!!}