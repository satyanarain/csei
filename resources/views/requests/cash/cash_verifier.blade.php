 {!!Form::open(['route'=>'requests.store','id'=>'formValidate','class'=>'formValidate','autocomplete'=>'off','id'=>'theForm_verifier','files'=>true])!!}
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
                     @if($requests->category_id==1)
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Amount (Rs)</label>
                                <div class="col-lg-6">
                                    {{$requests->amount}}  
                                </div>
                            </div>
                     @endif
                     
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
                      @if($requests->category_id==1)
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Name Of Project<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" name="name_of_project" id="name_of_project"  class="form-control"  value="{{$requests->name_of_project}}" >
                                        </div>
                            </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                             <input type="text" name="project_expense_head" id='project_expense_head' class="form-control" value="{{$requests->project_expense_head}}" >
                                        </div>
                                    </div>
                           @endif
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
                            
                           <div class="col-lg-6" style="padding:0px 0px 0px 0px;">
                                            
                                             <input  type="hidden"  name="id" value="{{$requests->id}}">
                                             <input  type="hidden"  name="user_id" value="{{$requests->user_id}}">
                                            <input  type="hidden"  name="category_id" value="{{$requests->category_id}}">
                                            <button class="btn btn-primary submit" type="submit" name="verify"  value="Verify" onclick="return loadAdd()"><i class="fa fa-check-circle"></i> Verify</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger submit" type="submit" name="rejected" value="Rejected" onclick="return Validate()"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                            Reject</button>
                                             
                                        </div>

                    </div>
                </div>

            </div>
    {!!Form::close()!!}