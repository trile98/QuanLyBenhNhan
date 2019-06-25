@extends('giaodien::layoutMaster')

@section('content')
<div class="DetailContent">
	<!-- detailTab links -->
<div class="detailTab">
  <button class="detailTablinks default" onclick="openTab(event, 'detail')">Thông tin chi tiết</button>
  <button class="detailTablinks" onclick="openTab(event, 'article')">Các bài đã viết</button>
  <!-- <button class="detailTablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> -->
</div>

<!-- detailTab content -->
<div id="detail" class="detailTabcontent">
  <div class="row">
  	<div class="col-6">
  		<h6>Họ</h6>
  		<h6>Tên</h6>
  		<h6>Email</h6>
  	</div>
  	<div class="col-6">
  		{{$user->family_name}}<br>{{$user->given_name}}<br>{{$user->email}}
  	</div>
  </div>
</div>

<div id="article" class="detailTabcontent">
  @if($articles!=null)
	@foreach($articles as $key=>$article)
		<a href="#">{{$article['title']}}</a>
	@endforeach

  @else
  <label>Hiện bạn chưa có bài viết nào</label>

  @endif

</div>

<!-- <div id="Tokyo" class="detailTabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div> -->
</div>
<script type="text/javascript" src="/js/DetailTab.js"></script>
@endsection