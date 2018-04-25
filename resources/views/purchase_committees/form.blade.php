<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Name<span class="text-danger">*</span></label>
    <div class="col-lg-6">
       {!! Form::text('name',null,['class'=>'form-control','required'=>'required'])!!}
    </div>
</div>  
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Member(s)<span class="text-danger">*</span></label>
    <div class="col-lg-6">
        <?php
        $userall = displayList('users', 'name', 'name', 'asc');
       ?>
       {!!Form::select('member_id[]', $userall, isset($purchase_committees->member_id)?$purchase_committees->member_id:null, ["class"=>"form-control", 'multiple'=>'multiple', 'id'=>'verifiers', 'required','style'=>'min-height:100px;'])!!}   
     </div>
</div>  
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Head<span class="text-danger">*</span></label>
   
    <div class="col-lg-6">
       {!! Form::select('head_id',$userall,isset($purchase_committees->head_id)?$purchase_committees->head_id:null,['class'=>'form-control','required'=>'required','placeholder'=>'Select Member Head'])!!}
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
<!-------------------END 3------------------------------------------>

@push('scripts')

@endpush