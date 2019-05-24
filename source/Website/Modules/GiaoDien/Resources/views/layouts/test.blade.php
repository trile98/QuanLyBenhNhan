@extends('giaodien::layoutMaster')

@section('content')
<div class="TimeBox row">
			<!-- @if($ShowVar == 1) -->
			@foreach($ServingHours as $key => $value)
			<div class="time col-lg-2 col-md-3 col-sm-4 col-6" onclick="choose(this)">{{$key}}</div>
			@endforeach
			<!-- @endif -->
		</div>
		@endsection