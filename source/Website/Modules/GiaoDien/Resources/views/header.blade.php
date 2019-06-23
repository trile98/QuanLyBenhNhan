<header class="container">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-10 col-10 logo"><a href="/"><h3>Phòng Khám B & T</h3></a></div>

		<div class="menu col-lg-8 col-md-8">
			<ul class="mainMenu">
				<li class="menu-title"><a href="#">Trang chủ</a></li>
				<li class="menu-title"><a href="#">Giới thiệu</a></li>
				<li class="menu-title"><a href="/dang-nhap">Đặt lịch</a></li>
				<li class="menu-title"><a href="#">Tin tức</a></li>
				<li class="menu-title"><a href="#">Liên hệ</a></li>
				<li class="menu-title"><a href="/dang-nhap">Đăng nhập/Đăng ký</a></li>
				
			</ul>
		</div>

		<div class="menu-button col-sm-2 col-2">
			<button type="button" id="btn-menu" onclick="openmenu()">
				<div></div>
				<div></div>
				<div></div>
			</button>

		</div>
	</div>

	<!-- menu mobile -->
	<div id="SmallMenu">
		<ul >
			<li ><a href="#">Trang chủ</a></li>
			<li ><a href="#">Giới thiệu</a></li>
			<li ><a href="/dang-nhap">Đặt lịch</a></li>
			<li ><a href="#">Tin tức</a></li>
			<li ><a href="#">Liên hệ</a></li>
			<li ><a href="/dang-nhap">Đăng nhập/Đăng ký</a></li>
		</ul>
	</div>
	<!-- ------------------- -->
</header>

<script type="text/javascript">
	function openmenu(){
		var menu = document.getElementById('SmallMenu');
		if(menu.style.marginRight == '0%')
		{
			menu.style.animation='slideout 2s forwards';
			menu.style.marginRight = '-100%';
		}
		else
		{
			menu.style.animation = 'slidein 2s forwards';
			menu.style.marginRight = '0%';
		}
	}
</script>

