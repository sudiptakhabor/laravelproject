@extends('layouts.master')
@section('title', 'Contact')
@section('content')

<style>
/********** 2.4.4 Contact**********/
.contact-form {
	max-width: 825px;
	margin:29px auto 0;
}
.laread-contact {
	text-align: center;
	padding-top: 50px;
}

.icon-contact {
	background-color: #ffd23d;
	display: block;
	height: 216px;
	border: solid 4px #fff;
	line-height: 246px;
	border-radius: 150px;
	width: 216px;
	margin: 0 auto;
}
.icon-contact i {
	font-size: 75px;
	color: #fff;
}
.contact-info h2 {
	color: #5e9cea;
	font-size: 28px;
	margin-bottom: 30px;
}
.text-contact {
	color: #909091;
	font-size: 17px;
	margin-bottom: 6px;
}
.text-contact > a {
	color: #909091;
	margin-left: 10px;
}
a.text-contact i,
.text-contact > a > i {
	padding-right: 5px;
}
a.text-contact:hover,
.text-contact > a:hover {
	color: #a28671;
}
.text-contact i + i {
	margin-left: 10px;
}

.contact-form .contact-input {
	border: solid 1px #d7d7d7;
	width: 370px;
	height: 46px;
	padding: 0 20px;
	color: #787878;
	margin: 15px;
	-webkit-appearance: none;
	border-radius: 0;
}
.contact-form .contact-textarea {
	border: solid 2px #d7d7d7;
	width: 770px;
	height: 220px;
	padding: 15px 20px;
	color: #787878;
	margin: 15px;
	resize: none;
	-webkit-appearance: none;
	border-radius: 0;
}

.contact-form button.btn {
	display: block;
	margin: 0 auto;
	padding: 0;
	width: 250px;
	height: 70px;
	-webkit-tap-highlight-color: transparent;
	-webkit-transition: background-color 0.3s, color 0.3s, width 0.3s, border-width 0.3s, border-color 0.3s;
	transition: background-color 0.3s, color 0.3s, width 0.3s, border-width 0.3s, border-color 0.3s;
}
.contact-form button.btn:focus {
	outline: none;
}
    
/********** 2.4.4 Contact**********/
</style>
<div class="send-us-mail">
		<!-- Section Header -->
		<div class="section-header">
			<h2>send us mail</h2>
		</div>

<!-- contact-form -->
		<div class="container">
			<div class="col-md-offset-1 col-md-3 col-sm-5 no-padding contact-details">
				<div class="contact">	
					<div class="col-md-3 col-sm-2 col-xs-2 no-padding">
						<img src="frontend/images/icon/home-icon.png" alt="home-icon">
					</div>
					<div class="col-md-9 col-sm-10 col-xs-10 contact-list">
						<h3> Address</h3>
						@foreach( $settings as $setting )
						<p class="text-contact"><i class="fa fa-map-marker"></i>	{{ $setting->contact_address }}
						</p>
					</div>
				</div>
				<div class="contact">	
					<div class="col-md-3 col-sm-2 col-xs-2 no-padding">
						<img src="frontend/images/icon/telephone-icon.png" alt="telephone-icon">
					</div>
					<div class="col-md-9 col-sm-10 col-xs-10 contact-list">
						<h3> Telephone</h3>
						<p class="text-contact"><i class="fa fa-phone"></i>  
							{{ $setting->phone_one }}, {{ $setting->phone_two }}
						</p>
					</div>
				</div>
				<div class="contact">	
					<div class="col-md-3 col-sm-2 col-xs-2 no-padding">
						<img src="frontend/images/icon/e-mail-icon.png" alt="e-mail-icon">
					</div>
					<div class="col-md-9 col-sm-10 col-xs-10 contact-list">
						<h3>E-Mail Address </h3>
						<p class="text-contact"><i class="fa fa-envelope"></i>  
							{{ $setting->email_one }}, {{ $setting->email_two }}
						</p>
					</div>
				</div>
				<div class="contact">	
					<div class="col-md-3 col-sm-2 col-xs-2 no-padding">
						<img src="frontend/images/icon/url-icon.png" alt="website-icon">
					</div>
					<div class="col-md-9 col-sm-10 col-xs-10  contact-list">
						<h3>Website</h3>
						<p> www.journalofjointreplacement<br>.com</p>
					</div>
				</div>
			</div>
			@endforeach

			<div id="contact" class="col-md-7 col-sm-7 contact-form">
				<form  action="{{ URL('/contact') }}" method="post">
							@csrf
					<div id="alert-msg" class="alert-msg"></div>
					<div class="input-group input-group-lg">
						<span class="input-group-addon" id="sizing-addon1"><img src="frontend/images/icon/user.png" alt="user"></span>
						
					
					<input class="form-control" aria-describedby="sizing-addon1" type="text" name="name" placeholder="Your name*" required></div>
					<div class="input-group input-group-lg ">
						<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
						<input class="form-control" type="email"aria-describedby="sizing-addon2" name="email" placeholder="Your email*" required>
						
					</div>
					<div class="input-group input-group-lg">
						<span class="input-group-addon" id="sizing-addon3"><i class="fa fa-phone"></i></span>
                        <input class="form-control" type="text" aria-describedby="sizing-addon3" name="phone" placeholder="Your phone">
						
					</div>
					<div class="input-group input-group-lg textarea-control">
						<span class="input-group-addon" id="sizing-addon4"><i class="fa fa-pencil"></i></span>
						<textarea class="form-control" name="message" rows="6" placeholder="Your message" required></textarea>

						
					</div>
		           <div class="clearfix">
									<div class="progress-button">
										<p>
										<button type="submit" class="btn btn-default send-message"><span>SEND MESSAGE</span></button>
										</p>
									</div>
								</div>
					
				</form>
			</div>
		</div>
	</div>
	<!--contact-form -->

		<!--<section class="post-fluid">
			<div class="container-fluid">
				<div class="row laread-contact">
					<div class="contact-box">
						<span class="icon-contact"><i class="fa fa-paper-plane"></i></span>
					</div>
					<div class="contact-info">
						<h2>Contact</h2>
						@foreach( $settings as $setting )
						<p class="text-contact"><i class="fa fa-map-marker"></i>	{{ $setting->contact_address }}
						</p>
						<p class="text-contact"><i class="fa fa-envelope"></i>  
							{{ $setting->email_one }}, {{ $setting->email_two }}
						</p>
						<p class="text-contact"><i class="fa fa-phone"></i>  
							{{ $setting->phone_one }}, {{ $setting->phone_two }}
						</p>
						@endforeach



						<div class="contact-form">

							<!-- Message Display -->

				            @if(Session::has('success'))
				            <p class="bg-success">{{ Session::get('success') }}</p>
				            @endif

				            <!-- Message Display -->
				            @if(Session::has('error'))
				            <p class="bg-danger">{{ Session::get('error') }}</p>
				            @endif

				            <!-- Error Display -->
				            @if ($errors->any())
					            @foreach ($errors->all() as $error)
					            <p class="bg-danger">{{ $error }}</p>
					            @endforeach
				            @endif

			            <!--
							<form  action="{{ URL('/contact') }}" method="post">
							@csrf
								<input class="contact-input" type="text" name="name" placeholder="Your name*" required>

								<input class="contact-input" type="email" name="email" placeholder="Your email*" required>

								<input class="contact-input" type="text" name="phone" placeholder="Your phone">

								<input class="contact-input" type="text" name="subject" placeholder="Subject*" required>

								<textarea class="contact-textarea" name="message" placeholder="Your message" required></textarea>

								<div class="clearfix">
									<div class="progress-button">
										<p>
										<button type="submit" class="btn btn-grey btn-outline"><span>SEND</span></button>
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
-->
			<!--<div class="container-fluid">
				<div class="row become-author">
					<h5>Become an author</h5>
					
					  @guest
			          <a href="#" data-toggle="modal" data-target="#login-form"><i class="fa fa-pencil-square-o"></i></a>
			          @else
			          <a href="{{ URL('/dashboard') }}" target="_blank"><i class="fa fa-pencil-square-o"></i></a>
			          @endguest
				</div>
			</div> -->

		</section>

@endsection