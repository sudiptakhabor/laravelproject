@extends('layouts.master')
@section('title', 'Home')
@section('content')

<!-- Slider Section -->
<div id="slider-section" class="slider-section slider2">
	<!-- slider1-container -->
	<div id="slider1_container" class="slider2-container">
		<!-- Slides Container -->
		<div data-u="slides" class="slides-new">
			<div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="full-box-inner">
								<div class="image-box">
									<img src="{{ asset('frontend/images/orthopaedic.jpeg') }}" alt="home 2 slide" />
									<a href="#" class="add-sign-big color-green"><img src="{{ asset('frontend/images/icon/big-plus.png') }}" alt="big-plus" /></a>
								</div>

								<div class="box-content">
									<a href="#" class="block-title">Manuscript Title Here</a>
									<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- item /- -->

			<div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="full-box-inner">
								<div class="image-box">
									<img src="{{ asset('frontend/images/orthopaedic.jpeg') }}" alt="home 2 slide" />
									<a href="#" class="add-sign-big color-green"><img src="{{ asset('frontend/images/icon/big-plus.png') }}" alt="big-plus" /></a>
								</div>

								<div class="box-content">
									<a href="#" class="block-title">Manuscript Title Here</a>
									<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- item 2 /- -->

			<div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="full-box-inner">
								<div class="image-box">
									<img src="{{ asset('frontend/images/orthopaedic.jpeg') }}" alt="home 2 slide" />
									<a href="#" class="add-sign-big color-green"><img src="{{ asset('frontend/images/icon/big-plus.png') }}" alt="big-plus" /></a>
								</div>

								<div class="box-content">
									<a href="#" class="block-title">Manuscript Title Here </a>
									<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- item 3 /- -->            
		</div>

		<!-- Arrow Left -->
		<span data-u="arrowleft" class="jssora13l">
			<i class="fa fa-angle-left"></i>
		</span>
		<!-- Arrow Right -->
		<span data-u="arrowright" class="jssora13r">
			<i class="fa fa-angle-right"></i>
		</span>
	</div><!-- slider-container1 /- -->

	<div id="carousel-slider1" class="carousal-slider1 slider2">		
		<div id="full-carousel" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="full-box-inner">
									<div class="image-box">
										<img src="{{ asset('frontend/images/orthopaedic.jpeg') }}" alt="home 2 slide" />
										<a href="#" class="add-sign-big color-green"><img src="{{ asset('frontend/images/icon/big-plus.png') }}" alt="big-plus" /></a>
									</div>

									<div class="box-content">
										<a href="#" class="block-title">Manuscript Title Here </a>
										<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>					

				<div class="item">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="full-box-inner">
									<div class="image-box">
										<img src="{{ asset('frontend/images/orthopaedic.jpeg') }}" alt="home 2 slide" />
										<a href="#" class="add-sign-big color-green"><img src="{{ asset('frontend/images/icon/big-plus.png') }}" alt="big-plus" /></a>
									</div>

									<div class="box-content">
										<a href="#" class="block-title">Manuscript Title Here </a>
										<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#full-carousel" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#full-carousel" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>	 
	</div>
</div>
<!-- Slider Section /- -->

<div class="container"> 
	<div class="row">
		<div class="col-md-12"> 
			<!-- Adds -->
			<div class="add-show">
				<div class="container">
					<div class="row">
						<div class="col-md-12"><a href="#"><img src="{{ asset('frontend/images/adds-2.png') }}" alt="adds" /></a></div>
					</div>
				</div>
			</div><!-- Adds /- -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> 
			<h2 class="text-center">Latest Journals</h2>
		</div>
	</div>
	<div class="row">
		<?php
			// code for shortening the big content fetched from database
			function textShorten($text, $limit = 200)
			{
				$text = $text . ' ';
				$text = substr($text, 0, $limit);
				$text = substr($text, 0, strrpos($text, ' '));
				$text = $text;
				return $text;
			}

		?> 
		@foreach ($articles as $article) 
			<div class="col-md-4"> 
				<div class="full-box-inner">
					<div class="box-content">
						<div class="card">
							@if (!empty($article->video_id))
								<iframe class="card-img-top" style="width:100%;;height: 200px;"
								src="https://www.youtube.com/embed/{{ $article->video_id }}?rel=0"
								allowfullscreen></iframe>
							@elseif(is_file('uploads/article/'.$article->image_path))
								<img class="card-img-top" style="width:100%;height: 200px;" src="{{ asset('uploads/article/' . $article->image_path) }}"
								alt="Article">
							@else 
								<img class="card-img-top" style="width:100%;height: 200px;" src="{{ asset('frontend/images/knee.jpeg') }}" alt="full post">
							@endif

							<a class="add-sign-big color-green-dark" href="{{ URL('/article/' . $article->id) }}"><img alt="big-plus" src="{{ asset('frontend/images/icon/big-plus.png') }}"></a> 
							 
							<div class="card-body">
								<h5 class="card-title">{{ $article->title }}</h5>
								<p class="card-text"><i class="fa fa-clock-o"></i>{{ $article->author }}</p>
								<!-- <p class="card-text">{!! textShorten($article->description) !!}...</p> -->
								<a href="{{ URL('/article/' . $article->id) }}" class="btn btn-warning">Read More</a>
							</div>
						</div>  
					</div>  
				</div>  
			</div><!-- col-md-8 /- --> 
		@endforeach 
	</div>
</div>


 
@endsection
