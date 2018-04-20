@extends('layouts.nmaster')
@section('breadcrumb')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Requests</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('requests.index')}}">Requests</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    @endsection

    @section('content')
    <!-- Container fluid  -->
      <div class="row justify-content-center" id='printableArea'>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                 <div class="form-validation">
                                    <h4 class="header2">Requests Details</h4>
                                    {!!Form::open(['route'=>'requests.store',
                                    'id'=>'formValidate',
                                    'class'=>'formValidate',
                                    'autocomplete'=>'off',
                                      'onsubmit'=>'return validateForm()',
                                    'files'=>true])!!}
                                    @include('requests.form')
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
              
        </div>
    
    @endsection

    @push('scripts')
    <script>
    $(document).on("keyup", "#unit_price", function() {
 $row = $(this).closest("tr");    // Find the row
    $qty = $row.find("#quantity").val(); // Find the text
  //  $product_name = parseFloat($row.find("#product_name").val()); // Find the text
    //$product_code = parseFloat($row.find("#product_code").val()); // Find the text
     $net = parseFloat($row.find("#unit_price").val());
   alert($qty);
    // alert($net);
    if($qty=='')
    {
      alert("Please Enter Quantity");
      return false;
        }else
        {
    if($net!='' && $qty!='')
    {
    var $total = $qty * $net;
    //alert($total)
    $row.find("#total").val($total);
    }
    }
});
    
   $(document).ready(function () {
       
    $("#input_fields_wrap_request").on('input', '.expected_expense', function () {
     var calculated_total_sum = 0;
     
       $("#input_fields_wrap_request .expected_expense").each(function () {
           var get_textbox_value = $(this).val();
           //alert(get_textbox_value)
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
           // alert(calculated_total_sum);
            
              $("#total_sum_value").val(calculated_total_sum);
              $("#total_sum_value1").html(calculated_total_sum);
              
              
       });
    });


    
    
    
    
    
    </script>
    @endpush