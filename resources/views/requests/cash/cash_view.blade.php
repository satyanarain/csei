<div class="card">
                <div class="card-body">
                 <div class="form-validation">
                     <h4 class="header2">RequestsD etails</h4>
                    

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
                                <label class="col-lg-4 col-form-label" for="val-username">Amount Requested</label>
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
                                <label class="col-lg-4 col-form-label" for="val-username">Description of Use</label>
                                <div class="col-lg-6">
                                    {{$requests->description_of_use}}  
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

                    </div>
                </div>

            </div>