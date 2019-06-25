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
					<label>Họ và tên</label>
					<br>
					<label>Chọn ngày</label>
				</div>

				<div class="col-8">
					<div id="patientName">{{$user->family_name}} {{$user->given_name}}</div>
					<div id="datepicker" class="input-group date my-2" data-date-format="d-m-yyyy"> 
						<input class="form-control" type="text" name="date" value="{{$dateValue}}">
						<button type="button" class="btn btn-group btn-info"><i class="fas fa-calendar-alt"></i></button>
					</div>
					<input type="submit" name="ShowCalendarBtn" value="Hiện lịch" class="btn btn-info">
				</div>
					
			</div>
		</div>
	</form>


	<form method="post" action="/confirmAppointment">
		{{csrf_field()}}
		
		@if($ShowVar == 1)
		<div class="TimeBox row">
			
			<input type="text" style="display: none;"  name="chosenTime">
			
			<input type="text" style="display: none;" name="chosenDate" value="{{$dateValue}}"> 
			@foreach($ServingHours as $key => $value)
			<div class="time col-lg-2 col-md-3 col-sm-4 col-6" data-checkQuantity="{{$value['isDisable']}}" onclick="choose(this)">{{$key}}</div>
			@endforeach
		</div>
		@endif

		<div id="btnSubmit">
			<input type="button" onclick="SubmitAppointmentForm()" class="btn btn-info" value="Đặt lịch">
			<input type="submit" name="confirmAppointment" style="display: none;">
		</div>
	</form>

</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>


<script>

	$(document).ready(function() {
		var times = $('.time');
		for (var i = 0; i < times.length; i++) {
			if(times[i].getAttribute("data-checkQuantity") =="true"){
				times[i].className+=" disableTime";
			}
		}

	});
	
	function choose(e) {
		var times = $('.time');
		for (var i = 0; i < times.length; i++) {
			times[i].className=times[i].className.replace(" selected","");
		}
		$(e).addClass('selected')
	}

	function SubmitAppointmentForm(){
		var appointmentTime = $('.time.selected');
		if(appointmentTime.length==0){
			alert("Chưa chọn giờ khám");
		}
		else{
			$('input[name="chosenTime"]').val(appointmentTime.text());
			event.target.parentNode.querySelector('input[name="confirmAppointment"]').click();
		}
	}

	$(function () {  
		$("#datepicker").datepicker({         
			autoclose: true,         
			todayHighlight: true 
		}).datepicker('update', new Date());
	});

</script>
@endsection