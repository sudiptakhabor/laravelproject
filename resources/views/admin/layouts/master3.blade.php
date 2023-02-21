

<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="Coderthemes" name="author" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		@foreach( $settings as $setting )
		<!-- App Title -->
		<title>@yield('title') | {{ $setting->title }}</title>
		<!-- App favicon -->
		<link rel="shortcut icon" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}">
		@endforeach
		@if(empty($setting))
		<!-- App Title -->
		<title>@yield('title')</title>
		@endif
		<!-- App css -->
		<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/css/all.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/css/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
		<!-- third party css -->
		<link href="{{ asset('backend/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/css/vendor/switchery.min.css') }}" rel="stylesheet" type="text/css" />
		<!-- third party css end -->
		<link href="{{ asset('backend/css/app.css') }}" rel="stylesheet" type="text/css" /><header id="header" class="header header2">
			 <linK href="{{ asset('frontend/libraries/owl-carousel/owl.theme.css') }}" rel="stylesheet" /> <!-- Core Owl Carousel CSS Theme  File  *	v1.3.3 -->
	<link href="{{ asset('frontend/libraries/flexslider/flexslider.css') }}" rel="stylesheet" /> <!-- flexslider -->
	<link href="libraries/fonts/font-awesome.min.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="{{ asset('frontend/libraries/fonts/font-awesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/libraries/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/components.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/media.css') }}" rel="stylesheet" />
    <link rel="apple-touch-icon" href="{{ asset('/uploads/setting/' . $setting->favicon_path) }}">
   
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="{{ asset('frontend/libraries/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <linK href="{{ asset('frontend/libraries/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
			</head>
	<body>
		<!-- Begin page -->
		<div id="wrapper">
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
					
								
										
					
						<!-- <form>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search...">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit">
										<i class="fe-search"></i>
									</button>
			
		
										
							
							<div class="navbar-custom admin-custom-menu">
					<ul class="list-unstyled topbar-right-menu float-right mb-0">
						<li class="nav-item">
							@if(isset($setting))
							<!-- LOGO -->
							<a class="nav-link" href="{{ URL::route('dashboard.index') }}" class="logo text-center mb-4">
								<span class="logo-lg">
									<img src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" alt="logo" height="20">
								</span> 
							</a>
							@endif
							@if(Request::is('dashboard*'))
								<!--- Sidemenu -->
								@include('admin.inc.sidebar')
								<!-- End Sidebar -->
								
							@endif
						</li> 
						<!-- Authentication Links -->
						@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
							@endif
							@else
								<li class="dropdown notification-list">
									<a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
										@if(isset(Auth::user()->image_path))
											<img src="{{ asset('/uploads/profile/'.Auth::user()->image_path) }}" onerror="this.onerror=null;this.src='/backend/images/users/user.png';" alt="user-image" class="rounded-circle">
										@else

											<img src="{{ asset('/backend/images/users/user.png') }}" alt="user-image" class="rounded-circle">
										@endif
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
										<!-- item-->
										<div class="dropdown-header noti-title">
											<h6 class="text-overflow m-0">Welcome !
												<small class="pro-user-name ml-1">
												{{ Auth::user()->name }}
												</small>
											</h6>
										</div>
										<!-- item-->
										<!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
											<i class="fe-user"></i>
											<span>My Account</span>
											</a> -->
										@can('isAdmin')
											<!-- item-->
											<a href="{{ URL::route('setting.index') }}" class="dropdown-item notify-item">
												<i class="fe-settings"></i>
												<span>Settings</span>
											</a>
										@endcan
										@can('isAuthor')
											<a href="{{ URL::route('author.profile.index') }}" class="dropdown-item notify-item">
												<i class="fas fa-users-cog"></i>
												<span>My Profile</span>
											</a>
										@endcan
										@can('isEditor')
											<a href="{{ URL::route('editor.profile.index') }}" class="dropdown-item notify-item">
												<i class="fas fa-users-cog"></i>
												<span>My Profile</span>
											</a>
										@endcan
										@can('isReviewer')
											<a href="{{ URL::route('reviewer.profile.index') }}" class="dropdown-item notify-item">
												<i class="fas fa-users-cog"></i>
												<span>My Profile</span>
											</a>
										@endcan
										@can('isPublisher')
											<a href="{{ URL::route('publisher.profile.index') }}" class="dropdown-item notify-item">
												<i class="fas fa-users-cog"></i>
												<span>My Profile</span>
											</a>
										@endcan
										<div class="dropdown-divider"></div>
										<!-- item-->
										<a href="javascript:void(0);" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
											<i class="fe-log-out"></i>
											<span>Logout</span>
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</div>
								</li>
						@endguest
					</ul>
					<button class="button-menu-mobile open-left disable-btn">
						<i class="fe-menu"></i>
					</button>
					<div class="app-search">
						<!-- <form>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search...">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit">
										<i class="fe-search"></i>
									</button>
								</div>
							</div>
						</form> -->
					</div>
				</div><!-- .nav-collapse /- -->
						</nav> <!-- nav /- -->						
					</div>
				</div>
			</div><!-- container /- -->
		</div><!-- menu-block /- -->
	</header>

	@yield('content')



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
						</div><div class="navbar-collapse collapse" id="footer-menu">
							<ul class="nav navbar-nav">
								<li><a href="{{ URL('/about') }}">About</a></li>
								<li><a href="{{ URL('/instruction') }}">Instructions for Author</a></li>
								<li><a href="{{ URL('/policy') }}">Policies</a></li>
								
							</ul>
						</div>
					</nav>
				</div>
			</div></div><!-- Footer Bootom /- -->
	</div>
	<!-- Footer Section /- -->


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