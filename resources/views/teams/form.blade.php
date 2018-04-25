<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Name<span class="text-danger">*</span></label>
    <div class="col-lg-6">
       {!! Form::text('name',null,['class'=>'form-control'])!!}
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