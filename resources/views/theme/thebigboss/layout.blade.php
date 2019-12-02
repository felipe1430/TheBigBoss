<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('titulo','TheBigBoos')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500,600,700&display=swap" rel="stylesheet">
    
 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{asset("assets/$theme2/plugins/fontawesome-free/css/all.min.css")}}">

 
   <script src="{{asset("assets/$theme/js/jqueryCalendar.js")}}"></script> 
 
    <link rel="stylesheet" href="{{asset("assets/$theme/css/open-iconic-bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/animate.css")}}">
    
    <link rel="stylesheet" href="{{asset("assets/$theme/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/magnific-popup.css")}}">

    <link rel="stylesheet" href="{{asset("assets/$theme/css/aos.css")}}">

    <link rel="stylesheet" href="{{asset("assets/$theme/css/ionicons.min.css")}}">

    <link rel="stylesheet" href="{{asset("assets/$theme/css/bootstrap-datepicker.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/jquery.timepicker.css")}}">

    
    <link rel="stylesheet" href="{{asset("assets/$theme/css/flaticon.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/icomoon.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/style.css")}}">
    @yield('style')
  </head>
  <body>
	<!-- inicio nav -->
	@include("theme/$theme/nav")
    <!-- END nav -->
    
    @yield('contenido')
	{{-- <section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container-fluid p-0">
		<div class="row no-gutters">
			

		</div>
	</div>
	</section> --}}

	<!-- INICIO FOOTER -->
	@include("theme/$theme/footer")  

	<!-- FIN FOOTER -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset("assets/$theme/js/jquery-migrate-3.0.1.min.js")}}"></script>
  <script src="{{asset("assets/$theme/js/popper.min.js")}}"></script>
  <script src="{{asset("assets/$theme/js/bootstrap.min.js")}}"></script>
  <script src="{{asset("assets/$theme/js/jquery.easing.1.3.js")}}"></script>
  <script src="{{asset("assets/$theme/js/jquery.waypoints.min.js")}}"></script>
  <script src="{{asset("assets/$theme/js/jquery.stellar.min.js")}}"></script>
  <script src="{{asset("assets/$theme/js/owl.carousel.min.js")}}"></script>
  <script src="{{asset("assets/$theme/js/jquery.magnific-popup.min.js")}}"></script>
  <script src="{{asset("assets/$theme/js/aos.js")}}"></script>
  <script src="{{asset("assets/$theme/js/jquery.animateNumber.min.js")}}"></script>
  <script src="{{asset("assets/$theme/js/bootstrap-datepicker.js")}}"></script>
  <script src="{{asset("assets/$theme/js/jquery.timepicker.min.js")}}"></script>
  <script src="{{asset("assets/$theme/js/scrollax.min.js")}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset("assets/$theme/js/google-map.js")}}"></script>
  <script src="{{asset("assets/$theme/js/main.js")}}"></script>
    @yield('script')
  </body>
</html>