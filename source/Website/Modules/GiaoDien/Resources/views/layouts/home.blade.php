@extends('giaodien::layoutMaster')

@section('content')
<div class="slider">
	<div><img src="/images/background/thuoc-nam-bg-1.jpg"></div>
	<div><img src="/images/background/thuoc-nam-bg-1.jpg"></div>
	<div><img src="/images/background/thuoc-nam-bg-1.jpg"></div>
</div>

<!-- <div class=""> -->
	<div class="row mainArticle mt-2 mx-4">
		<div class="col-lg-4 col-md-4 col-sm-12 col-12"><img src="/images/background/thuoc-nam-bg-1.jpg"></div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
			<h3>Main article</h3>
			<p>blab blab blab...</p>
		</div>
	</div>

	<div class="article-slider m-3">
		<div class="container">
			<div class="row mt-2 mx-4">
				<div class="col-4"><img src="/images/background/thuoc-nam-bg-1.jpg"></div>
				<div class="col-8">
					<h3>Aarticle 1</h3>
					<p>blab blab blab...</p>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row mt-2 mx-4">
				<div class="col-4"><img src="/images/background/thuoc-nam-bg-1.jpg"></div>
				<div class="col-8">
					<h3>Aarticle 2</h3>
					<p>blab blab blab...</p>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row mt-2 mx-4">
				<div class="col-4"><img src="/images/background/thuoc-nam-bg-1.jpg"></div>
				<div class="col-8">
					<h3>Aarticle 3</h3>
					<p>blab blab blab...</p>
				</div>
			</div>
		</div>

	</div>
<!-- </div> -->


<script type="text/javascript">
	$(document).ready(function() {
		$('.slider').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows:true,
		});

		$('.article-slider').slick({
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows:true,
		});
	});


</script>
@endsection