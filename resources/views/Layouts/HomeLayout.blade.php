<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Health Lab - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/assets/User/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/assets/User/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/User/css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="/assets/User/css/pogo-slider.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="/assets/User/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/assets/User/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/User/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
    @include('includes.header');

    @yield('content');

    @include('includes.footer');
    <a href="#" id="scroll-to-top" class="new-btn-d br-2"><i class="fa fa-angle-up"></i></a>

	<!-- ALL JS FILES -->
	<script src="{{asset('assets/User/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/User/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/User/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('assets/User/js/jquery.pogo-slider.min.js')}}"></script> 
	<script src="{{asset('assets/User/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('assets/User/js/slider-index.js')}}"></script>
	<script src="{{asset('assets/User/js/smoothscroll.js')}}"></script>
	<script src="{{asset('assets/User/js/TweenMax.min.js')}}"></script>
	<script src="{{asset('assets/User/js/main.js')}}"></script>
	<script src="{{asset('assets/User/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/User/js/form-validator.min.js')}}"></script>
    <script src="{{asset('assets/User/js/contact-form-script.js')}}"></script>
	<script src="{{asset('assets/User/js/isotope.min.js')}}"></script>	
	<script src="{{asset('assets/User/js/images-loded.min.js')}}"></script>	
    <script src="{{asset('assets/User/js/custom.js')}}"></script>
</body>
</html>

