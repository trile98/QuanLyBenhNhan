@extends('giaodien::layoutMaster')

@section('content')
<div class="appointment-content">
	<form method="post">
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
					<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
						<input class="form-control" type="text" name="date">
						<button class="btn btn-group btn-info"><i class="fas fa-calendar-alt"></i></button>
					</div>
				</div>

			</div>
		</div>

		<div class="TimeBox row" data-StartTime = "{{$WorkingTime['StartTime']}}" data-CloseTime = "{{$WorkingTime['CloseTime']}}" data-SpaceTime = "{{$WorkingTime['SpaceTime']}}">

		</div>

		<div id="btnSubmit"><input type="submit" name="" class="btn btn-info" value="Đặt lịch"></div>
	</form>

</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>


<script>


	$(document).ready(function() {
		SetUpTimeBox();
	});

	function SetUpTimeBox(){
		var StartTime=$('.TimeBox').attr('data-StartTime');
		var CloseTime=$('.TimeBox').attr('data-CloseTime');
		var SpaceTime=$('.TimeBox').attr('data-SpaceTime');

		//check số không có phần min vd: 7,8,...
		if (!CloseTime.includes(':')) {
			CloseTime += ":00";
		}

		var StartTimeOfBlock,EndTimeOfBlock;
		StartTimeOfBlock=StartTime;
		EndTimeOfBlock=" ";

		do{
			EndTimeOfBlock=TimeCalculate(StartTimeOfBlock,CloseTime,SpaceTime);
			//Thêm tag li 
			var node = document.createElement("DIV");
			node.className = "time col-lg-2 col-md-3 col-sm-4 col-6";
			node.setAttribute('onclick', 'choose(this)');
			var text = document.createTextNode(StartTimeOfBlock+" - "+EndTimeOfBlock);
			node.appendChild(text);
			document.querySelector('.TimeBox').appendChild(node);
			//gán thời gian bắt đầu cho block tiếp theo;
			StartTimeOfBlock = EndTimeOfBlock;

		}
		while (EndTimeOfBlock!=CloseTime);
	}

	function TimeCalculate(Start, Close, Space){
		//check số không có phần min vd: 7,8,...
		if (!Start.includes(':')) {
			Start += ":00";
		}

		var EndHour, EndMin,arr_EndTime;
		//tách phần hour và min trong một giờ
		arr_EndTime = Close.split(":");
		EndHour = parseInt( arr_EndTime[0]);
		EndMin = parseInt( arr_EndTime[1]);

		var hour, min,arr_StartTime;
		//tách phần hour và min trong một giờ
		arr_StartTime = Start.split(":");
		hour = parseInt( arr_StartTime[0]);
		min = parseInt( arr_StartTime[1]);

		hour += Math.floor(Space/60);
		min += Space%60;

		//object để check lại phút có lớn hơn 60 hay không
		var objTime = {h:hour,m:min};
		CheckTime(objTime);

		//check block kết thúc
		if(objTime.h==EndHour && objTime.m>EndMin){
			objTime.h=EndHour;
			objTime.m=EndMin;
		}

		var EndTimeOfBlock;
		if(objTime.m==0)
			EndTimeOfBlock = objTime.h +":00";
		else
			EndTimeOfBlock = objTime.h +":"+ objTime.m;
		return EndTimeOfBlock;
	}

	function CheckTime(obj){
		if(obj.m>=60){
			obj.h += Math.floor(obj.m/60);
			obj.m = obj.m%60;
		}
	}

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