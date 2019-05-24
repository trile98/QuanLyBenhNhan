<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard One | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/owl.carousel.css">
    <link rel="stylesheet" href="/css/Admin/owl.theme.css">
    <link rel="stylesheet" href="/css/Admin/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="/css/Admin/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="/js/Admin/vendor/modernizr-2.8.3.min.js"></script>
    <!-- font-awesome
    	============================================ -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- my own CSS
        ============================================ -->
    <link rel="stylesheet" href="/css/Admin/{{$cssName}}">
    <!-- bower timepicker CSS
        ============================================ -->
    <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker-standalone.css" />
    <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <!-- date-picker CSS
        ============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

</head>

<body>
	@include('admin::admin_header')

	@yield('content')
    
    @include('admin::admin_footer')
    <!-- jquery
		============================================ -->
    <script src="/js/Admin/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="/js/Admin/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="/js/Admin/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="/js/Admin/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="/js/Admin/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="/js/Admin/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="/js/Admin/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="/js/Admin/counterup/jquery.counterup.min.js"></script>
    <script src="/js/Admin/counterup/waypoints.min.js"></script>
    <script src="/js/Admin/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="/js/Admin/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="/js/Admin/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/js/Admin/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/js/Admin/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="/js/Admin/sparkline/jquery.sparkline.min.js"></script>
    <script src="/js/Admin/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="/js/Admin/flot/jquery.flot.js"></script>
    <script src="/js/Admin/flot/jquery.flot.resize.js"></script>
    <script src="/js/Admin/flot/curvedLines.js"></script>
    <script src="/js/Admin/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="/js/Admin/knob/jquery.knob.js"></script>
    <script src="/js/Admin/knob/jquery.appear.js"></script>
    <script src="/js/Admin/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="/js/Admin/wave/waves.min.js"></script>
    <script src="/js/Admin/wave/wave-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="/js/Admin/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="/js/Admin/plugins.js"></script>
	<!--  Chat JS
		============================================ -->
    <script src="/js/Admin/chat/moment.min.js"></script>
    <script src="/js/Admin/chat/jquery.chat.js"></script>
    <!-- main JS
		============================================ -->
    <script src="/js/Admin/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="/js/Admin/tawk-chat.js"></script>
    <!-- date-picker JS
        ============================================ -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <!-- bower time-picker JS
        ============================================ -->
    <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/js/TimeManagement/TimeManagement.js"></script>
     
     <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
</body>

</html>