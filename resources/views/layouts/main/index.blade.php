<!DOCTYPE html>
<!-- 
Template Name: Xpedia
Version: 1.0.0

-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">
<!--[endif]-->

<head>
	<meta charset="utf-8" />
	<title>Tejas</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="Tejas" />
	<meta name="keywords" content="Tejas" />
	<meta name="author" content="" />
	<meta name="MobileOptimized" content="320" />
	<!--Template style -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flaticon.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}" />
	<link href="{{ asset('admin/css/iziToast.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.theme.default.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/reset.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome-6/css/all.min.css') }}" />
	<!--favicon-->
	<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/fevicon.png') }}" />
    @yield('css')
</head>

<body>
	<!-- preloader Start -->
	<div id="preloader">
		<div id="status">
			<img src="{{ asset('assets/images/loader.gif') }}" id="preloader_image" alt="loader">
		</div>
	</div>
	<div class="serach-header">
		<div class="searchbox">
			<button class="close">×</button>
			<form>
				<input type="search" placeholder="Search …">
				<button type="submit"><i class="fa fa-search"></i>
				</button>
			</form>
		</div>
	</div>
    
    @include('includes.main.header')

    @yield('content')

    @include('includes.main.footer')

	<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/modernizr.js') }}"></script>
	<script src="{{ asset('assets/js/select2.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.menu-aim.js') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
	<script src="{{ asset('assets/js/own-menu.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
	<script src="{{ asset('assets/js/xpedia.js') }}"></script>
	<script src="{{ asset('admin/js/pages/just-validate.production.min.js') }}"></script>
	<script src="{{ asset('admin/js/pages/iziToast.min.js') }}"></script>
	<!-- custom js-->

	<script type="text/javascript">
		@if (session('success_status'))

			iziToast.success({
				title: 'Success',
				message: '{{ session('success_status') }}',
				position: 'topRight',
				timeout:6000
			});

		@endif
		@if (session('error_status'))

			iziToast.error({
				title: 'Error',
				message: '{{ session('error_status') }}',
				position: 'topRight',
				timeout:6000
			});

		@endif

	</script>


	
    @yield('javascript')
</body>

</html>