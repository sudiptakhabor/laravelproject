@extends('admin.layouts.master2')
@section('title', 'Register')
@section('content')



<!-- Page-Banner -->
    <div class="page-banner">
        <img src="frontend/images/contact/breadcrum-image.png" alt="breadcrum-header">
        <h2> Register </h2>
    </div>
    <!-- Page-Banner -->

    <!--page-breadcrumb -->
    <div class="page-breadcrumb no-padding">
        <div class="container">
            <h6>Register</h6>
            <ol class="breadcrumb pull-right">
                <li><a href="index.php">Home</a></li>
                <li class="active">Register</li>
            </ol>
        </div>
    </div>
    <!-- page-breadcrumb -->
    
    
    
    
    <div class="send-us-mail">
        <!-- Section Header -->
        <div class="section-header">
            <h2>Don't have an account? Create your account</h2>
        </div>
        <!-- Section Header /- -->
    
        <!-- contact-form -->
        <div class="container">
            <div class="row">
            <div id="contact" class="col-md-8 col-sm-8 col-md-push-2 contact-form">
               <form method="POST" action="{{ route('register') }}">
                        @csrf
                    
                    
                    <div class="row">
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <select class="form-control @error('user_type') is-invalid @enderror" id="user_type" name="user_type" required autofocus>
                                  <option value="">Select</option>
                                  <option value="W">Author</option>
                                  <option value="E">Editor</option>
                                  <option value="R">Reviewer</option>
                                  <option value="P">Publisher</option>
                                </select>

                                @error('firstname')
                                    
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                        
                    </div>
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                       
                         <input id="suffix" type="text" class="form-control @error('suffix') is-invalid @enderror"  placeholder="Suffix *" aria-describedby="sizing-addon2" name="suffix" value="{{ old('suffix') }}" required autocomplete="suffix" autofocus>

                                @error('suffix')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                    </div>
                    
                    </div>
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                       
                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="First Name *" value="{{ old('firstname') }}" required autocomplete="firstname" aria-describedby="sizing-addon2" autofocus>

                                @error('firstname')
                                   
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                    </div>
                    
                    </div>
                    
                        <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                        
                         <input id="lastname" placeholder="Last Name *"  type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" aria-describedby="sizing-addon2" autofocus>

                                @error('lastname')
                                   
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                    </div>
                    
                    </div>
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-graduation-cap"></i></span>
                        
                   
                     <input id="qualification" placeholder="Qualification *" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ old('qualification') }}" required autocomplete="qualification"aria-describedby="sizing-addon2" autofocus>

                                @error('qualification')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                    </div>
                    
                    </div>
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-map-marker"></i></span>
                      
                          <input id="affiliation" type="text" placeholder="Affiliation Name and Location *" aria-describedby="sizing-addon2" class="form-control @error('affiliation') is-invalid @enderror" name="affiliation" value="{{ old('affiliation') }}" required autocomplete="affiliation" autofocus>

                                @error('affiliation')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                    </div>
                    
                    </div>
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-plus"></i></span>
                    

                        <input id="academic" type="text" placeholder="Academic Institution/Hospital *" aria-describedby="sizing-addon2"  class="form-control @error('academic') is-invalid @enderror" name="academic" value="{{ old('academic') }}" required autocomplete="academic" autofocus>

                                @error('academic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                    </div>
                    
                    </div>
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-building"></i></span>
                      

                         <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" placeholder="Department/Specialization *" aria-describedby="sizing-addon2"  name="department" value="{{ old('department') }}" required autocomplete="department" autofocus>

                                @error('department')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                    </div>
                    
                    </div>
                    
                    <div class="form-group col-md-4">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-globe"></i></span>
                        <select name="country" id="country" class="form-control @error('country') is-invalid @enderror" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>

                                @error('country')
                                   
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                        
                    </div>
                    </div>
                    
                    <div class="form-group col-md-4">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-location-arrow"></i></span>
                        <select id="state" name="state" class="form-control @error('state') is-invalid @enderror" required>
                                    <option value="">Select State</option>
                                </select>
                                @error('state')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                    </div>
                    </div>
                    
                    
                    <div class="form-group col-md-4">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-university"></i></span>
                      <select id="city" name="city" class="form-control @error('city') is-invalid @enderror" required>
                                    <option value="">Select City</option>
                                </select>
                                @error('city')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                    </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                
                        <input id="idno" type="text" placeholder="Identification Number *" aria-describedby="sizing-addon2"  class="form-control @error('idno') is-invalid @enderror" name="idno" value="{{ old('idno') }}" required autocomplete="idno" autofocus>

                                @error('idno')
                                   
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                    </div>
                    
                    </div>
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                    

                        <input id="email"   placeholder="E-Mail Address *" aria-describedby="sizing-addon2"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                  
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                    </div>
                    
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                    
                   <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"  placeholder="Phone Number *" aria-describedby="sizing-addon2"  name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                   
                                        <strong>{{ $message }}</strong>
                                  
                                @enderror



                    </div>
                    
                    </div>
                    
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-unlock-alt"></i></span>
              
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password *" aria-describedby="sizing-addon2"   name="password" required autocomplete="new-password">

                                @error('password')
                                   
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                    
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                    <div class="input-group input-group-lg ">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-unlock-alt"></i></span>
                       
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password *" aria-describedby="sizing-addon2">
                    </div>
                    
                    </div>
                      <button type="submit" class="btn btn-default send-message">
                                    {{ __('Register') }}
                                </button>
                    
                    
                    </div>
                    
                    
                    
                    
                    
                </form>
            </div>
            </div>
            
            
        </div>
    </div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#country').on('change', function () {
                            var idCountry = this.value;
                            $("#state").html('');
                            
                            $.ajax({
                                url: "{{url('api/fetch-states')}}",
                                type: "POST",
                                data: {
                                    country_id: idCountry,
                                    _token: '{{csrf_token()}}'
                                },
                                dataType: 'json',
                                success: function (result) {
                                    console.log(result);
                                    $('#state').html('<option value="">Select State</option>');
                                    $.each(result.states, function (key, value) {
                                        $("#state").append('<option value="' + value
                                            .id + '">' + value.name + '</option>');
                                    });
                                    $('#city').html('<option value="">Select City</option>');
                                }
                            });
                        });
                        $('#state').on('change', function () {
                            var idState = this.value;
                            $("#city").html('');
                            $.ajax({
                                url: "{{url('api/fetch-cities')}}",
                                type: "POST",
                                data: {
                                    state_id: idState,
                                    _token: '{{csrf_token()}}'
                                },
                                dataType: 'json',
                                success: function (res) {
                                    $('#city').html('<option value="">Select City</option>');
                                    $.each(res.cities, function (key, value) {
                                        $("#city").append('<option value="' + value
                                            .id + '">' + value.name + '</option>');
                                    });
                                }
                            });
                        });
                    });
                </script>
    <!--contact-form -->

<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <div class="text-center w-75 m-auto">
                        @foreach( $settings as $setting )
                        <a href="{{ URL('/') }}">
                            <span><img src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" alt="" height="22"></span>
                        </a>
                        @endforeach
                        <p class="text-muted mb-4 mt-3">Don't have an account? Create your account</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                        		<label for="user_type">{{ __('User Type') }}</label>
                        		<select class="form-control @error('user_type') is-invalid @enderror" id="user_type" name="user_type" required autofocus>
                                  <option value="">Select</option>
                                  <option value="W">Author</option>
                                  <option value="E">Editor</option>
                                  <option value="R">Reviewer</option>
                                  <option value="P">Publisher</option>
                                </select>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	<div class="form-group col-md-6">
                              <label for="suffix">{{ __('Suffix') }}</label>
                               <input id="suffix" type="text" class="form-control @error('suffix') is-invalid @enderror" name="suffix" value="{{ old('suffix') }}" required autocomplete="suffix" autofocus>

                                @error('suffix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-row">
                        	<div class="form-group col-md-6">
                        		<label for="firstname">{{ __('First Name') }}</label>
                        		<input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	
                        	<div class="form-group col-md-6">
                              <label for="lastname">{{ __('Last Name') }}</label>
                               <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-row">
                        	<div class="form-group col-md-6">
                        		<label for="qualification">{{ __('Qualification') }}</label>
                        		<input id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ old('qualification') }}" required autocomplete="qualification" autofocus>

                                @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	
                        	<div class="form-group col-md-6">
                               <label for="affiliation">{{ __('Affiliation Name and Location') }}</label>
                               <input id="affiliation" type="text" class="form-control @error('affiliation') is-invalid @enderror" name="affiliation" value="{{ old('affiliation') }}" required autocomplete="affiliation" autofocus>

                                @error('affiliation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-row">
                        	<div class="form-group col-md-6">
                        		<label for="academic">{{ __('Academic Institution/Hospital') }}</label>
                        		<input id="academic" type="text" class="form-control @error('academic') is-invalid @enderror" name="academic" value="{{ old('academic') }}" required autocomplete="academic" autofocus>

                                @error('academic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                        	</div>
                        	
                        	<div class="form-group col-md-6">
                               <label for="department">{{ __('Department/Specialization') }}</label>
                               <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department" autofocus>

                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-row">
                        	<div class="form-group col-md-4">
                        		<label for="country">{{ __('Country') }}</label>
                        		<select name="country" id="country" class="form-control @error('country') is-invalid @enderror" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	
                        	<div class="form-group col-md-4">
                        		<label for="state">{{ __('Sate') }}</label>
                        		<select id="state" name="state" class="form-control @error('state') is-invalid @enderror" required>
                                    <option value="">Select State</option>
                                </select>
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	
                        	<div class="form-group col-md-4">
                        		<label for="city">{{ __('City') }}</label>
                        		<select id="city" name="city" class="form-control @error('city') is-invalid @enderror" required>
                                    <option value="">Select City</option>
                                </select>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	
                        </div>
                        
                        
                        <div class="form-row">
                        	<div class="form-group col-md-6">
                        		<label for="idno">{{ __('Identification Number') }}</label>
                        		<input id="idno" type="text" class="form-control @error('idno') is-invalid @enderror" name="idno" value="{{ old('idno') }}" required autocomplete="idno" autofocus>

                                @error('idno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	
                        </div>
                        
                        
                        <div class="form-row">
                        	<div class="form-group col-md-6">
                        		<label for="email">{{ __('E-Mail Address') }}</label>
                        		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	
                        	<div class="form-group col-md-6">
                        		<label for="phone">{{ __('Phone') }}</label>
                        		<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	
                        </div>
                        
                        
                         <div class="form-row">
                        	<div class="form-group col-md-6">
                        		<label for="password">{{ __('Password') }}</label>
                        		<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        	</div>
                        	
                        	<div class="form-group col-md-6">
                        		<label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        	</div>
                        	
                        </div>
                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#country').on('change', function () {
                            var idCountry = this.value;
                            $("#state").html('');
                            
                            $.ajax({
                                url: "{{url('api/fetch-states')}}",
                                type: "POST",
                                data: {
                                    country_id: idCountry,
                                    _token: '{{csrf_token()}}'
                                },
                                dataType: 'json',
                                success: function (result) {
                                    console.log(result);
                                    $('#state').html('<option value="">Select State</option>');
                                    $.each(result.states, function (key, value) {
                                        $("#state").append('<option value="' + value
                                            .id + '">' + value.name + '</option>');
                                    });
                                    $('#city').html('<option value="">Select City</option>');
                                }
                            });
                        });
                        $('#state').on('change', function () {
                            var idState = this.value;
                            $("#city").html('');
                            $.ajax({
                                url: "{{url('api/fetch-cities')}}",
                                type: "POST",
                                data: {
                                    state_id: idState,
                                    _token: '{{csrf_token()}}'
                                },
                                dataType: 'json',
                                success: function (res) {
                                    $('#city').html('<option value="">Select City</option>');
                                    $.each(res.cities, function (key, value) {
                                        $("#city").append('<option value="' + value
                                            .id + '">' + value.name + '</option>');
                                    });
                                }
                            });
                        });
                    });
                </script>
                
            </div>
        </div>
    </div>
</div>-->
@endsection


    