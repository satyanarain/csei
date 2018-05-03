<ul  class="nav-nav-pills">
    <li class="active" onclick="openTab1(1)" id="1">
        <a  href="#1a" data-toggle="tab" style="padding:10px;" >Cash</a>
    </li>
    <li class="tabber" id="2" onclick="openTab2(2)"><a href="#2a" data-toggle="tab">Material</a>
    </li>
    <li class="tabber" id="3" onclick="openTab3(3)"><a href="#3a" data-toggle="tab">Service</a>
    </li>
</ul>
<div class="tab-content clearfix" style="border:#ccc 1px solid; border-top:none; padding:10px;">

  <?php   if($request-category_id==1)
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
    <div class="tab-pane active" id="tab1">
        <input type="hidden" name="category_id" value="1">
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Date of Requisition <span class="text-danger">*</span></label>
    <div class="col-lg-6">
         {!!Form::text('due_date',date('d-m-Y'),["class"=>"form-control",'required','readonly'])!!}
     </div>
</div>
 <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Amount (Rs) <span class="text-danger">*</span></label>
    <div class="col-lg-6">
         {!!Form::text('amount',null,["class"=>"form-control",'required','onkeypress'=>"return isNumberKey(event)"])!!}
       
    </div>
</div> 
  <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="purpose">Purpose <span class="text-danger">*</span></label>
    <div class="col-lg-6">
          {!!Form::select('purpose', array('Personal'=>'Personal','Official'=>'Official'), isset($request->purpose)?$user->purpose:null, ["class"=>"form-control", 'required','placeholder'=>'Select Purpose'])!!}
    </div>
</div>
 <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Description of Use<span class="text-danger">*</span></label>
    <div class="col-lg-6">
         {!!Form::textarea('description_of_use',null,["class"=>"form-control",'required','rows'=>'4'])!!}
      </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Required By<span class="text-danger">*</span></label>
    <div class="col-lg-6">
         {!!Form::text('required_by_date',null,["class"=>"form-control multiple_date_due",'required','readonly'=>'readonly'])!!}
     </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Name of Project</label>
    <div class="col-lg-6">

        <input  name="name_of_project" id="name_of_project"   class="form-control" >

    </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
    <div class="col-lg-6">

        <input  name="project_expense_head" id="project_expense_head"   class="form-control"  onkeypress='return isNumberKey(event)'>
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
    <!---------------------------tab 2--------------------------------------------------------->
    <div  id="tab2" style="display:none">
        <h3>Material</h3>
        <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="roles">Category <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        {!!Form::select('category_id[]', array('2'=>'Material'), isset($request->category_id)?$user->category_id:null, ["class"=>"form-control", "id"=>"multiple-checkboxes111",'onclick'=>'selectCate(this.value)'])!!}
 </div>        
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="purpose">Purpose <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        {!!Form::select('purpose', array('Personal'=>'Personal','Official'=>'Official'), isset($request->purpose)?$user->purpose:null, ["class"=>"form-control", 'required','placeholder'=>'Select purpose'])!!}
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Date <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        @if($request->due_date!='')
        <input  name="due_date" id="due_date"  min="{{date('Y-m-d')}}" onchange="getCat(this.value)"  class="form-control multiple_date_due" required value="{{date('d-m-Y')}}" >
        @else
        <input  name="due_date" id="due_date"  min="{{date('Y-m-d')}}" onchange="getCat(this.value)"  class="form-control multiple_date_due" required value="{{date('d-m-Y')}}">
        @endif
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Name of Project</label>
    <div class="col-lg-6">

        <input  name="name_of_project" id="name_of_project"   class="form-control" >

    </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
    <div class="col-lg-6">

        <input  name="project_expense_head" id="project_expense_head"   class="form-control"  onkeypress='return isNumberKey(event)'>

    </div>
</div>



<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date"><b><i class="fa fa-clock-o" style="font-size:18px"></i> Time frame to raise request</b></label>
    <div class="col-lg-6">
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped table-hover bank_table" border='1'>
            <tr>
                <td  colspan="" align="left" class="table-row-heading" style="text-align:left;" width="10%">   
                    Requirement
                </td>
                <td   align="left" class="table-row-heading" style="text-align:left;"  width="20%">   
                    Time (Excluding Holidays)
                </td>

            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Cash / Bank
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    3 days before
                </td>
            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Equipment / Fixed assets
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    15 days before
                </td>
            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Equipment like pen drive, charger, letterhead, printing books pamphlets 
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    10 days  
                    for pamphlets / book printing depend on quantity  
                </td>
            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Stationery
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    2 days before 
                </td>
            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Hall booking for program including cash lunch, travel, book, pamphlet printing banner standee others.
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    Before 20 days
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="form-group row">
    <table class="table table-bordered table-striped table-hover bank_table">
        <tr class="table-row" >
            <td  colspan="6" align="left"  style="text-align:left;">   

                <div class="form-group ">
                    <div class="col-md-9" style="padding:0px 0px 0px 0px; margin-bottom:10px;">
                        </br>
                        <div class="btn btn-success add-more pull-left" type="button" id="add_field_button_request" style="margin-bottom:10px;"><i class="fa fa-plus" ></i> Add</div>

                    </div>

                </div> 

            </td>
        </tr> 
        <tr class="table-row" >
            <td  colspan="" align="left" class="table-row-heading" style="text-align:left;" width="10%">   
                S. No.
            </td>
            <td   align="left" class="table-row-heading" style="text-align:left;"  width="35">   
                Brief Detail<span class="text-danger">*</span>
            </td>
            <td  align="left" class="table-row-heading" style="text-align:left;"  width="15%">   
                Amount Requested
            </td>
            <td  align="left" class="table-row-heading" style="text-align:left;"  width="25%">   
                Remarks
            </td>
            <td   align="left" class="table-row-heading" style="text-align:left;"  width="15%">   
                Action
            </td>
        </tr>

    </table>
    <div class="table table-bordered table-striped table-hover bank_table" id="input_fields_wrap_request">
        <table width="100%" align="left"  valign="top"  style="text-align:left; margin-top:0px; " border="0" >
            <tr class="table-row-nopadding">
                <td  colspan="" align="left" valign="top" style="text-align:left;" width="10%">   
                    <input type="" name="s_no[]" id="s_no" class="form-control" style="height:32px; padding:0px; margin:0px;" value="" required="required">
                </td>
                <td  colspan=""   align="left" valign="top" style="text-align:left;" width="35%">   
                    <textarea type="" name="brief_details[]" id="brief_details" class="form-control" style="height:32px;" required="required"></textarea>
                </td>
                <td  colspan="" align="left" valign="top" style="text-align:left;" width="15%">   
                    <input  name="expected_expense[]" id="expected_expense" type="" class="form-control expected_expense" style="height:32px;" onkeypress="return isNumberKey(event)">
                </td>
                <td  colspan="" align="left" valign="top"  style="text-align:left;" width="25%">   
                    <textarea type=""  name="remark[]" id="remark" class="form-control" style="height:32px;" rows="10"></textarea>
                </td>

                <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%"></td>
            </tr>   

        </table> 
     
        
    </div>
</div>
 <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Total Amount (Rs) <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        <input  name="amount" type="number" min="0" id="total_sum_value"  class="form-control" required onkeypress="return isNumberKey(event)">
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
    <!-------------end two-------------------------------------------------------->
    <div  id="tab3" style="display:none">
        <h3>Service</h3>
        <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="roles">Category <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        {!!Form::select('category_id[]', array('3'=>'Service'), isset($request->category_id)?$user->category_id:null, ["class"=>"form-control", "id"=>"multiple-checkboxes111",'onclick'=>'selectCate(this.value)'])!!}
 </div>        
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="purpose">Purpose <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        {!!Form::select('purpose', array('Personal'=>'Personal','Official'=>'Official'), isset($request->purpose)?$user->purpose:null, ["class"=>"form-control", 'required','placeholder'=>'Select purpose'])!!}
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Date <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        @if($request->due_date!='')
        <input  name="due_date" id="due_date"  min="{{date('Y-m-d')}}" onchange="getCat(this.value)"  class="form-control multiple_date_due" required value="{{date('d-m-Y')}}" >
        @else
        <input  name="due_date" id="due_date"  min="{{date('Y-m-d')}}" onchange="getCat(this.value)"  class="form-control multiple_date_due" required value="{{date('d-m-Y')}}">
        @endif
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Name of Project</label>
    <div class="col-lg-6">

        <input  name="name_of_project" id="name_of_project"   class="form-control" >

    </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date">Project Expense Head</label>
    <div class="col-lg-6">

        <input  name="project_expense_head" id="project_expense_head"   class="form-control"  onkeypress='return isNumberKey(event)'>

    </div>
</div>



<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="due_date"><b><i class="fa fa-clock-o" style="font-size:18px"></i> Time frame to raise request</b></label>
    <div class="col-lg-6">
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped table-hover bank_table" border='1'>
            <tr>
                <td  colspan="" align="left" class="table-row-heading" style="text-align:left;" width="10%">   
                    Requirement
                </td>
                <td   align="left" class="table-row-heading" style="text-align:left;"  width="20%">   
                    Time (Excluding Holidays)
                </td>

            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Cash / Bank
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    3 days before
                </td>
            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Equipment / Fixed assets
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    15 days before
                </td>
            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Equipment like pen drive, charger, letterhead, printing books pamphlets 
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    10 days  
                    for pamphlets / book printing depend on quantity  
                </td>
            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Stationery
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    2 days before 
                </td>
            </tr>
            <tr>
                <td  colspan="" align="left"  style="text-align:left;" width="10%">   
                    Hall booking for program including cash lunch, travel, book, pamphlet printing banner standee others.
                </td>
                <td   align="left"  style="text-align:left;"  width="20%">   
                    Before 20 days
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="form-group row">
    <table class="table table-bordered table-striped table-hover bank_table">
        <tr class="table-row" >
            <td  colspan="6" align="left"  style="text-align:left;">   

                <div class="form-group ">
                    <div class="col-md-9" style="padding:0px 0px 0px 0px; margin-bottom:10px;">
                        </br>
                        <div class="btn btn-success add-more pull-left" type="button" id="add_field_button_request" style="margin-bottom:10px;"><i class="fa fa-plus" ></i> Add</div>

                    </div>

                </div> 

            </td>
        </tr> 
        <tr class="table-row" >
            <td  colspan="" align="left" class="table-row-heading" style="text-align:left;" width="10%">   
                S. No.
            </td>
            <td   align="left" class="table-row-heading" style="text-align:left;"  width="35">   
                Brief Detail<span class="text-danger">*</span>
            </td>
            <td  align="left" class="table-row-heading" style="text-align:left;"  width="15%">   
                Amount Requested
            </td>
            <td  align="left" class="table-row-heading" style="text-align:left;"  width="25%">   
                Remarks
            </td>
            <td   align="left" class="table-row-heading" style="text-align:left;"  width="15%">   
                Action
            </td>
        </tr>

    </table>
    <div class="table table-bordered table-striped table-hover bank_table" id="input_fields_wrap_request">
        <table width="100%" align="left"  valign="top"  style="text-align:left; margin-top:0px; " border="0" >
            <tr class="table-row-nopadding">
                <td  colspan="" align="left" valign="top" style="text-align:left;" width="10%">   
                    <input type="" name="s_no[]" id="s_no" class="form-control" style="height:32px; padding:0px; margin:0px;" value="" required="required">
                </td>
                <td  colspan=""   align="left" valign="top" style="text-align:left;" width="35%">   
                    <textarea type="" name="brief_details[]" id="brief_details" class="form-control" style="height:32px;" required="required"></textarea>
                </td>
                <td  colspan="" align="left" valign="top" style="text-align:left;" width="15%">   
                    <input  name="expected_expense[]" id="expected_expense" type="" class="form-control expected_expense" style="height:32px;" onkeypress="return isNumberKey(event)">
                </td>
                <td  colspan="" align="left" valign="top"  style="text-align:left;" width="25%">   
                    <textarea type=""  name="remark[]" id="remark" class="form-control" style="height:32px;" rows="10"></textarea>
                </td>

                <td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%"></td>
            </tr>   

        </table> 
     
        
    </div>
</div>
 <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="amount">Total Amount (Rs) <span class="text-danger">*</span></label>
    <div class="col-lg-6">
        <input  name="amount" type="number" min="0" id="total_sum_value"  class="form-control" required onkeypress="return isNumberKey(event)">
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
    
</div>
<!-------------------END 3------------------------------------------>

@push('scripts')
<script>
  function openTab1(id) 
  {
    
   $("#tab"+id).show();
    $("#tab"+2).hide(); 
      $("#tab"+3).hide();
    $("#"+id).removeClass('tabber');
   $("#"+id).addClass('active');
    /*******************1****************/
   $("#"+2).removeClass('active');
   $("#"+2).addClass('tabber');
   /*******************3****************/
   $("#"+3).removeClass('active');
   $("#"+3).addClass('tabber');
   
   
   
  }
 function openTab2(id) 
  {
       $("#tab"+id).show();
      $("#tab"+1).hide(); 
      $("#tab"+3).hide(); 
     
     
   $("#"+id).removeClass('tabber');
   $("#"+id).addClass('active');
   /*******************1****************/
   $("#"+1).removeClass('active');
   $("#"+1).addClass('tabber');
   /*******************3****************/
   $("#"+3).removeClass('active');
   $("#"+3).addClass('tabber');
  }
  function openTab3(id) 
  {
 $("#tab"+id).show();
      $("#tab"+1).hide(); 
      $("#tab"+2).hide(); 
   $("#"+id).removeClass('tabber');
   $("#"+id).addClass('active');
   /*******************1****************/
   $("#"+2).removeClass('active');
   $("#"+2).addClass('tabber');
   /*******************3****************/
   $("#"+1).removeClass('active');
   $("#"+1).addClass('tabber');
  }

   function validateForm()
   {
       multiple_checkboxes = $('#multiple-checkboxes11').val();
       if(multiple_checkboxes=='')
       {
         alert("Please select category")  ;
         return false;
       }
       
       
   }
    
    
//$('#multiple-checkboxes11').multiselect({
    /*
 onChange: function() {
   multiple_checkboxes = $('#multiple-checkboxes11').val();

  if(multiple_checkboxes[1]==2 || multiple_checkboxes[2]==3)
  {
 $("#service_material").fadeIn('slow');
      
  }else
  {
  
   $("#s_no").removeAttr('required');
   $("#brief_details").removeAttr('required');
    $("#service_material").fadeOut();
   //$("#expected_expense").removeAttr('required');
   //$("#remark").removeAttr('required');
  }
   
    }
}); 
*/

</script>
@endpush