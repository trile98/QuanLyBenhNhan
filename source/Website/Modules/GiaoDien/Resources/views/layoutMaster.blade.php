<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="/css/layoutMaster.css">
	<link rel="stylesheet" type="text/css" href="/css/home.css">
	<link rel="stylesheet" type="text/css" href="/css/appointment.css">

	<!-- slick -->
	<link rel="stylesheet" type="text/css" href="/css/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="/css/slick/slick-theme.css">

	
	<!-- Bootstrap Date-Picker Plugin -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

</head>

<body>
	<script type="text/javascript" src="/js/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="/js/slick/slick.min.js"></script>

	<!-- header -->
 	<header class="container">
		<div class="row">
			<div class="col-4"><h3>Phòng Khám B & T</h3></div>
			<div class="menu col-8">
				<ul>
					<li class="menu-title"><a href="#">Trang chủ</a></li>
					<li class="menu-title"><a href="#">Giới thiệu</a></li>
					<li class="menu-title active"><a href="#">Đặt lịch</a></li>
					<li class="menu-title"><a href="#">Tin tức</a></li>
					<li class="menu-title"><a href="#">Liên hệ</a></li>
					<li class="menu-title"><a href="#">Đăng nhập</a></li>
				</ul>
			</div>
		</div>
		
	</header>


<!-- end header -->

@yield('content')


<!-- footer -->
<footer class="py-4 container">
	<div class="col-lg-4 col-md-4 col-sm-12 col-12">
		<h3>Phòng Khám B & T</h3>

	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-12"></div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-12">
		<div class="contactLogo">
			<!-- <ul>
				<li></li>
			</ul> -->
		</div>
	</div>

</footer>
<!-- end footer -->


<script type="text/javascript">
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.querySelector('header').style.background = 'rgba(34,139,34,0.7)';
		} 
		else{
			document.querySelector('header').style.background = 'transparent';
		}

	};

	$('.menu-title').click(function(event) {
		var titles = document.querySelectorAll('.menu-title');
		for (var i = titles.length - 1; i >= 0; i--) {
			titles[i].className= titles[i].className.replace(' active', '');
		}

		event.target.className+=' active';
	});
</script>

 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>

</body>
</html>