 <div class="card">
                <div class="card-body">
                 <div class="form-validation">
                <div class="form-group row">
                      
                         <label class="col-lg-4 col-form-label" for="val-username"><b>Requisition No.</b></label>
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
                                <label class="col-lg-4 col-form-label" for="val-username">Amount (Rs)</label>
                                <div class="col-lg-6">
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
                                  {{$requests->name_of_project}}
                                        </div>
                            </div>
                            <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
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
                                        <label class="col-lg-4 col-form-label" for="val-username">Date of Release </label>
                                        <div class="col-lg-6">
                                          {{dateView($requests->date_of_release)}} 
                                         
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Comment</label>
                                        <div class="col-lg-6">
                                             {{dateView($requests->voucher_commens)}} 
                                       </div>
                                    </div>
                           
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Amount (Rs)</label>
                                <div class="col-lg-6">
                                    {{displayView($requests->release_voucher_amount)}} 
                                </div>
                            </div>
                              <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="due_date" >Status</label>
                                        <div class="col-lg-6">
                                            {{displayView($requests->c_status)}} 
                                        </div>
                                    </div>
                            
                                       
                           </div>
                </div>
               </div>
    