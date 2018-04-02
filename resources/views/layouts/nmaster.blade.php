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
                        <!-- Messages -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                            <div class="dropdown-menu animated zoomIn">
                                <ul class="mega-dropdown-menu row">


                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
<!--                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>-->
                        <!-- Comment -->
                        <li class="nav-item dropdown">
<!--                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>-->
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
<!--                            <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>-->
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
                            $user=Auth::user();
                            echo "&nbsp;". $user->name;
                            ?></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
<!--                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>-->
<!--                                    <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li><a href="#"><i class="ti-settings"></i> Setting</a></li>-->
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
<!--                        <li class="nav-label">Home</li>-->
<!--                        <li style="padding: 8px 20px;">
                            <span class="fa fa-user" style="color: green;"></span>@foreach(Auth::user()->roles as $role) {{$role->display_name}} @endforeach
                        </li>-->
                        
                        <li class="{{$active == 'home' ? 'active' : ''}}"><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard </a></li>
<!--                        <li class="nav-label">Apps</li>-->
                        @if(Entrust::hasRole('administrator'))
                        <li class="{{$active == 'users' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="{{($active2 == '' && $active == 'users') ? 'active' : ''}}"><a href="{{route('users.index')}}">All Users</a></li>
                                <li class="{{($active2 == 'create' && $active == 'users') ? 'active' : ''}}"><a href="{{route('users.create')}}"><i class="fa fa-plus" aria-hidden="true"></i>+New User</a></li>
                            </ul>
                        </li>
                        @endif
                        <li class="{{$active == 'requests' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">Requests</span></a>
                            <ul aria-expanded="false" class="collapse">
                                
                                
                                
                                <li class="{{($active2 == '' && $active == 'requests') ? 'active' : ''}}"><a href="{{route('requests.index')}}">My Requests</a></li>
                                <?php    $request_only_verifire=Request::fullUrl();
                                          $request_only_verifire=end(explode('?',$request_only_verifire));
                                       ?> 
                              <li class="{{($active2 == 'requests' && $active == 'verifiers') ? 'active' : ''}}"><a href="{{route('verifiers.requests')}}" class="{{($request_only_verifire == 'requested_requests') ? 'active' : ''}}"><i class="fa fa-share-square"></i> Requested Requests</a></li>
                               <li class="{{($active2 == 'requests' && $active == 'approvers') ? 'active' : ''}}"><a href="{{route('approvers.requests')}}" class="{{($request_only_verifire == 'verifireactive') ? 'active' : ''}}"><i class="fa fa-check-circle"></i> Verified Requests</a></li>
                              
                               @if(Entrust::hasRole('Admin Associate'))
                                <li class="{{($active2 == 'requests' && $active == 'accountants') ? 'active' : ''}}"><a href="{{route('accountants.requests')}}"><i class="fa fa-check-circle" aria-hidden="true"></i> Approved Requests</a></li>
                                @endif
                                
                                <li class="{{($active2 == 'create' && $active == 'requests') ? 'active' : ''}}"><a href="{{route('requests.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New Request</a></li>
                            </ul>
                        </li>
                     
                        @if(Entrust::hasRole('administrator'))
                        <li class="nav-label">SETTINGS</li>

                        <li class="{{$active == 'roles' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-key"></i><span class="hide-menu"><i class="fas fa-role"></i>Roles</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="{{($active2 == '' && $active == 'roles') ? 'active' : ''}}"><a href="{{route('roles.index')}}"><i class="fas fa-role"></i>All Roles</a></li>
                                <li class="{{($active2 == 'create' && $active == 'roles') ? 'active' : ''}}"><a href="{{route('roles.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New Role</a></li>
                            </ul>
                        </li>
                        
                        <li class="{{$active == 'permissions' ? 'active' : ''}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu"><i class="fas fa-permission"></i>Permissions</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="{{($active2 == '' && $active == 'permissions') ? 'active' : ''}}"><a href="{{route('permissions.index')}}"><i class="fas fa-permission"></i> All Permissions</a></li>
                                <li class="{{($active2 == 'create' && $active == 'permissions') ? 'active' : ''}}"><a href="{{route('permissions.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> New Permission</a></li>
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
                  <!-- Flash message ends -->
            @yield('content')
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
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

    <!-- scripit init-->

  
    <script src="{{asset('js/lib/dropzone/dropzone.js')}}"></script>

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

  $('#map1').append('<div style="" id="map"><div class="loader"></div></div>');
$(window).on('load', function(){
  setTimeout(removeLoader, 200); //wait for page load PLUS two seconds.
});
function removeLoader(){
    $( "#map" ).fadeOut(100, function() {
      // fadeOut complete. Remove the loading div
      $( "#map" ).remove(); //makes page more lightweight 
      $( "#map1" ).hide(); //makes page more lightweight 
  });  
}  
$(document).ready(function()
          {      
          // $("#example23_info").hide(); 
           } ) ;
           
           
           
           
</script>
    @stack('scripts')
</body>

</html>