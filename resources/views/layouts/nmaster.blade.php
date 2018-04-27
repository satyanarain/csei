<?php
$segments_var = '';
$segments_var = Request::segments();
?>
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
    <link rel="icon" type="image/png" href="{{URL::to('images/logonicons/favicon.ico')}}">
    <title>{{config('app.name')}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/lib/dropzone/dropzone.css')}}" rel="stylesheet">
    <link href="{{asset('css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
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
  <body class="hold-transition skin-blue sidebar-mini">
      <div class="loder_id">
          <div class="loader_main">
              <div class="loader"></div>
          </div>
      </div>
      <div id="map1">
          <div id="map">
              <div class="loading_bar">

              </div>

          </div>
      </div>
      <!-- Preloader - style you can find in spinners.css -->
      <div class="preloader">
          <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
      </div>
      <!-- Main wrapper  -->
      <div id="main-wrapper">
          <!-- header header  -->
          <div class="header">
              <nav class="navbar top-navbar navbar-expand-md navbar-light">
                  <!-- Logo -->
                  <div class="navbar-header">
                      <a class="navbar-brand" href="{{route('home')}}">
                          <!-- Logo icon -->
                          <b><img src="{{URL::to('images/logonicons/csei-60x60.png')}}" alt="homepage" class="dark-logo" /></b>
                          <!--End Logo icon -->
                          <!-- Logo text -->
                          <span>CSEI Portal</span>

                      </a>
                  </div>
                  <!-- End Logo -->
                  <div class="navbar-collapse">
                      <!-- toggle and nav items -->
                      <ul class="navbar-nav mr-auto mt-md-0">
                          <!-- This is  -->
                          <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                          <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                      </ul>
                      <!-- User profile and search -->
                      <ul class="navbar-nav my-lg-0">

                          <li class="nav-item dropdown">
                              <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                  <ul>
                                      <li>
                                          <div class="drop-title">Notifications</div>
                                      </li>
                                      <li>
                                          <div class="message-center">
                                              <!-- Message -->
                                              <a href="#">
                                                  <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                                  <div class="mail-contnet">
                                                      <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                                  </div>
                                              </a>
                                              <!-- Message -->
                                              <a href="#">
                                                  <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
                                                  <div class="mail-contnet">
                                                      <h5>This is another title</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
                                                  </div>
                                              </a>
                                              <!-- Message -->
                                              <a href="#">
                                                  <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                                                  <div class="mail-contnet">
                                                      <h5>This is title</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                                                  </div>
                                              </a>
                                              <!-- Message -->
                                              <a href="#">
                                                  <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                                  <div class="mail-contnet">
                                                      <h5>This is another title</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                  </div>
                                              </a>
                                          </div>
                                      </li>
                                      <li>
                                          <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                          <!-- End Comment -->
                          <!-- Messages -->
                          <li class="nav-item dropdown">
                              <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                  <ul>
                                      <li>
                                          <div class="drop-title">You have 4 new messages</div>
                                      </li>
                                      <li>
                                          <div class="message-center">
                                              <!-- Message -->
                                              <a href="#">
                                                  <div class="user-img"> <img src="images/users/5.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                  <div class="mail-contnet">
                                                      <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                                                  </div>
                                              </a>
                                              <!-- Message -->
                                              <a href="#">
                                                  <div class="user-img"> <img src="images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                  <div class="mail-contnet">
                                                      <h5>John Doe</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                                  </div>
                                              </a>
                                              <!-- Message -->
                                              <a href="#">
                                                  <div class="user-img"> <img src="images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                  <div class="mail-contnet">
                                                      <h5>Mr. John</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
                                                  </div>
                                              </a>
                                              <!-- Message -->
                                              <a href="#">
                                                  <div class="user-img"> <img src="images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                  <div class="mail-contnet">
                                                      <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                  </div>
                                              </a>
                                          </div>
                                      </li>
                                      <li>
                                          <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                          <!-- End Messages -->
                          <!-- Profile -->
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{URL::to('images/users/5.jpg')}}" alt="user" class="profile-pic" /><?php
                                  $user = Auth::user();
                                  echo "&nbsp;" . $user->name;
                                  ?></a>
                              <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                  <ul class="dropdown-user">
                                           <li>
                                          <a href="#"
                                             onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                              <i class="fa fa-power-off"></i> Logout
                                          </a>

                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                      </ul>
                  </div>
              </nav>
          </div>
          <!-- End header header -->
          <!-- Left Sidebar  -->
          <div class="left-sidebar">
              <!-- Sidebar scroll-->
              <div class="scroll-sidebar">
                  <!-- Sidebar navigation-->
                  <nav class="sidebar-nav">
                      <ul id="sidebarnav">
                          <li class="nav-devider"></li>
                           <li class="{{$active == 'home' ? 'active' : ''}}"><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard </a></li>
                          <!--                        <li class="nav-label">Apps</li>-->
                          @if(Entrust::hasRole('administrator'))
                          <li class="{{$active == 'users' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu"> Users</span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li class="{{($active2 == 'create' && $active == 'users') ? 'active' : ''}}"><a href="{{route('users.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New User</a></li>
                                  <li class="{{($active2 == '' && $active == 'users') ? 'active' : ''}}"><a href="{{route('users.index')}}"><i class="fa fa-users"></i> All Users</a></li>

                              </ul>
                          </li>
                          @endif

                          @if(Entrust::hasRole('administrator'))
                          <li class="{{$active == 'users' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu"> Vendors</span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li class="{{($active2 == 'create' && $active == 'vendors') ? 'active' : ''}}"><a href="{{route('vendors.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New Vendor</a></li>
                                  <li class="{{($active2 == '' && $active == 'vendors') ? 'active' : ''}}"><a href="{{route('vendors.index')}}"><i class="fa fa-users"></i> All Vendors</a></li>

                              </ul>
                          </li>
                          @endif
                        
                          <li class="{{$active == 'purchase_committees' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i>
                                  <span class="hide-menu">Purchase Committee<?php //echo $active2 ?><?php //echo $active ?>
                                  </span>
                              </a>
                              <ul aria-expanded="false" class="collapse">
                                  <li class="{{(($active2 == 'create' || $active2 == 'edit') && $active == 'purchase_committees') ? 'active' : ''}}"><a href="{{route('purchase_committees.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New Purchase Committee</a></li>
                                  <li class="{{($active2 == '' && $active == 'purchase_committees') ? 'active' : ''}}"><a href="{{route('purchase_committees.index')}}"><i class="fa fa-users"></i> All Purchase Committee</a></li>
                               </ul>
                          </li>
                          
                          <li class="{{$active == 'teams' ? 'teams' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Team</span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li class="{{($active2 == 'create' && $active == 'teams') ? 'active' : ''}}"><a href="{{route('teams.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New Team</a></li>
                                  <li class="{{($active2 == '' && $active == 'teams') ? 'active' : ''}}"><a href="{{route('teams.index')}}"><i class="fa fa-users"></i> All Team</a></li>
                               </ul>
                          </li>
                          
                          
                               <li class="{{$active == 'requests' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">Requests</span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li class="{{($active2 == 'create' && $active == 'requests') ? 'active' : ''}}"><a href="{{route('requests.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New Request</a></li>
                                  <li class="{{($active2 == '' && $active == 'requests') ? 'active' : ''}}"><a href="{{route('requests.index')}}"><i class="ti-menu"></i> My Requests</a></li>
                                  <?php
                                  $request_only_verifire = Request::fullUrl();
                                  $request_only_verifire = end(explode('?', $request_only_verifire));
                                  ?> 
                                  <li class="{{($active2 == 'requests' && $active == 'verifiers') ? 'active' : ''}}"><a href="{{route('verifiers.requests')}}" class="{{($request_only_verifire == 'requested_requests') ? 'active' : ''}}"><i class="fa fa-ban" style="color:#dd4b39;" aria-hidden="true"></i> Pending Verification</a></li>
                                  <li class="{{($active2 == 'requests' && $active == 'approvers') ? 'active' : ''}}"><a href="{{route('approvers.requests')}}" class="{{($request_only_verifire == 'verifireactive') ? 'active' : ''}}"><i class="fa fa-ban" style="color:#dd4b39;" aria-hidden="true"></i> Pending Approval</a></li>
                                  @if(Entrust::hasRole('Director'))
                                  <li class="{{($active2 == 'requests' && $active == 'accountants') ? 'active' : ''}}"><a href="{{route('accountants.requests')}}"  class="{{($request_only_verifire == 'accountants') ? 'active' : ''}}"><i class="fa fa-check-circle" aria-hidden="true" style="color:green"></i> Approved Requests</a></li>
                                  @endif


                              </ul>
                          </li>
                          <li class="{{$active == 'purchases' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">Purchase Order</span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li class="{{($active2 == 'create' && $active == 'purchases') ? 'active' : ''}}"><a href="{{route('purchases.create')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                          New Purchase Order</a></li>
                                  <li class="{{($active2 == 'create' && $active == 'purchases') ? 'active' : ''}}"><a href="{{route('purchases.index')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                          All Purchase Order</a></li>

                              </ul>
                          </li>

                          @if(Entrust::hasRole('administrator'))
                          <li class="nav-label">SETTINGS</li>

                          <li class="{{$active == 'roles' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-key"></i><span class="hide-menu"><i class="fas fa-role"></i>Roles</span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li class="{{($active2 == 'create' && $active == 'roles') ? 'active' : ''}}"><a href="{{route('roles.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New Role</a></li>
                                  <li class="{{($active2 == '' && $active == 'roles') ? 'active' : ''}}"><a href="{{route('roles.index')}}"><i class="fa fa-bars"></i> All Roles</a></li>

                              </ul>
                          </li>

                          <li class="{{$active == 'permissions' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu"><i class="fas fa-permission"></i>Permissions</span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li class="{{($active2 == 'create' && $active == 'permissions') ? 'active' : ''}}"><a href="{{route('permissions.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New Permission</a></li>
                                  <li class="{{($active2 == '' && $active == 'permissions') ? 'active' : ''}}"><a href="{{route('permissions.index')}}"><i class="fa fa-bars"></i> All Permissions</a></li>

                              </ul>
                          </li>
  <!--                        <li><a href="page-invoice.html"><i class="fa fa-cog"></i> Miscellenious</a></li>-->
                          @endif
                      </ul>
                  </nav>
                  <!-- End Sidebar navigation -->
              </div>
              <!-- End Sidebar scroll-->
          </div>
          <!-- End Left Sidebar  -->
          <!-- Page wrapper  -->
          <div class="page-wrapper">
              @yield('breadcrumb')
              <!-- Flash message starts -->
              @if(Session::has('message_warning'))
              <div id="card-alert" class="card orange">
                  <div class="card-content white-text">
                      <p><i class="mdi-alert-warning"></i> WARNING : {{Session::get('message_warning')}}</p>
                  </div>
                  <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              @endif
              @if(Session::has('message_error'))
              <div id="card-alert" class="card red">
                  <div class="card-content white-text">
                      <p><i class="mdi-alert-error"></i> ERROR : {{Session::get('message_error')}}</p>
                  </div>
                  <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              @endif
              @if(Session::has('message_success'))
              <div id="card-alert" class="card green">
                  <div class="card-content white-text">
                      <p><i class="mdi-navigation-check"></i> SUCCESS : {{Session::get('message_success')}}</p>
                  </div>
                  <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              @endif
              @if($errors->any())
              <div class="card" style="margin-left: 10px;">
                  <ul class="list-group" id='error_message_red'> 
                      @foreach($errors->all() as $error)
                      <li class="list-group-item alert alert-danger">{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif


              <!-- Flash message ends -->
              @yield('content')
              <!-- footer -->
              <footer class="footer"> © 2018 All rights reserved. Designed and develop by <a href="http://opiant.in/">Opiant</a></footer>
              <!-- End footer -->
          </div>
          <!-- End Page wrapper  -->
      </div>
      <!-- End Wrapper -->
      <!-- All Jquery -->
      <script src="{{asset('js/lib/jquery/jquery.min.js')}}"></script>
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

      <!-- Bootstrap tether Core JavaScript -->
      <script src="{{asset('js/lib/bootstrap/js/popper.min.js')}}"></script>
      <script src="{{asset('js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
      <!--Menu sidebar -->
      <script src="{{asset('js/sidebarmenu.js')}}"></script>
      <!--stickey kit -->
      <script src="{{asset('js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
      <!--Custom JavaScript -->


      <!-- Amchart -->
      <script src="{{asset('js/lib/morris-chart/raphael-min.js')}}"></script>
      <script src="{{asset('js/lib/morris-chart/morris.js')}}"></script>
      <script src="{{asset('js/lib/morris-chart/dashboard1-init.js')}}"></script>


      <script src="{{asset('js/lib/calendar-2/moment.latest.min.js')}}"></script>
      <!-- scripit init-->
      <script src="{{asset('js/lib/calendar-2/semantic.ui.min.js')}}"></script>
      <!-- scripit init-->
      <script src="{{asset('js/lib/calendar-2/prism.min.js')}}"></script>
      <!-- scripit init-->
      <script src="{{asset('js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
      <!-- scripit init-->
      <script src="{{asset('js/lib/calendar-2/pignose.init.js')}}"></script>

      <script src="{{asset('js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
      <script src="{{asset('js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
      <script src="{{asset('js/scripts.js')}}"></script>

      <!-- DataTables -->
      <script src="{{asset('js/lib/datatables/datatables.min.js')}}"></script>
      <script src="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
      <script src="{{asset('js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
      <script src="{{asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
      <script src="{{asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
      <script src="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
      <script src="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
      <script src="{{asset('js/lib/datatables/datatables-init.js')}}"></script>

      <!-- Form validation -->
      <script src="{{asset('js/lib/form-validation/jquery.validate.min.js')}}"></script>
      <script src="{{asset('js/custom.js')}}"></script>
      <!-- scripit init-->
      <script src="{{asset('js/lib/dropzone/dropzone.js')}}"></script>
      <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
      <script type="text/javascript">
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

                                                  $('#map1').append('<div style="" id="map"><div class="loader"></div></div>');
                                                  $(window).on('load', function () {
                                                      setTimeout(removeLoader, 200); //wait for page load PLUS two seconds.
                                                  });
                                                  function removeLoader() {
                                                      $("#map").fadeOut(100, function () {
                                                          // fadeOut complete. Remove the loading div
                                                          $("#map").remove(); //makes page more lightweight 
                                                          $("#map1").hide(); //makes page more lightweight 
                                                      });
                                                  }
                                                  $(document).ready(function ()
                                                  {
                                                      // $("#example23_info").hide(); 
                                                  });




      </script>
      <script>

          $(document).ready(function () {
              var max_fields = 10000; //maximum input boxes allowed
              var wrapper = $("#input_fields_wrap_classes"); //Fields wrapper
              var add_button = $("#add_field_button_classes"); //Add button ID
              var add_button = $("#add_field_button_classes");

              //var maxvalue= $("#maxvalue").val();
              //alert(maxvalue)
      //  if(maxvalue != 'undefined')
      //  {
              var x = 1;
      //  }else
      //  {
      //    var x = maxvalue;   
      //  }


              //initlal text box count
              $("#add_field_button_classes").click(function (e) { //on add input button click

                  e.preventDefault();
                  if (x < max_fields) { //max input box allowed
                      x++; //text box increment
                      $("#input_fields_wrap_classes").append('<div id="div_remove_field' + x + '" style="padding-left:0px;  margin-bottom:0px;">\n\
      <table width="100%" align="left"  valign="top"  style="text-align:left; margin-top:0px; " border="0">\n\
      <tr class="table-row-nopadding">\n\
      <td  colspan="" align="left" valign="top" style="text-align:left; border-top:none;"  width="10%">\n\
      <input type="" class="form-control" name="product_code[]" id="product_code" style="height:32px; padding:0px; margin:0px;"></td>\n\
      <td  colspan="" align="left" valign="top" style="text-align:left; border-top:none;"  width="30%">\n\
      <input type="" name="product_name" id="product_name[]" class="form-control" style="height:32px;" ></td>\n\
      <td  colspan="" align="left" valign="top" style="text-align:left; border-top:none;"  width="10%">\n\
      <input type=""  name="quantity[]" id="quantity" class="form-control" style="height:32px;" ></td>\n\
      <td  colspan="" align="left" valign="top"  style="text-align:left; border-top:none;"  width="20%">\n\
      <input type=""  name="unit_price[]" id="unit_price" class="form-control" style="height:32px;"></td>\n\
      <td  colspan="" align="left" valign="top"  style="text-align:left; border-top:none;"  width="15%">\n\
      <input type=""  name="total[]" id="total" class="form-control" style="height:32px; "></td>\n\
      <td colspan="" align="left" valign="top"  style="text-align:left;border:1px solid #ccc; border-top:none;"  width="15%">\n\
      <button class="btn btn-danger remove" type="button" id="remove_field' + x + '" onclick="removeFunction(this.id)" style="height:31px;">\n\
      <i class="glyphicon glyphicon-remove"></i> Remove</button></td></tr>\n\
      </table></div>'); //add input box
                  }
              });


          });

          /************************************************************************************************/

          $(document).ready(function () {
              var max_fields = 10000; //maximum input boxes allowed
              var wrapper = $("#input_fields_wrap_request"); //Fields wrapper
              var add_button = $("#add_field_button_request"); //Add button ID
              var add_button = $("#add_field_button_request");

              //var maxvalue= $("#maxvalue").val();
              //alert(maxvalue)
      //  if(maxvalue != 'undefined')
      //  {
              var x = 1;
      //  }else
      //  {
      //    var x = maxvalue;   
      //  }


              //initlal text box count
              $("#add_field_button_request").click(function (e) { //on add input button click
                  e.preventDefault();
                  if (x < max_fields) { //max input box allowed
                      x++; //text box increment
                      $("#input_fields_wrap_request").append('<div id="div_remove_field' + x + '" style="padding-left:0px;  margin-bottom:0px;">\n\
      <table width="100%" align="left"  valign="top"  style="text-align:left; margin-top:0px; " border="0" >\n\
      <tr class="table-row-nopadding"><td  colspan="" align="left" valign="top" style="text-align:left;" width="10%">   <input type="" name="s_no[]" id="s_no" class="form-control" style="height:32px; padding:0px; margin:0px;" required></td><td  colspan=""   align="left" valign="top" style="text-align:left;" width="35%">   <input type="" name="brief_details[]" id="product_name" class="form-control" style="height:32px;" required></td>\n\
      <td  colspan="" align="left" valign="top" style="text-align:left;" width="15%"><input  name="expected_expense[]" id="expected_expense" type="" class="form-control expected_expense" style="height:32px;"></td><td  colspan="" align="left" valign="top"  style="text-align:left;" width="25%">   <input type=""  name="remark[]" id="remark" class="form-control" style="height:32px;"   ></td><td  colspan="" align="left" valign="top"  style="text-align:left;"  width="15%"><a href="#" class="btn btn-danger remove remove_field"><i class="glyphicon glyphicon-remove"></i>Remove</a></td>\n\
      </tr></table></div>'); //add input box
                  }
              });

              $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                  e.preventDefault();
                  $(this).closest('div').remove();
                  x--;
              })

          });



      //function removeFunction(id)
      //{
      //var x = 1;  
      //       $("#"+id).parent('div').remove(); x--;
      //      $("#div_"+id).remove(); x--;
      //    
      //}


      // $("#unit_price").keyup(function() {
      //    $row = $(this).closest("tr");    // Find the row
      //    $qty = parseFloat($row.find("#quantity").val()); // Find the text
      //    if($qty!='')
      //    {
      //    $net = parseFloat($row.find("#unit_price").val()); // Find the text
      //    var $total = $qty * $net;
      //    $row.find("#total").val($total);
      //    }
      //});
          $(document).on("keyup", "#quantity", function () {
              $row = $(this).closest("tr");    // Find the row
              $qty = $row.find("#quantity").val(); // Find the text
              //  $product_name = parseFloat($row.find("#product_name").val()); // Find the text
              //$product_code = parseFloat($row.find("#product_code").val()); // Find the text
              $net = parseFloat($row.find("#unit_price").val());

              if ($net != '' && $qty != '')
              {

                  var $total = $qty * $net;
                  // alert($total)
                  $row.find("#total").val($total);
              }

          });
          $(document).on("keyup", "#unit_price", function () {
              $row = $(this).closest("tr");    // Find the row
              $qty = $row.find("#quantity").val(); // Find the text
              //  $product_name = parseFloat($row.find("#product_name").val()); // Find the text
              //$product_code = parseFloat($row.find("#product_code").val()); // Find the text
              $net = parseFloat($row.find("#unit_price").val());
              alert($qty);
              // alert($net);
              if ($qty == '')
              {
                  alert("Please Enter Quantity");
                  return false;
              } else
              {
                  if ($net != '' && $qty != '')
                  {
                      var $total = $qty * $net;
                      //alert($total)
                      $row.find("#total").val($total);
                  }
              }
          });
          $(document).on("keyup", ".form-control", function () {

              var add = 0;
              $(".form-control1").each(function () {
                  add += Number($(this).val());
              });
              $("#totalsum").val(add);


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


          $('#add_bank_info').click(function () {
              $(".rm_first").show();

              var ele = $('.bank_table tbody tr:last');
              var ele_clone = ele.clone();

              ele_clone.find('input, select').prop("disabled", false).val('');
              ele_clone.find('td div.dummy').removeClass('has-error has-success');
              ele_clone.find('td div.input-icon i').removeClass('fa-check fa-warning');
              ele_clone.find('td:last').show();
              ele.after(ele_clone);
          });

          $(document).on("click", ".remove_bank_row", function () {
              var $table = $(this).closest('table');
              $(this).closest('tr').remove();
              $table.trigger("recalc");
          });

          $(document).on("keyup", ".bank_table input", function () {
              $(this).trigger("recalc");
          });

          $(document).on("recalc", ".bank_table tr", function () {
              var total = +$(this).find(".quantity2").val() * +$(this).find(".rate").val();
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

      </script>


      @stack('scripts')
  </body>

</html>