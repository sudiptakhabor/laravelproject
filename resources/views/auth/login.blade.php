@extends('admin.layouts.master2')
@section('title', 'Login')
@section('content')
<div class="page-banner">
        <img src="frontend/images/contact/breadcrum-image.png" alt="breadcrum-header">
        <h2> Login </h2>
    </div>
        <!--page-breadcrumb -->
    <div class="page-breadcrumb no-padding">
        <div class="container">
            <h6>Login</h6>
            <ol class="breadcrumb pull-right">
                <li><a href="/">Home</a></li>
                <li class="active">Login</li>
            </ol>
        </div>
                                    
    </div>
    <!-- page-breadcrumb -->





    <!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="text-center w-75 m-auto">
                    <h3> Login </h3></div>

                    <!-- Include Flash Messages -->
                    @include('admin.inc.message')



    <div class="send-us-mail">
        <!-- Section Header -->
        <div class="section-header">
            <h2>Enter your email address and password to access admin panel.</h2>
        </div>
        <!-- Section Header /- -->
    
        <!-- contact-form -->
        <div class="container">
            <div class="row">
            <div id="contact" class="col-md-5 col-sm-5 col-md-push-3 contact-form">
 <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div id="alert-msg" class="alert-msg"></div>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><img src="frontend/images/icon/user.png" alt="user"></span>
                        <select class="form-control " id="roleid" name="roleid" required="" autofocus="">
                         
                                        <option value="">Role</option>
                                        @foreach(App\Role::all() as $row)
                                          <option value="{{$row->id}}">{{$row->name}}</option>
                                      @endforeach
                                    </select>
                                        
                    </div>
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address" * aria-describedby="sizing-addon2" autofocus>

                              @error('email')
                                    
                                      <span >
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                       
                    </div>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-lock"></i></span>
                                                    <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="sizing-addon3" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                            </div>
                       
                    </div>
                    
                    <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember">

                                    <label class="custom-control-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                    <br>
        
                    <input class="btn btn-default send-message" type="submit" value="Login" />
                </form>
            </div>
            </div>
            
            
        </div>
    </div>
    <!--contact-form -->
    
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
                                <a href="#"><img src="images/footer/popular-post-1.png" alt="popular-post" /></a>
                            </div>
                            <div class="col-md-9 col-sm-10 col-xs-10">
                                <a href="#" class="post-title">Knee Replacement</a>
                                <p>Flatnin' the hills Someday the mountain might get ‘em but the law never</p>
                            </div>
                        </li>
                        <li>
                            <div class="col-md-3 col-sm-2 col-xs-2">
                                <a href="#"><img src="images/footer/popular-post-2.png" alt="popular-post" /></a>
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
                            <button class="btn btn-default" type="button"><img src="images/footer/email-newsletter-icon.png" alt="email-newsletter-icon" /></button>
                        </span>
                    </div><!-- /input-group -->
                </aside>
            </div><!-- col-md-4 /- -->
        </div><!-- container /- -->


                    <!--
                </div>

                <div class="card-body">

                    <div class="text-center w-75 m-auto">
                       
                        <div class="send-us-mail">
        <!-- Section Header -->
       
            <h3>Enter your email address and password to access admin panel.</h3>
      <!--
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        
                        <div class="form-group row">

                        		<label for="roleid" class="col-md-4 col-form-label text-md-right">Role</label>
                        		
                        		<div class="col-md-6">
                            		<select class="form-control " id="roleid" name="roleid" required="" autofocus="">
                            		    <option value="">Select</option>
                            		    @foreach(App\Role::all() as $row)
                                          <option value="{{$row->id}}">{{$row->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                @if (Route::has('register'))
                                <p class="text-muted"></p>
                                <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
