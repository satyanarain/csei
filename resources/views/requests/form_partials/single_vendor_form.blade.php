
<?php if ($request->category_id == 3) {
    ?>
    {!!Form::model($request, ['route'=>['requests.update', $request->id], 'method'=>'PATCH', 'id'=>'formValidate', 'class'=>'formValidate', 'files'=>true])!!}

<?php } else { ?>   
    {!!Form::open(['route'=>'requests.store',
    'id'=>'formValidate',
    'class'=>'formValidate',
    'autocomplete'=>'off',
    'onsubmit'=>'return validateForm()',
    'files'=>true])!!}                            
<?php } ?>                                
<div 
    @if($request->category_id==3)
    class="tab-pane active"
    @else
    class="tab-pane" style="display:none;"
    @endif
    id="tab3" >
   <input type="hidden" name="category_id" value="3">
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Date of Requisition <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        @if($request->category_id==3)
         {!!Form::text('due_date',$request->due_date,["class"=>"form-control",'required','readonly'])!!}
         @else
          {!!Form::text('due_date',date('d-m-Y'),["class"=>"form-control",'required','readonly'])!!}
       @endif
     </div>
</div>

  <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="purpose">Purpose <span class="text-danger">*</span></label>
    <div class="col-lg-6">
           @if($request->category_id==3)
         {!!Form::select('purpose', array('Personal'=>'Personal','Official'=>'Official'), isset($request->purpose)?$request->purpose:null, ["class"=>"form-control", 'required','placeholder'=>'Select Purpose'])!!}
         @else
          {!!Form::select('purpose', array('Personal'=>'Personal','Official'=>'Official'), isset($request->purpose1)?$request->purpose1:null, ["class"=>"form-control", 'required','placeholder'=>'Select Purpose'])!!}
          @endif
     </div>
</div>
 <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount" class="text-danger">TOR <span class="text-danger">*</span></label>
    <div class="col-lg-6">
          @if($request->category_id==3)
         {!!Form::textarea('description_of_use',$request->description_of_use,["class"=>"form-control",'required','rows'=>'4'])!!}
          @else
          {!!Form::textarea('description_of_use',null,["class"=>"form-control",'required','rows'=>'4'])!!}
         @endif
      </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Required By<span class="text-danger">*</span></label>
    <div class="col-lg-6">
         @if($request->category_id==3)
         {!!Form::text('required_by_date',$request->required_by_date,["class"=>"form-control multiple_date_due",'required','readonly'=>'readonly'])!!}
          @else
          {!!Form::text('required_by_date',null,["class"=>"form-control multiple_date_due",'required'=>'required','readonly'=>'readonly'])!!}
          @endif
     </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Name of Project</label>
    <div class="col-lg-6">
 @if($request->category_id==3)
        <input  name="name_of_project" id="name_of_project"   class="form-control"  value="{{$request->name_of_project}}">
@else
<input  name="name_of_project" id="name_of_project"   class="form-control" >
 @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
    <div class="col-lg-6">
 @if($request->category_id==3)
        <input  name="project_expense_head" id="project_expense_head"   class="form-control"  value="{{$request->project_expense_head}}">
        @else
        <input  name="project_expense_head" id="project_expense_head"   class="form-control">
         @endif
  </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Total Expected Expense <span class="text-danger">*</span></label>
    <div class="col-lg-6">
 @if($request->category_id==3)
        <input  name="amount" id="amount"   class="form-control"  onkeypress='return isNumberKey(event)' value="{{$request->amount}}">
        @else
        <input  name="amount" id="amount"   class="form-control"  onkeypress='return isNumberKey(event)' required="required">
         @endif
  </div>
</div>
    
<div class="form-group row" >
                            <div class="col-lg-12">
                            

<!--                                <div class="form-group ">
                                    <div class="col-md-9" style="padding:0px 0px 0px 0px; margin-bottom:10px;">
                                        </br>
                                        <div class="btn btn-success add-more" type="button" id="add_mat_button" style="margin-bottom:10px;"><i class="fa fa-plus" ></i> Add</div>

                                    </div>
                                 </div>                             -->
                                <div class="table-scrollable form-body">
                                    <table class="table table-bordered table-striped table-hover bank_table">
                                      
                                            <tr>
                                                <th class="table-row-heading" width="10%">S.No.</th>
                                                <th class="table-row-heading" width="30%">Product Name</th>
                                                <th class="table-row-heading" width="20%">Quantity</th>
                                                <th class="table-row-heading" width="28%">Remarks</th>
                                                <th class="table-row-heading" width="12%">Action</th>
                                            </tr>
                                   </table>
                                    <div id="add_mat">
                                        @if(count($material_details)>0)
                                     @foreach($material_details as $value)
                                            <table class="table table-bordered table-striped table-hover bank_table">
                                           <tr>
                                                <td width="10%">
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <span><input type="text" class="form-control product_code" size="5" name="s_no[]" onkeypress="return isNumberKey(event)" required="required" value="{{$value->s_no}}"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="30%">
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <input type="text" class="form-control" size="5" name="product_name[]" required="required" value="{{$value->product_name}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td width="20%"><div class="dummy"><div class="input-icon right"><input type="text" class="form-control quantity2" size="5" name="purchase_quantity[]" onkeypress="return isIntegerKey(event)" required="required" value="{{$value->purchase_quantity}}"></div></div></td>
                                                <td width="28%">
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <textarea type="textarea" class="form-control rate" size="5" name="remark[]"  required="required">{{$value->remark}}</textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td width="12%">
                                                    <span  class="rm_first"><button class="remove_bank_row">Remove</button></span>
                                                </td>
                                            </tr>
                                       </table>
                                       @endforeach
                                        @else
                                         <table class="table table-bordered table-striped table-hover bank_table">
                                           <tr>
                                                <td width="10%">
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <span><input type="text" class="form-control product_code" size="5" name="s_no[]" onkeypress="return isNumberKey(event)" required="required" value="{{$value->s_no}}"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="30%">
                                                    <div class="dummy">
                                                        <div class="input-icon right">
                                                            <input type="text" class="form-control" size="5" name="product_name[]" required="required" value="{{$value->product_name}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td width="20%"><div class="dummy"><div class="input-icon right"><input type="text" class="form-control quantity2" size="5" name="purchase_quantity[]" onkeypress="return isIntegerKey(event)" required="required" value="{{$value->purchase_quantity}}"></div></div></td>
                                                <td width="28%">
                                                    <div class="dummy">
                                                        <div class="input-icon right">{{$value->remark}}
                                                            <textarea  class="form-control rate" size="5" name="remark[]"  required="required">{{$value->remark}}</textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td width="12%">
                                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </td>
                                            </tr>
                                       </table>
                                        @endif
                                    </div>
                                    </div>
                                 


                            </div>
                        </div>    
    <div class="form-group row">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-6">
        <button class="btn btn-primary submit" type="submit" name="action"><i class="fa fa-paper-plane"></i> Submit
        </button>
    </div>
</div>
</div>
    {!!Form::close()!!}