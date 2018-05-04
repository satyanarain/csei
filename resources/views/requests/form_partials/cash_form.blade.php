
  <?php   if($request->category_id==1)
  { ?>
     {!!Form::model($request, ['route'=>['requests.update', $request->id], 'method'=>'PATCH', 'id'=>'formValidate', 'class'=>'formValidate', 'files'=>true])!!}
										
  <?php } else{ ?>   
          {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                      'onsubmit'=>'return validateForm()',
                                    'files'=>true])!!}                            
  <?php } ?>                                
    <div 
       @if($request->category_id==2 || $request->category_id==3)
        class="tab-pane" style="display:none;"
        @else
         class="tab-pane active"
        @endif
        id="tab1" >
<input type="hidden" name="category_id" value="1">
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Date of Requisition <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        @if($request->category_id==1)
         {!!Form::text('due_date',$request->due_date,["class"=>"form-control",'required','readonly'])!!}
         @else
          {!!Form::text('due_date',date('d-m-Y'),["class"=>"form-control",'required','readonly'])!!}
       @endif
     </div>
</div>
 <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Amount (Rs) <span class="text-danger">*</span></label>
    <div class="col-lg-6">
         @if($request->category_id==1)
         {!!Form::text('amount',$request->amount,["class"=>"form-control",'required','onkeypress'=>"return isNumberKey(event)"])!!}
         @else
          {!!Form::text('amount',null,["class"=>"form-control",'required','onkeypress'=>"return isNumberKey(event)"])!!}
         @endif
    </div>
</div> 
  <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="purpose">Purpose <span class="text-danger">*</span></label>
    <div class="col-lg-6">
           @if($request->category_id==1)
         {!!Form::select('purpose', array('Personal'=>'Personal','Official'=>'Official'), isset($request->purpose)?$request->purpose:null, ["class"=>"form-control", 'required','placeholder'=>'Select Purpose'])!!}
         @else
          {!!Form::select('purpose', array('Personal'=>'Personal','Official'=>'Official'), isset($request->purpose1)?$request->purpose1:null, ["class"=>"form-control", 'required','placeholder'=>'Select Purpose'])!!}
          @endif
     </div>
</div>
 <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Description of Use<span class="text-danger">*</span></label>
    <div class="col-lg-6">
          @if($request->category_id==1)
         {!!Form::textarea('description_of_use',$request->description_of_use,["class"=>"form-control",'required','rows'=>'4'])!!}
          @else
          {!!Form::textarea('description_of_use',null,["class"=>"form-control",'required','rows'=>'4'])!!}
         @endif
      </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Required By<span class="text-danger">*</span></label>
    <div class="col-lg-6">
         @if($request->category_id==1)
         {!!Form::text('required_by_date',$request->required_by_date,["class"=>"form-control multiple_date_due",'required','readonly'=>'readonly'])!!}
          @else
          {!!Form::text('required_by_date',null,["class"=>"form-control multiple_date_due",'required'=>'required','readonly'=>'readonly'])!!}
          @endif
     </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Name of Project</label>
    <div class="col-lg-6">
 @if($request->category_id==1)
        <input  name="name_of_project" id="name_of_project"   class="form-control" >
@else
<input  name="name_of_project" id="name_of_project"   class="form-control" >
 @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
    <div class="col-lg-6">
 @if($request->category_id==1)
        <input  name="project_expense_head" id="project_expense_head"   class="form-control"  onkeypress='return isNumberKey(event)'>
        @else
        <input  name="project_expense_head" id="project_expense_head"   class="form-control"  onkeypress='return isNumberKey(event)'>
         @endif
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