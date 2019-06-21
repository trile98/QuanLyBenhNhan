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
	<link rel="stylesheet" type="text/css" href="/css/PostArticle.css">
	<link rel="stylesheet" type="text/css" href="/css/loginTab.css">

	<!-- slick -->
	<link rel="stylesheet" type="text/css" href="/css/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="/css/slick/slick-theme.css">

	<!-- Bootstrap Date-Picker Plugin -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">


</head>

<body>
	<script type="text/javascript" src="/js/jquery/jquery-3.3.1.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/js/slick/slick.min.js"></script>

	@include($headerLink)

	@yield('content')

	@include('giaodien::footer')

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

	$('.menu-title a').click(function(event) {
		var titles = document.querySelectorAll('.menu-title');
		for (var i = titles.length - 1; i >= 0; i--) {
			titles[i].className= titles[i].className.replace(' active', '');
		}

		event.target.parentNode.className+=' active';
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