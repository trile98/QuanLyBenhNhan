@extends('giaodien::layoutMaster')

@section('content')
<div class="appointment-content">
	<form method="post" action="/datlich">
		{{csrf_field()}}
		<div class="detail container my-3">
			<h3 class="text-center">Thông tin cuộc hẹn</h3>
			<div class="row">
				<div class="col-2"></div>
				<div class="col-2 text-right">
					<label>Bác sĩ</label>
					<br>
					<label>Chọn ngày</label>
				</div>

				<div class="col-8">
					<div>ABC</div>
					<div id="datepicker" class="input-group date my-2" data-date-format="d-m-yyyy"> 
						<input class="form-control" type="text" name="date" value="{{$dateValue}}">
						<button type="button" class="btn btn-group btn-info"><i class="fas fa-calendar-alt"></i></button>
					</div>
					<input type="submit" name="ShowCalendarBtn" value="Hiện lịch" class="btn btn-info">
				</div>
					
			</div>
		</div>
	</form>

		<div class="TimeBox row">
			@if($ShowVar == 1)
			@foreach($ServingHours as $key => $value)
			<div class="time col-lg-2 col-md-3 col-sm-4 col-6" onclick="choose(this)">{{$key}}</div>
			@endforeach
			@endif
		</div>

		<div id="btnSubmit"><input type="submit" name="" class="btn btn-info" value="Đặt lịch"></div>
	<!-- </form> -->

</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>


<script>
	
	function choose(e) {
		var times = $('.time');
		for (var i = 0; i < times.length; i++) {
			times[i].className=times[i].className.replace(" selected","");
		}
		$(e).addClass('selected')
	}

	$(function () {  
		$("#datepicker").datepicker({         
			autoclose: true,         
			todayHighlight: true 
		}).datepicker('update', new Date());
	});


</script>
@endsection