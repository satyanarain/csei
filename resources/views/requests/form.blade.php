<ul  class="nav-nav-pills">
    <li 
         @if($request->category_id==2 || $request->category_id==3)
         class="tabber" 
        @else
        class="active" 
        @endif
         onclick="openTab1(1)" id="1">
        <a  href="#1a" data-toggle="tab" style="padding:10px;" >Cash</a>
    </li>
    <li @if($request->category_id==2)
          class="active"
        @else
         class="tabber"
        @endif
         id="2" onclick="openTab2(2)">
        
        <a href="#2a" data-toggle="tab">Material/Service</a>
    </li>
    <li @if($request->category_id==3)
          class="active"
        @else
         class="tabber"
        @endif
        id="3" onclick="openTab3(3)"><a href="#3a" data-toggle="tab">Single Vendor</a>
    </li>
</ul>
<div class="tab-content clearfix" style="border:#ccc 1px solid; border-top:none; padding:10px;">
<?php 
//  echo "<pre>";
//  echo print_r($request) ; 
?> 
<!---------------------------tab 1--------------------------------------------------------->
@include('requests.form_partials.cash_form')
<!---------------------------tab 2--------------------------------------------------------->
@include('requests.form_partials.material_form')
<!---------------------------tab 3--------------------------------------------------------->
@include('requests.form_partials.single_vendor_form')
<!---------------------------tab 3--------------------------------------------------------->
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
       $(".loder_id").show();
       
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