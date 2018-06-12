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
                <label class="col-lg-4 col-form-label" for="val-username">TOR</label>
                <div class="col-lg-6">
                    {{$requests->description_of_use}}  
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Required By</label>
                <div class="col-lg-6">
                    {{$requests->required_by_date}}  
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
                <label class="col-lg-4 col-form-label" for="val-username">Total Expected Expense</label>
                <div class="col-lg-6">
                    {{$requests->amount}}  
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="val-username">Item Details</label>
                <div class="col-lg-6">
                   
                </div>
            </div>

             <table class="table table-bordered table-striped table-hover bank_table">
                                      
                                            <tr>
                                                <th class="table-row-heading">S.No.</th>
                                                <th class="table-row-heading">Product Name</th>
                                                <th class="table-row-heading">Quantity</th>
                                                <th class="table-row-heading">Remarks</th>
                                               
                                            </tr>
                             
            
            <?php //print_r($material_details); ?>
            
            @foreach($material_details_view as $value)
           
                <tr>
                    <td>
                        <div class="dummy">
                            <div class="input-icon right">
                                <span>
                                   {{$value->s_no}}
                                   </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="dummy">
                            <div class="input-icon right">
                                {{$value->product_name}}
                            </div>
                        </div>
                    </td>
                    <td><div class="dummy"><div class="input-icon right">{{$value->purchase_quantity}}</div></div></td>
                    <td align="left" valign="top" style="text-align:left;">{{$value->remark}}</td>
                  
                </tr>
          
            @endforeach
             </table>
        
      
    </div>

</div>