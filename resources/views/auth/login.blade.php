<!DOCTYPE html>
<html lang="en">
<head>
	<title>eMenu Restaurant</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--============-->	
	<link rel="icon" type="image/png" href="{{asset('assets/login/images/icons/favicon.png')}}"/>
    <!--============-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/bootstrap/css/bootstrap.min.css')}}">
    <!--============-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--============-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/main.css')}}">
    <!--============-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url({{asset('assets/login/images/bg-01.jpg')}})">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					eMenu Restaurant
                </span>
                <form  method="post" action="{{route('login')}}" class="login100-form validate-form p-b-33 p-t-5 login-form">
                @csrf
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" required placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" required name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
    <!--=========-->
	<script src="{{asset('assets/login/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--=========-->
	<script src="{{asset('assets/login/animsition/js/animsition.min.js')}}"></script>

	<!-- Sweet Alert Message Box -->
    <script src="{{ asset('assets/BackEnd/sweetAlert_script/sweetalert.min.js') }}"></script>
    <!-- Sweet Alert Message Box End -->

    @include('error_success_msg')
</body>
</html>