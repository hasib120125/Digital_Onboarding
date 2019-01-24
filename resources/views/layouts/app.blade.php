<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digital On Boarding') }}</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS STARTS -->
    <link rel="stylesheet" href="{{asset('assets/fonts/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/alert.css')}}">
    @stack('styles')
    
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <!-- JS STARTS -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/materialize.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @stack('scripts')
    
    <!-- JS ENDS -->
    <script>
        var timeout
        function refresh(){
            clearTimeout(timeout)
            timeout = setTimeout(() => {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                location.reload()
                }
            };
            xhttp.open("POST", "/logout", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("_token={{csrf_token() }}");
            }, {{ (config('session.lifetime')-10) * 60 * 1000 }})
        }
        refresh()
        document.addEventListener('click', refresh)
    </script>
</body>
</html>
