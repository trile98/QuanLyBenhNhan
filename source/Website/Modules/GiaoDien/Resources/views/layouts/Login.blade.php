@extends('giaodien::layoutMaster')

@section('content')

<div class=" LoginTabContent">
	<div class="tab">
		<button class="tablinks default active">Đăng nhập</button>
		<!-- <button class="tablinks default active" onclick="openTab(event, 'Login')">Đăng nhập</button> -->
		<!-- <button class="tablinks" onclick="openTab(event, 'Sign-up')">Đăng ký</button> -->
	</div>

	<!-- Tab content -->
	<div id="Login" class="tabcontent">
		<form class="form-group" action="/redirect">
			{!! csrf_field() !!}
<!-- 			<div>
				<label><h6>Tên đăng nhập</h6> </label>
				<input type="text" class="form-control" name="LoginUsername" required>	
			</div>
			
			<div class="mt-3">
				<label><h6>Mật khẩu</h6> </label>
				<input type="text" class="form-control" name="LoginPassword" required>
			</div>
			
			<div class="mt-3">
				<input type="submit" name="LoginBtn" class="btn btn-success form-control text-uppercase" value="đăng nhập">
			</div> -->
			<input type="submit" class="form-control btn" value="Gmail" name="gmailbtn">
		</form>
		<form class="form-group" action="/logout">
			{!! csrf_field() !!}
			<input type="submit" class="form-control btn" value="Logout" name="Logoutbtn">
		</form>
	</div>

	<!-- <div id="Sign-up" class="tabcontent">
		<form class="form-group">
			<div>
				<label><h6>Tên đăng nhập</h6> </label>
				<input type="text" class="form-control" name="SignupUsername" required>	
			</div>
			
			<div class="mt-3">
				<label><h6>Mật khẩu</h6> </label>
				<input type="text" class="form-control" name="SignupPassword" required>
			</div>

			<div class="mt-3">
				<label><h6>Số điện thoại</h6> </label>
				<input type="tel" pattern="[0-9]{10}" required class="form-control" name="SignupPhone">
			</div>

			<div class="mt-3">
				<label><h6>Email</h6> </label>
				<input type="email" class="form-control" name="SignupEmail" required>
			</div>
			
			<div class="mt-3">
				<input type="submit" name="SignupBtn" class="btn btn-success form-control text-uppercase" value="đăng ký">
			</div>
		</form>
	</div> -->
</div>
<!-- Tab links -->


<script type="text/javascript" src="/js/loginTab.js"></script>
@endsection