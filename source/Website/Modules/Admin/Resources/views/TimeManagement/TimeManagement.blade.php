@extends('admin::admin_design')
@section('content')
<div class="Time_Management_content container">
	<div class="contentTitle">
		Quản Lý > <span style="font-weight: bold; font-size: 20px;">Thời Gian Khám</span>
	</div>

	<div class="timepicker">
		<form method="post" action="/admin/Management/Time">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-12 timepickerTitle">
					<span style="font-weight: bold">Giờ bắt đầu</span>
				</div>
				<div class='col-lg-4 col-md-4 col-sm-12'>
					<div class="form-group">
						<div class='input-group date' style="width: 40%" id='starttimepicker'>
							<input type='text' class="form-control" name="StartTime" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-12 timepickerTitle">
					<span style="font-weight: bold">Giờ kết thúc</span>
				</div>
				<div class='col-lg-4 col-md-4 col-sm-12'>
					<div class="form-group">
						<div class='input-group date' style="width: 40%" id='endtimepicker'>
							<input type='text' class="form-control" name="CloseTime" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-12 timepickerTitle">
					<span style="font-weight: bold">Khoảng cách giữa các ca: </span>
				</div>
				<div class='col-lg-4 col-md-4 col-sm-12'>
					<div class="form-group">
						<div class='input-group date' style="width: 40%" id='endtimepicker'>
							<input type='text' class="form-control" list="duration" name="SpaceTime" />
							<span class="input-group-addon">Phút</span>
							<datalist id="duration">
								<!-- <option>15</option> -->
								<option>30</option>
								<!-- <option>45</option>
									<option>60</option> -->
								</datalist>
							</div>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-12 timepickerTitle">
						<span style="font-weight: bold">Ngày áp dụng: </span>
					</div>
					<div class='col-lg-4 col-md-4 col-sm-12'>
						<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy" style="width: 45%;"> <input class="form-control" readonly="" type="text" name="ApplyDate"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-0"></div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<input class="" value="Thay đổi" type="submit" name="TimeSubmit">
					</div>
				</div>

			</form>

		</div>

	</div>


	@endsection