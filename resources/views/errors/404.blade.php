<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="author" content="Tejas Travels" />
    <meta name="MobileOptimized" content="320" />
	<title>404 - Tejas Travels</title>
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
	<!-- EXTERNAL STYLESHEETS -->
	<link href="{{ asset('not_found/css/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css')}}" rel="stylesheet">
	<!-- ANIMATION -->
	<link href="{{ asset('not_found/css/animation.css')}}" rel="stylesheet" type="text/css" />
	<!-- MAIN STYLESHEETS -->
	<link rel="stylesheet" href="{{ asset('not_found/css/main.css')}}">
	<!-- Favicons -->
	<link rel="canonical" href="{{url()->current()}}">
    <link rel="alternate" href="{{url()->current()}}" hreflang="en-in" />
    <link rel="alternate" href="{{url()->current()}}" hreflang="en-us" />
    <link rel="alternate" href="{{url()->current()}}" hreflang="en-gb" />
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/tejas-travel-ico.png') }}" />
</head>
<body>
	<!-- ANIMATION -->
	<div class="fix-wrp">
		<div class="animate-wrp">
			<div class="sky">
				<div class="car-wheels"></div>
				<div class="car">
					<div class="msg"><b><span>Oops!</span>May be I am on wrong way.</b></div>
				</div>
				<div class="car-wheels c1"></div>
				<div class="car1 c1"></div>
				<div class="cloud"></div>
				<div class="cloud2"></div>
				<div class="cloud1"></div>
				<div class="grass1"></div>
				<div class="grass"></div>
				<div class="grass2"></div>
				<div class="mountain"></div>
				<div class="mountain1"></div>
				<div class="tree"></div>
				<div class="tree-front"></div>
				<div class="road"></div>
				<div class="road-front"></div>
			</div>	
		</div>
	</div>
	<!--/animate-wrp -->

	<!-- MAIN WRAPPER -->
	<div class="main-wrapper">
		<!-- CONTAINER -->
		<div class="container">
			
			<!-- BALLOON SHIP -->
			<div class="balloon-ship">
				<div class="message-wrp">
					<strong class="t1">OOPS!</strong>
					<strong class="t2">ERROR 404</strong>
					<strong class="t3">PAGE NOT FOUND</strong>
				</div>
				<img src="{{ asset('not_found/images/balloon-ship.png')}}" alt="balloon-ship" />
			</div>
			<!--/balloon ship -->

			<div class="message">
				<p class="t1">We couldn't find what you were looking for.<br>You could try some use full links below.</p>
			</div>
			
			<!-- NAVIGATION LINKS -->
			<div class="nav-wrapper">
				<a href="{{route('index')}}">Home</a>
				<a href="{{route('about')}}">About</a>
				<a href="{{route('car_rental')}}">Rental</a>
				<a href="{{route('contact')}}">Contact</a>
			</div>
			<!--/nav-wrapper -->
			
			<!-- SOCIAL LINKS -->
			{{-- <div class="social-links">
				<a href="https://www.facebook.com/NCodeArt-1775773679337303/"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/NCodeArt"><i class="fa fa-twitter"></i></a>
				<a href="https://plus.google.com/u/0/116375781171317760169"><i class="fa fa-google-plus"></i></a>
				<a href="http://themeforest.net/item/travel-error-page/8657221?ref=NCodeart"><i class="fa fa-linkedin"></i></a>
				<a href="http://themeforest.net/item/travel-error-page/8657221?ref=NCodeart"><i class="fa fa-youtube-play"></i></a>
				<a href="http://themeforest.net/item/travel-error-page/8657221?ref=NCodeart"><i class="fa fa-vimeo-square"></i></a>
				<a href="https://dribbble.com/NCodeArt"><i class="fa fa-dribbble"></i></a>
				<a href="http://themeforest.net/item/travel-error-page/8657221?ref=NCodeart"><i class="fa fa-skype"></i></a>
				<a href="http://themeforest.net/item/travel-error-page/8657221?ref=NCodeart"><i class="fa fa-rss"></i></a>					
			</div> --}}
			<!--/social-links -->
			<p class="copyrights">Copyright © 2022 Tejas Travels All Right Reserved</p>
		</div>
		<!--/container -->
	</div>
	<!--/main-wrapper -->
	
	<!-- COMMON SCRIPT -->
	<script src="{{ asset('not_found/js/jquery-1.11.1.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('not_found/js/jquery.arctext.js')}}"></script>
	<script>
		function mainWindow(){
			$(".main-wrapper").css({
				width: $('html').width(),
				height: $('html').height() > $(window).height() ? $('html').height() : $(window).height()  
			});
		}
		function animateWindow(){
			$(".animate-wrp").css({
				width: $(window).width(),
				height: $('.main-wrapper').height()
			});
		}
		$(document).ready(function() {
			mainWindow();
			animateWindow();
		});
		$(window).resize(function(event) {
			mainWindow();
			animateWindow();
		});
		$(document).ready(function() {
			var $t3	= $('.message-wrp .t3').hide();
			$t3.show().arctext({radius: 1900, dir: -1});
		});
	</script>
</body>

</html>