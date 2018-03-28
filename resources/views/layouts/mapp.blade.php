<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Login Page | Indusbus</title>

  <!-- Favicons-->
    <link rel="icon" href="{{URL::to('logo/favicon.ico')}}">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('logo/favicon.ico')}}">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="{{asset('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{asset('css/custom/custom-style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('css/layouts/page-center.css')}}" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="{{asset('js/plugins/prism/prism.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
 
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
  @if(isset($errors))
      @foreach($errors->all() as $error)
          {{$error}}
      @endforeach
  @endif
  @yield('content')

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="{{asset('js/plugins/jquery-1.11.2.min.js')}}"></script>
  <!--materialize js-->
  <script type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
  <!--prism-->
  <script type="text/javascript" src="{{asset('js/plugins/prism/prism.js')}}"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="{{asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{asset('js/custom-script.js')}}"></script>

</body>

</html>