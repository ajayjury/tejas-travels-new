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
    <title>{{$head_title}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="{{$head_description}}" />
    <meta name="keywords" content="{{$head_keyword}}" />
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style_III.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome-6/css/all.min.css') }}" />

    <link rel="canonical" href="{{url()->current()}}">
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/tejas-travel-ico.png') }}" />
    @if(!empty($country->seo_meta_header))
    {!!$country->seo_meta_header!!}
    @endif
    <style>
        .fab-wrapper {
            position: fixed;
            bottom: 8rem;
            right: 2rem;
            z-index: 99;
        }

        .fab-checkbox {
            display: none;
        }

        .plus-icon {
            font-size: 22px;
            color: #fff;
        }

        /* .css-fab {
            position: absolute;
            bottom: -1rem;
            display: grid;
            right: -1rem;
            width: 4rem;
            height: 4rem;
            background: blue;
            border-radius: 50%;
            background: #126EE2;
            transition: all 0.3s ease;
            z-index: 1;
            border: 1px solid #0c50a7;
            align-items: center;
            justify-content: space-around;
        } */

        .fab-plus-button:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .fab-checkbox:checked~.fab-plus-button:before {
            width: 90%;
            height: 90%;
            left: 5%;
            top: 5%;
            background-color: rgba(255, 255, 255, 0.2);
            transform: rotate(20deg);
        }

        .fab-checkbox:checked~.fab-plus-button{
            transform: rotate(43deg);
        }

        .fab-plus-button:hover {
            /* background: #2c87e8; */
            /* box-shadow: 0px 2px 2px 2px #81a4f1; */
        }

        .fab-dots {
            position: absolute;
            height: 8px;
            width: 8px;
            background-color: white;
            border-radius: 50%;
            top: 50%;
            transform: translateX(0%) translateY(-50%) rotate(0deg);
            opacity: 1;
            animation: blink 3s ease infinite;
            transition: all 0.3s ease;
        }

        .fab-dots-1 {
            left: 15px;
            animation-delay: 0s;
        }

        .fab-dots-2 {
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            animation-delay: 0.4s;
        }

        .fab-dots-3 {
            right: 15px;
            animation-delay: 0.8s;
        }

        .fab-checkbox:checked~.fab-plus-button .fab-dots {
            height: 6px;
        }

        .fab-plus-button .fab-dots-2 {
            transform: translateX(-50%) translateY(-50%) rotate(0deg);
        }

        .fab-checkbox:checked~.fab-plus-button .fab-dots-1 {
            width: 32px;
            border-radius: 10px;
            left: 50%;
            transform: translateX(-50%) translateY(-50%) rotate(45deg);
        }

        .fab-checkbox:checked~.fab-plus-button .fab-dots-3 {
            width: 32px;
            border-radius: 10px;
            right: 50%;
            transform: translateX(50%) translateY(-50%) rotate(-45deg);
        }

        @keyframes blink {
            50% {
                opacity: 0.25;
            }
        }

        .fab-checkbox:checked~.fab-plus-button .fab-dots {
            animation: none;
        }

        .fab-wheel {
            position: absolute;
            bottom: 285px;
            right: 0;
            border: 1px solid #;
            width: 10rem;
            height: 10rem;
            transition: all 0.3s ease;
            transform-origin: bottom right;
            transform: scale(0);
        }

        .fab-checkbox:checked~.fab-wheel {
            transform: scale(1);
        }

        .fab-action {
            /* position: absolute; */
            margin: 0px 0 30px auto;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: White;
            box-shadow: 0 0.1rem 1rem rgba(24, 66, 154, 0.82);
            transition: all 1s ease;
            opacity: 0;
        }

        .fab-action {
            background: #fff;
            width: 3rem;
            height: 3rem;
        }

        .fab-action span {
            position: absolute;
            left: -80px;
            color: #fff;
            background: #575454;
            padding: 5px 8px;
            border: 10px;
            border-radius: 5px;
        }

        .fab-action img {
            border-radius: 50px;
        }

        .fab-checkbox:checked~.fab-wheel .fab-action {
            opacity: 1;
        }

        /* .fab-action:hover {
  background-color: #f16100;
} */
        .fab-wheel .fab-action-1 {
            right: -1rem;
            top: 0;
        }

        .fab-wheel .fab-action-2 {
            right: 3.4rem;
            top: 0.5rem;
        }

        .fab-wheel .fab-action-3 {
            left: 0.5rem;
            bottom: 3.4rem;
        }

        .fab-wheel .fab-action-4 {
            left: 0;
            bottom: -1rem;
        }

        .fab-wrapper {
            position: fixed;
            bottom: 8rem;
            right: 2rem;
            z-index: 99;
        }

        .fab-checkbox {
            display: none;
        }

        .plus-icon {
            font-size: 22px;
            color: #fff;
        }

        .fab-plus-button {
            position: absolute;
            bottom: -1rem;
            display: grid;
            right: -1rem;
            width: 4rem;
            height: 4rem;
            background: transparent;
            border-radius: 50%;
            background: transparent;
            transition: all 0.3s ease;
            z-index: 1;
            border: 1px solid transparent;
            align-items: center;
            justify-content: space-around;
        }

        .fab-plus-button:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .fab-checkbox:checked~.fab-plus-button:before {
            width: 90%;
            height: 90%;
            left: 5%;
            top: 5%;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .fab-plus-button:hover {
            /* background: #2c87e8; */
            /* box-shadow: 0px 2px 2px 2px #81a4f1; */
        }

        .fab-dots {
            position: absolute;
            height: 8px;
            width: 8px;
            background-color: white;
            border-radius: 50%;
            top: 50%;
            transform: translateX(0%) translateY(-50%) rotate(0deg);
            opacity: 1;
            animation: blink 3s ease infinite;
            transition: all 0.3s ease;
        }

        .fab-dots-1 {
            left: 15px;
            animation-delay: 0s;
        }

        .fab-dots-2 {
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            animation-delay: 0.4s;
        }

        .fab-dots-3 {
            right: 15px;
            animation-delay: 0.8s;
        }

        .fab-checkbox:checked~.fab-plus-button .fab-dots {
            height: 6px;
        }

        .fab-plus-button .fab-dots-2 {
            transform: translateX(-50%) translateY(-50%) rotate(0deg);
        }

        .fab-checkbox:checked~.fab-plus-button .fab-dots-1 {
            width: 32px;
            border-radius: 10px;
            left: 50%;
            transform: translateX(-50%) translateY(-50%) rotate(45deg);
        }

        .fab-checkbox:checked~.fab-plus-button .fab-dots-3 {
            width: 32px;
            border-radius: 10px;
            right: 50%;
            transform: translateX(50%) translateY(-50%) rotate(-45deg);
        }

        @keyframes blink {
            50% {
                opacity: 0.25;
            }
        }

        .fab-checkbox:checked~.fab-plus-button .fab-dots {
            animation: none;
        }

        .fab-wheel {
            position: absolute;
            bottom: 285px;
            right: 0;
            border: 1px solid #;
            width: 10rem;
            height: 10rem;
            transition: all 0.3s ease;
            transform-origin: bottom right;
            transform: scale(0);
        }

        .fab-checkbox:checked~.fab-wheel {
            transform: scale(1);
        }

        .fab-action {
            /* position: absolute; */
            margin: 0px 0 30px auto;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: White;
            box-shadow: 0 0.1rem 1rem rgba(24, 66, 154, 0.82);
            transition: all 1s ease;
            opacity: 0;
        }

        .fab-action {
            background: #fff;
            width: 3rem;
            height: 3rem;
        }

        .fab-action span {
            position: absolute;
            left: -80px;
            color: #fff;
            background: #575454;
            padding: 5px 8px;
            border: 10px;
            border-radius: 5px;
        }

        .fab-action img {
            border-radius: 50px;
        }

        .fab-checkbox:checked~.fab-wheel .fab-action {
            opacity: 1;
        }

        /* .fab-action:hover {
  background-color: #f16100;
} */
        .fab-wheel .fab-action-1 {
            right: -1rem;
            top: 0;
        }

        .fab-wheel .fab-action-2 {
            right: 3.4rem;
            top: 0.5rem;
        }

        .fab-wheel .fab-action-3 {
            left: 0.5rem;
            bottom: 3.4rem;
        }

        .fab-wheel .fab-action-4 {
            left: 0;
            bottom: -1rem;
        }
      
    </style>
    @yield('css')
</head>

<body id="bodyAbove">
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

    <!-- Floatting buttons -->
    <!-- Floatting buttons -->
    <div class="fab-wrapper">
        <input id="fabCheckbox" type="checkbox" class="fab-checkbox" />
        <label class="fab fab-plus-button" for="fabCheckbox">
           <img src="{{asset('assets/images/multi-icon.png')}}" class="right-icon" />
            {{-- <i class="fa fa-plus plus-icon"></i> --}}
        </label>
        <div class="fab-wheel">
            <a href="http://onelink.to/g27kyb" class="fab-action fab-action-1">
                <span>IOS App Download</span>
                <img src="{{ asset('assets/images/icons/ios.png') }}" width="55" />
                {{-- <i class="fas fa-question"></i> --}}
            </a>
            <a href="http://onelink.to/g27kyb" class="fab-action fab-action-2">
                <span>Android App Download</span>
                <img src="{{ asset('assets/images/icons/playstore.jpeg') }}" width="55" />
            </a>
            <a href="mailto:info@tajestravels.com"  class="fab-action fab-action-3">
                <span>Write Mail</span>
                <img src="{{ asset('assets/images/gmail.webp') }}" width="46" />
            </a>
            <a href="https://api.whatsapp.com/send?phone=+919980277773&text=Hello Tejas."
                class="fab-action fab-action-4">
                <span>WhatsApp</span>
                <img src="{{ asset('assets/images/icons/whats.jpeg') }}" width="55" />
            </a>
            <a href="tel:+91 9980277773" class="fab-action fab-action-4">
                <span>Call Us</span>
                <img src="{{ asset('assets/images/icons/calling.png') }}" width="55" />
            </a>
        </div>
    </div>
    <!-- End Floatting Buttons -->
    <!-- End Floatting Buttons -->

    @include('includes.main.footer')

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.menu-aim.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/own-menu.js') }}"></script> --}}
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
                timeout: 6000
            });
        @endif
        @if (session('error_status'))

            iziToast.error({
                title: 'Error',
                message: '{{ session('error_status') }}',
                position: 'topRight',
                timeout: 6000
            });
        @endif
    </script>



    @yield('javascript')

    <script>
        function scrollAbove(){
            const element = document.getElementById("bodyAbove");
            element.scrollTop  = 0;
        }
    </script>
    @if(!empty($country->seo_meta_footer))
    {!!$country->seo_meta_footer!!}
    @endif
</body>

</html>
