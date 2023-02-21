<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @foreach ($settings as $setting)
        <!-- App Title -->
        <title>@yield('title') | {{ $setting->title }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/uploads/setting/' . $setting->favicon_path) }}">
        <meta name="description" content="{{ $setting->description }}">
        <meta name="keywords" content="{{ $setting->keywords }}">
    @endforeach

    @if (empty($setting))
        <!-- App Title -->
        <title>@yield('title')</title>
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{ asset('/uploads/setting/' . $setting->favicon_path) }}">
   
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="{{ asset('frontend/libraries/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <linK href="{{ asset('frontend/libraries/owl-carousel/owl.carousel.css') }}" rel="stylesheet" /> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
    <linK href="{{ asset('frontend/libraries/owl-carousel/owl.theme.css') }}" rel="stylesheet" /> <!-- Core Owl Carousel CSS Theme  File  *	v1.3.3 -->
	<link href="{{ asset('frontend/libraries/flexslider/flexslider.css') }}" rel="stylesheet" /> <!-- flexslider -->
	<link href="libraries/fonts/font-awesome.min.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="{{ asset('frontend/libraries/fonts/font-awesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/libraries/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/components.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/media.css') }}" rel="stylesheet" />
</head>

<body data-offset="200" data-spy="scroll" data-target=".primary-navigation">
	<!-- LOADER -->
	<div id="site-loader" class="load-complete">
		<div class="load-position">
			<div class="logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"/></div>
			<h6>Please wait, loading...</h6>
			<div class="loading">
				<div class="loading-line"></div>
				<div class="loading-break loading-dot-1"></div>
				<div class="loading-break loading-dot-2"></div>
				<div class="loading-break loading-dot-3"></div>
			</div>
		</div>
	</div><!-- Loader /- -->
	
	<a id="top"></a>
	
	<header id="header" class="header header2">
		<!-- top-header -->
		<div class="top-header">
			<!-- container -->
			<div class="container">
				<div class="row">
					<div class="col-md-6 ow-left-padding">
						<div class="latest-update col-md-4 ow-right-padding">
							<h3>Latest Updates</h3>
						</div>
						<div class="col-md-8 latest-post-list">
							<div class="marquee-vert" data-speed="2000" data-direction="up">
								<a href="#"> New Updates Here</a>
								<a href="#"> News Here</a>
							</div>
						</div>
					</div>
					<div class="top-menu col-md-6 col-sm-6">
						<nav class="navbar navbar-default">						
							<div class="navbar-header">
								<button aria-controls="navbar" aria-expanded="false" data-target="#navbar2" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse" id="navbar2">
								<ul class="nav navbar-nav">
								    @guest
									<li><a href="{{ route('login') }}">Login</a></li>
									<li><a href="{{ route('register') }}">Register</a></li>
									
									 @else
									<li><a href="{{ URL('/dashboard') }}">Dashboard</a></li>
									<li><a href="{{ route('logout') }}"
											onclick="event.preventDefault();
																																													 document.getElementById('logout-form').submit();">Logout</a>
									</li>

									<form id="logout-form" action="{{ route('logout') }}" method="POST"
										style="display: none;">
										@csrf
									</form>
									@endguest
									<li class="{{ Request::path() == 'policy' ? 'current-menu-item' : '' }}"><a href="{{ URL('/policy') }}">Policies</a></li>
									<li class="{{ Request::path() == 'help' ? 'current-menu-item' : '' }}"><a href="{{ URL('/help') }}">Help</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div><!-- container /- -->
		</div><!-- top-header /- -->
		
		<!-- logo-add-block -->
		<div class="logo-add-block">
			<!-- container -->
			<div class="container">
				<div class="row">
					<div class="col-md-3 logo-block col-sm-3">
						<a href="{{ URL('/') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"></a>
					</div>
					<div class="col-md-9 add-block col-sm-9">
						<a href="{{ URL('/') }}"><img src="{{ asset('frontend/images/adds-2.png') }}" alt="adds" /></a>
					</div>
				</div>
			</div><!-- container /- -->
		</div><!-- logo-add-block /- -->
		
		<!-- menu-block -->
		<div class="menu-block">
			<!-- container -->
			<div class="container">
				<div class="row">
					<div class="col-md-3 search-follow ow-right-padding">
						@guest
                    		           <a href="{{ URL('/login') }}" class="follow"><i class="fa fa-plus"></i> Submit Manuscript</a>
                    		          @else
                    		           <a href="{{ URL('/dashboard') }}" class="follow"><i class="fa fa-plus"></i> Submit Manuscript</a>
                    		          @endguest
						
						
					</div>
					<div class="col-md-12">
						<nav class="navbar navbar-default">						
							<div class="navbar-header">
								<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a href="index"><img src="images/logom.png" alt="logo" /></a>
							</div>
							<div class="navbar-collapse collapse" id="navbar">
							    
								<ul class="nav navbar-nav">
									<li class="{{ Request::path() == '/' ? 'active' : '' }}">
										<a href="{{ URL('/') }}" ><i class="fa fa-home"></i></a>
										
									</li>							
									<li class="{{ Request::path() == 'about' ? 'active' : '' }}"><a href="{{ URL('/about') }}">About Us</a></li>
									<li class="{{ Request::path() == 'articles' ? 'active' : '' }}"><a href="{{ URL('/articles') }}">Articles</a></li>
									
									<li class="{{ Request::path() == 'overview' ? 'active' : '' }}"><a href="{{ URL('/overview') }}">Journal Overview</a></li>
									<li class="{{ Request::path() == 'instruction' ? 'active' : '' }}"><a href="{{ URL('/instruction') }}">Instructions For Author</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More</a>
										<ul class="dropdown-menu" role="menu">
											<li class="{{ Request::path() == 'editorial' ? 'active' : '' }}"><a href="{{ URL('/editorial') }}">Editorial Board</a></li>
													<li class="{{ Request::path() == 'contact' ? 'active' : '' }}"><a href="{{ URL('/contact') }}">Contact</a></li>	
										</ul>
									</li>

										
														
								</ul>
							</div><!-- .nav-collapse /- -->
						</nav> <!-- nav /- -->						
					</div>
				</div>
			</div><!-- container /- -->
		</div><!-- menu-block /- -->
	</header>
	
            
            <!-- Content Start -->
            @yield('content')
            <!-- Content End -->



	<!-- Footer Section -->
	<div id="footer-section" class="footer-section">
		<!-- container -->
		<div class="container">
			<!-- col-md-4 -->
			<div class="col-md-4">
				<aside class="widget widget_about_us">
					<h3 class="widget-title">About us</h3>
					<p>The Journal of Joint Replacement is the official journal of National Hip and Knee Joint Replacement Foundation (NKHJRF), started with the sole purpose of propagating authentic research in joint replacement.</p>
				</aside>
				<aside class="widget widget_social_icons">
					<h3 class="widget-title">Stay in touch</h3>
					<ul>
						<li><a href="#" target="_blank" class="fb"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" target="_blank" class="tw"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" target="_blank" class="gp"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#" target="_blank" class="lin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" target="_blank" class="dr"><i class="fa fa-instagram"></i></a></li>						
					</ul>
				</aside>
			</div><!-- col-md-4 /- -->
			<!-- col-md-4 -->
			<div class="col-md-4">
				<aside class="widget widget_latest_post">
					<h3 class="widget-title">Popular Post</h3>
					<ul class="post">
						<li>
							<div class="col-md-3 col-sm-2 col-xs-2">
								<a href="#"><img src="{{ asset('frontend/images/footer/popular-post-1.png') }}" alt="popular-post" /></a>
							</div>
							<div class="col-md-9 col-sm-10 col-xs-10">
								<a href="#" class="post-title">Knee Replacement</a>
								<p>Flatnin' the hills Someday the mountain might get ‘em but the law never</p>
							</div>
						</li>
						<li>
							<div class="col-md-3 col-sm-2 col-xs-2">
								<a href="#"><img src="{{ asset('frontend/images/footer/popular-post-2.png') }}" alt="popular-post" /></a>
							</div>
							<div class="col-md-9 col-sm-10 col-xs-10">
								<a href="#" class="post-title">Hip Replacement</a>
								<p>William Buck Rogers are blown out of their trajectory into an orbit</p>
							</div>
						</li>
						
					</ul>
				</aside>
			</div><!-- col-md-4 /- -->
			
			<!-- col-md-4 -->
			<div class="col-md-4">
				<aside class="widget widget_newsletter">
					<h3 class="widget-title">newsletter signup</h3>
					<p>Sign up to our newsletter and get exclusive deals you will not find anywhere else straight to your inbox!</p>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Enter Your E-mail">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><img src="{{ asset('frontend/images/footer/email-newsletter-icon.png') }} " alt="email-newsletter-icon" /></button>
						</span>
					</div><!-- /input-group -->
				</aside>
			</div><!-- col-md-4 /- -->
		</div><!-- container /- -->
		<!-- Footer Bootom -->
		<div class="footer-bottom">
			<div class="container">
				<div class="col-md-6 col-sm-6">
					<p>&copy; 2022 Journal of Joint Replacement | All Rights Reserved. </p>
				</div>
				<div class="col-md-6 col-sm-6">
					<nav class="navbar navbar-default">						
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#footer-menu" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="navbar-collapse collapse" id="footer-menu">
							<ul class="nav navbar-nav">
								<li><a href="{{ URL('/about') }}">About</a></li>
								<li><a href="{{ URL('/instruction') }}">Instructions for Author</a></li>
								<li><a href="{{ URL('/policy') }}">Policies</a></li>
								
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div><!-- Footer Bootom /- -->
	</div>
	<!-- Footer Section /- -->


    


	<!-- jQuery Include -->
	<script src="{{ asset('frontend/libraries/jquery.min.js') }}"></script>	
	<script src="{{ asset('frontend/libraries/jquery.easing.min.js') }}"></script><!-- Easing Animation Effect -->
	<script src="{{ asset('frontend/libraries/bootstrap/bootstrap.min.js') }}"></script> <!-- Core Bootstrap v3.2.0 -->
	<script src="{{ asset('frontend/libraries/jquery.animateNumber.min.js') }}"></script> <!-- Used for Animated Numbers -->
	<script src="{{ asset('frontend/libraries/jquery.appear.js') }}"></script> <!-- It Loads jQuery when element is appears -->
	<script src="{{ asset('frontend/libraries/jquery.knob.js') }}"></script> <!-- Used for Loading Circle -->
	<script src="{{ asset('frontend/libraries/wow.min.js') }}"></script> <!-- Use For Animation -->
	<script src="{{ asset('frontend/libraries/flexslider/jquery.flexslider-min.js') }}"></script> <!-- flexslider   -->
	<script src="{{ asset('frontend/libraries/owl-carousel/owl.carousel.min.js') }}"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
	<script src="{{ asset('frontend/libraries/expanding-search/modernizr.custom.js') }}"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
	<script src="{{ asset('frontend/libraries/expanding-search/classie.js') }}"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
	<script src="{{ asset('frontend/libraries/expanding-search/uisearch.js') }}"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
	<script>
		new UISearch( document.getElementById( 'sb-search' ) );
	</script>
	<script type="text/javascript" src="{{ asset('frontend/libraries/jssor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/libraries/jssor.slider.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/libraries/jquery.marquee.js') }}"></script>
	<!-- Customized Scripts -->
	<script src="{{ asset('frontend/js/functions.js') }}"></script>
    

</body>

</html>
