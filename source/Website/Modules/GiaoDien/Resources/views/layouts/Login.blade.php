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

			<button type="submit" name="gmailbtn" class="btn btn-social btn-google">
				<span class="fab fa-google"></span> Sign in with Google
			</button>
		</form>
	</div>

</div>
<!-- Tab links -->


@endsection