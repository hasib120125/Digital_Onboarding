<!DOCTYPE html>
<html lang="en">
	<head>
		<title>@yield('page-title', 'Login')</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Place your description here">
		<meta name="keywords" content="Place your words here">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
        <meta name="author" content="">
        <meta charset="utf-8"/>
		
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
		<!-- Custom CSS -->
        <link href="{{ asset('assets/fonts/stylesheet.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
        <div class="login-wrap red-bg center">
            <div class="container">
                <a href="#" class="logo"><img src="{{asset('assets/images/logo-white.png')}}" alt="" /></a>
                <div class="welcome-text">
                    <h1>Welcome</h1>
                    <p>welcome to the biggest network of Bangladesh </p>
                </div>
                @yield('content')
            </div>
        </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="{{asset('assets/js/materialize.min.js')}}"></script>
		<script src="{{asset('assets/js/custom.js')}}"></script>
	</body>
</html>
