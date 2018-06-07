<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('images/logonicons/favicon.ico')}}">
    <title>{{config('app.name')}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/helper.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" href="{{ asset(elixir('plugins/datepicker/datepicker3.css')) }}">
        <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset(elixir('plugins/daterangepicker/daterangepicker.css')) }}">
     <link href="{{asset('css/lib/calendar2/semantic.ui.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/helper.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
    @yield('content')
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="{{asset('js/lib/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('js/lib/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('js/custom.min.js')}}"></script>
<script>
    
       $('body').on('focus',".multiple_date", function(){
               $(this).datepicker({
                    dateFormat: 'dd-mm-yy',
                     startView: "year", 
                      changeYear: true,
                    yearRange: "-80Y:-0Y",
      minDate: "-80Y",
      maxDate: "-0Y"
                });
      }); 
    $('body').on('focus',".multiple_date_due", function(){
                  $(this).datepicker({
                       dateFormat: 'dd-mm-yy',
                        startView: "year",
                         minDate:new Date(),
                         changeYear: true,
                       yearRange: "-80Y:+20Y"
   });
   });
    
    
    
    
          function isNumberKey(evt)
          {
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if (charCode != 46 && charCode > 31
                      && (charCode < 48 || charCode > 57))
                  return false;

              return true;
          }
          function isIntegerKey(evt)
          {
              evt = (evt) ? evt : window.event;
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                  return false;
              }
              return true;


          }
 /***********************************************************************************/
          $(document).ready(function () {

              //iterate through each textboxes and add keyup
              //handler to trigger sum event
              $(".txt").each(function () {

                  $(this).keyup(function () {
                      calculateSum();
                  });
              });

          });

          function calculateSum() {

              var sum = 0;
              //iterate through each textboxes and add the values
              $(".txt").each(function () {

                  //add only if the value is number
                  if (!isNaN(this.value) && this.value.length != 0) {
                      sum += parseFloat(this.value);
                  }

              });
              //.toFixed() method will roundoff the final sum to 2 decimal places
              $("#sum").html(sum.toFixed(2));
          }


        

          $(document).on("click", ".remove_bank_row", function () {
              var $table = $(this).closest('table');
              $(this).closest('tr').remove();
              $table.trigger("recalc");
          });

          $(document).on("keyup", ".bank_table input", function () {
              $(this).trigger("recalc");
          });

          $(document).on("recalc", ".bank_table tr", function () {
              
              rate=$(this).find(".rate").val();
              var price = +$(this).find(".quantity2").val() * +rate;
               gst=  $(this).find(".gst").val()
              gstPrice =  price * gst / 100
             total=price+gstPrice;
             $(this).find(".tamnt").val(total.toFixed(2));
          });

          $(document).on("recalc", ".bank_table", function () {
              var grandTotal = 0;
              $(this).find(".tamnt").each(function () {
                  grandTotal += +$(this).val();
              });
              $("#grandTotal").val(grandTotal.toFixed(2));
          });

          $(".bank_table").trigger("recalc");

          /******************************************************************/
          $(document).ready(function () {

              $('#multiple-checkboxes').multiselect();

          });
$(document).ready(function(){	
     setTimeout(function() {
          $('#successMessage').fadeOut('fast');
        }, 5000); // <-- time in milliseconds
      });

</script>
</body>

</html>