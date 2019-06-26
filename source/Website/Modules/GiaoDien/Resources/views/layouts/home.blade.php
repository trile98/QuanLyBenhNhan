@extends('giaodien::layoutMaster')

@section('content')
<div class="slider">
	<div><img src="/images/background/thuoc-nam-bg-1.jpg"></div>
	<div><img src="/images/background/thuoc-nam-bg-3.jpg"></div>
	<div><img src="/images/background/thuoc-nam-bg-4.jpg"></div>
</div>

<div class="home-body">

	<div class="mainTitle">
		<div class="mainTitleLine"></div><h3>Các thông tin hữu ích</h3><div class="mainTitleLine"></div>
	</div>
	<div class="row mainArticle mt-2 mx-4">
		<div class="col-lg-4 col-md-4 col-sm-12 col-12"><img src="/images/background/cac-cay-thuoc-nam.jpg"></div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
			<h3>Tổng hợp các cây thuốc nam tăng cường sinh lý nam giới</h3>
			<!-- <p>blab blab blab...</p> -->
		</div>
	</div>

	<div class="line"></div>

	<div class="article-slider m-3">
		<div class="container">
			<div class="row mt-2 mx-4">
				<div class="col-4"><img src="/images/background/thi_la.jpg"></div>
				<div class="col-8">
					<h5>10 cây thuốc tốt quanh nhà bạn</h5> 
					<!-- <p>blab blab blab...</p> -->
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row mt-2 mx-4">
				<div class="col-4"><img src="/images/background/thuoc-nam-xuong-khop.jpg"></div>
				<div class="col-8">
					<h5>5 loại cây thuốc nam chữa bệnh đau nhức xương khớp cực hay</h5>
					<!-- <p>blab blab blab...</p> -->
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row mt-2 mx-4">
				<div class="col-4"><img src="/images/background/sam-ngoc-linh.jpg"></div>
				<div class="col-8">
					<h5>Bài thuốc chữa đau dạ dày</h5>
					<!-- <p>blab blab blab...</p> -->
				</div>
			</div>
		</div>
	</div>
	<div class="article-slider-arrow">
		<span class="prev"><i class="fas fa-chevron-circle-left"></i></span>
		<span class="next"><i class="fas fa-chevron-circle-right"></i></span>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('.slider').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows:false,
			dots:true,
		});

		$('.article-slider').slick({
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows:false
		});
	});

	$('.prev').click(function(){
		$('.article-slider').slick('slickPrev');
	})

	$('.next').click(function(){
		$('.article-slider').slick('slickNext');
	})

	//when the slick slide initializes we want to set all of our slides to the same height
	$('.slider').on('setPosition', function () {
		jbResizeSlider();
	});

	//we need to maintain a set height when a resize event occurs.
	//Some events will through a resize trigger: $(window).trigger('resize');
	$(window).on('resize', function(e) {
		jbResizeSlider();
	});

	//since multiple events can trigger a slider adjustment, we will control that adjustment here
	function jbResizeSlider(){
		$slickSlider = $('.slider');
		$slickSlider.find('.slick-slide').height('auto');

		var slickTrack = $slickSlider.find('.slick-track');
		var slickTrackHeight = $(slickTrack).height();

		$slickSlider.find('.slick-slide').css('height', slickTrackHeight + 'px');
	}

</script>
@endsection