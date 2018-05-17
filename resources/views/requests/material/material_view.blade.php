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
                <label class="col-lg-4 col-form-label" for="val-username">Description of Use</label>
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
                                                <th class="table-row-heading" width="10%">S.No.</th>
                                                <th class="table-row-heading" width="30%">Product Name</th>
                                                <th class="table-row-heading" width="10%">Quantity</th>
                                                <th class="table-row-heading" width="50%">Remarks</th>
                                               
                                            </tr>
                                   </table>
            
            <?php //print_r($material_details); ?>
            
            @foreach($material_details_view as $value)
             <table class="table table-bordered table-striped table-hover bank_table">
                <tr>
                    <td width="10%">
                        <div class="dummy">
                            <div class="input-icon right">
                                <span>
                                    <input type="text" class="form-control product_code" size="5" name="s_no[]" onkeypress="return isNumberKey(event)" required="required" value="{{$value->s_no}}" readonly="readonly">
                                  
                                </span>
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
           
        
      
    </div>

</div>