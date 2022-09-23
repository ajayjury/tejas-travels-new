<!-- x top header_wrapper Start -->
<div class="x_top_header_wrapper float_left d-none d-md-block">
    <div class="container">
        <div class="x_top_header_left_side_wrapper float_left">
            <p>Call Us :<a href="tel:+919980277773" class="text-white"> 9980277773</a> <a href="tel:+919008076363"
                    class="text-white">, 9008076363</a> &nbsp; Email: <a href="mailto:info@tejastravels.com" style="color: #fff">info@tejastravels.com</a> </p>
        </div>
        <div class="x_top_header_right_side_wrapper float_left">
            <!-- <div class="x_top_header_social_icon_wrapper">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-twitter-square"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin-square"></i></a>
                    </li>
                </ul>
            </div> -->
            <div class="x_top_header_all_select_box_wrapper">
                <ul>
                    <!-- <li class="language">
                        <select class="myselect">
                            <option>EN</option>
                            <option>RO</option>
                            <option>IT</option>
                        </select>	<i class="fa fa-globe"></i>
                    </li>
                    <li class="usd">
                        <select class="myselect">
                            <option>USD</option>
                            <option>EUR</option>
                            <option>CAD</option>
                        </select>	<i class="fa fa-money"></i>
                    </li> -->
                    @if (!Auth::check())
                        <li class="login"> <a href="{{ route('user_login') }}"><i class="fa fa-power-off"></i>
                                &nbsp;&nbsp;Login / Register</a>
                        </li>
                    @else
                        <li class="login"> <a href="{{ route('user_logout') }}"><i class="fa fa-power-off"></i>
                                &nbsp;&nbsp;Logout</a>
                        </li>
                    @endif
                    <!-- <li class="register">	<a href="register.php"><i class="fa fa-plus-circle"></i> &nbsp;&nbsp;register</a>
                    </li> -->
                    <!-- <li>
                        <button class="searchd"><i class="fa fa-search"></i>
                        </button>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- x top header_wrapper End -->
<!-- hs Navigation Start -->
<div class="hs_navigation_header_wrapper">
    <div class="Header-container container">
        <div class="row">
            <div class=" col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">
                <div class="hs_logo_wrapper d-none d-sm-none d-xs-none d-md-block">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/images/tejas-logo.png') }}" class="img-responsive logo-img" alt="logo"
                            title="Logo" />
                    </a>
                </div>
            </div>
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12">
                <div class="hs_navi_cart_wrapper  d-none d-sm-none d-xs-none d-md-block d-lg-block d-xl-block">
                    <div class="dropdown-wrapper menu-button menu_button_end"> <a class="menu-button" href="#"><i
                                class="flaticon-shopping-cart"></i><span>3</span></a>
                        <div class="drop-menu">
                            <div class="cc_cart_wrapper1">
                                <div class="cc_cart_img_wrapper">
                                    <img src="{{ asset('assets/images/cart_img.jpg') }}')}}" alt="cart_img" />
                                </div>
                                <div class="cc_cart_cont_wrapper">
                                    <h4><a href="#">Car</a></h4>
                                    <p>Quantity : 2 × $45</p>
                                    <h5>$90</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                            </div>
                            <div class="cc_cart_wrapper1 cc_cart_wrapper2">
                                <div class="cc_cart_img_wrapper">
                                    <img src="{{ asset('assets/images/cart_img.jpg') }}" alt="cart_img" />
                                </div>
                                <div class="cc_cart_cont_wrapper">
                                    <h4><a href="#">Car</a></h4>
                                    <p>Quantity : 2 × $45</p>
                                    <h5>$90</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                            </div>
                            <div class="cc_cart_wrapper1">
                                <div class="cc_cart_img_wrapper">
                                    <img src="{{ asset('assets/images/cart_img.jpg') }}" alt="cart_img" />
                                </div>
                                <div class="cc_cart_cont_wrapper">
                                    <h4><a href="#">Car</a></h4>
                                    <p>Quantity : 2 × $45</p>
                                    <h5>$90</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="checkout_btn_resto"> <a href="car_checkout.html">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="hs_main_menu d-none d-sm-none d-xs-none d-md-block">
                    <ul>
                        <li><a class="menu-button single_menu" href="{{ route('index') }}">Home</a>
                            <!-- <div class="dropdown-wrapper menu-button"> <a class="menu-button" href="#">Home</a>
                                <div class="drop-menu"> <a class="menu-button" href="index.php">Home-I</a>
                                    <a class="menu-button" href="index_II.html">Home-II</a>
                                </div>
                            </div> -->
                        </li>
                        {{-- <li>
                            <div class="dropdown-wrapper menu-button"> <a class="menu-button" href="#">Car</a>
                                <div class="drop-menu"> 
                                    <a class="menu-button" href="car-booking.php">Car-Booking</a>
                                    <a class="menu-button" href="car-details.php"> Car-Details</a>
                                    <a class="menu-button" href="car-checkout.php">Car-Checkout</a>
                                    <a class="menu-button" href="car-booking-done.php">Car-Booking-Done</a>
                                </div>
                            </div>
                        </li> --}}
                        <li> <a class="menu-button single_menu" href="{{ route('about') }}">About</a>
                        </li>
                        <li>
                            <div class="dropdown-wrapper menu-button"> <a class="menu-button"
                                    href="{{ route('car_rental') }}">Rental</a>
                                <div class="drop-menu"> 
                                    <a class="menu-button"
                                        href="{{ route('car_rental_type','Bus') }}">Bus</a>
                                    <a class="menu-button"
                                        href="{{ route('car_rental_type','Cabs') }}">Cabs</a>
                                    <a class="menu-button"
                                        href="{{ route('car_rental_type','Tempo-Travelle') }}r">Tempo Traveller</a>
                                    <a class="menu-button"
                                        href="{{ route('car_rental_type','Mini-Bus') }}">Mini Bus</a>
                                    <a class="menu-button" href="{{ route('car_rental_type','Luxury-Vehicle') }}">Luxury Vehicle</a>
                                </div>
                            </div>
                        </li>
                        <li> <a class="menu-button single_menu" href="{{ route('holiday_package') }}">Holiday Packages
                            </a>
                        </li>
                        <!-- CORPORATE TRIPS -->
                        <li>
                            <div class="dropdown-wrapper menu-button"> <a class="menu-button"
                                    href="{{ route('CorporateTips') }}">CORPORATE TRIPS</a>
                            </div>
                        </li>
                        <!-- CORPORATE TRIPS -->
                        <!-- SCHOOL TRIPS -->
                        {{-- <li>
                            <div class="dropdown-wrapper menu-button"> <a class="menu-button"
                                    href="{{ route('becamepartner') }}">Become Partner</a>
                            </div>
                        </li> --}}
                        <!-- END SCHOOL TRIPS -->
                        {{-- <li> <a class="menu-button single_menu" href="#">services </a>
                        </li> --}}
                        {{-- <li><a class="menu-button single_menu" href="#">Blog</a> --}}
                        
                        {{-- </li> --}}
                        <li> <a class="menu-button single_menu" href="{{ route('contact') }}">Contact </a>
                        </li>
                        @if (Auth::check())
                            <li>
                                <div class="dropdown-wrapper menu-button"> <a class="menu-button"
                                        href="#">Account</a>
                                    <div class="drop-menu"> <a class="menu-button"
                                            href="{{ route('user_profile') }}">My Profile</a>
                                        <a class="menu-button" href="{{ route('mybooking') }}">My Booking</a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </nav>
                <header class="mobail_menu d-none d-block d-xs-block d-sm-block d-md-none d-lg-none d-xl-none">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xs-6 col-sm-6 col-6">
                                <div class="hs_logo" style="padding-top: 0px;">
                                    <a href="{{ route('index') }}">
                                        <img src="{{ asset('assets/images/tejas-logo.png') }}" class="logo-img" alt="Logo"
                                            title="Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-6">
                                <div class="cd-dropdown-wrapper"
                                    style="    display: flex;
                                align-items: center;
                                justify-content: space-between;
                                width: 45%;
                                padding-top: 10px;
                                padding-bottom: 10px;">
                                    @if (!Auth::check())
                                        <a href="{{ route('user_login') }}" class="text-center login-btn">
                                            <i class="fa fa-user user-icon"></i>
                                            <p>Login</p>
                                        </a>
                                    @else
                                        <a href="{{ route('user_logout') }}" class="text-center login-btn">
                                            <i class="fa fa-power-off user-icon"></i>
                                            <p>&nbsp;&nbsp;Logout</p>
                                        </a>
                                    @endif

                                    <a class="house_toggle" href="#0">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            width="511.63px" height="511.631px" viewBox="0 0 511.63 511.631"
                                            style="enable-background:new 0 0 511.63 511.631;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M493.356,274.088H18.274c-4.952,0-9.233,1.811-12.851,5.428C1.809,283.129,0,287.417,0,292.362v36.545
                                                                c0,4.948,1.809,9.236,5.424,12.847c3.621,3.617,7.904,5.432,12.851,5.432h475.082c4.944,0,9.232-1.814,12.85-5.432
                                                                c3.614-3.61,5.425-7.898,5.425-12.847v-36.545c0-4.945-1.811-9.233-5.425-12.847C502.588,275.895,498.3,274.088,493.356,274.088z" />
                                                    <path
                                                        d="M493.356,383.721H18.274c-4.952,0-9.233,1.81-12.851,5.427C1.809,392.762,0,397.046,0,401.994v36.546
                                                                c0,4.948,1.809,9.232,5.424,12.854c3.621,3.61,7.904,5.421,12.851,5.421h475.082c4.944,0,9.232-1.811,12.85-5.421
                                                                c3.614-3.621,5.425-7.905,5.425-12.854v-36.546c0-4.948-1.811-9.232-5.425-12.847C502.588,385.53,498.3,383.721,493.356,383.721z" />
                                                    <path
                                                        d="M506.206,60.241c-3.617-3.612-7.905-5.424-12.85-5.424H18.274c-4.952,0-9.233,1.812-12.851,5.424
                                                                C1.809,63.858,0,68.143,0,73.091v36.547c0,4.948,1.809,9.229,5.424,12.847c3.621,3.616,7.904,5.424,12.851,5.424h475.082
                                                                c4.944,0,9.232-1.809,12.85-5.424c3.614-3.617,5.425-7.898,5.425-12.847V73.091C511.63,68.143,509.82,63.861,506.206,60.241z" />
                                                    <path
                                                        d="M493.356,164.456H18.274c-4.952,0-9.233,1.807-12.851,5.424C1.809,173.495,0,177.778,0,182.727v36.547
                                                                c0,4.947,1.809,9.233,5.424,12.845c3.621,3.617,7.904,5.429,12.851,5.429h475.082c4.944,0,9.232-1.812,12.85-5.429
                                                                c3.614-3.612,5.425-7.898,5.425-12.845v-36.547c0-4.952-1.811-9.231-5.425-12.847C502.588,166.263,498.3,164.456,493.356,164.456z
                                                                " />
                                                </g>
                                            </g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                        </svg>
                                    </a>
                                    <!-- .cd-dropdown -->
                                </div>
                                <nav class="cd-dropdown">
                                    <h2 style="background: #fff;"> <a href="{{ route('index') }}">
                                            <img src="{{ asset('assets/images/tejas-logo.png') }}"
                                                class="img-responsive logo-img" alt="logo" title="Logo" />
                                        </a></h2>
                                    <a href="#0" class="cd-close">Close</a>
                                    <ul class="cd-dropdown-content">
                                        <li>
                                            <form class="cd-search">
                                                <input type="search" placeholder="Search...">
                                            </form>
                                        </li>
                                        <li><a class="menu-button single_menu" href="{{ route('index') }}">Home</a>
                                            <!-- <div class="dropdown-wrapper menu-button"> <a class="menu-button" href="#">Home</a>
                                                <div class="drop-menu"> <a class="menu-button" href="index.php">Home-I</a>
                                                    <a class="menu-button" href="index_II.html">Home-II</a>
                                                </div>
                                            </div> -->
                                        </li>
                                        {{-- <li>
                                            <div class="dropdown-wrapper menu-button"> <a class="menu-button" href="#">Car</a>
                                                <div class="drop-menu"> 
                                                    <a class="menu-button" href="car-booking.php">Car-Booking</a>
                                                    <a class="menu-button" href="car-details.php"> Car-Details</a>
                                                    <a class="menu-button" href="car-checkout.php">Car-Checkout</a>
                                                    <a class="menu-button" href="car-booking-done.php">Car-Booking-Done</a>
                                                </div>
                                            </div>
                                        </li> --}}
                                        <li> <a class="menu-button single_menu" href="{{ route('about') }}">About</a>
                                        </li>
                                        <li> <a class="menu-button single_menu" href="{{ route('holiday_package') }}">Holiday Packages
                                            </a>
                                        </li>
                                        <!-- CORPORATE TRIPS -->
                                        <li>
                                            <div class="dropdown-wrapper menu-button"> <a class="menu-button"
                                                    href="{{ route('CorporateTips') }}">CORPORATE TRIPS</a>
                                            </div>
                                        </li>
                                        <!-- CORPORATE TRIPS -->
                                        <!-- SCHOOL TRIPS -->
                                        <li>
                                            <div class="dropdown-wrapper menu-button"> <a class="menu-button"
                                                    href="{{ route('becamepartner') }}">Become Partner</a>
                                            </div>
                                        </li>
                                        <!-- END SCHOOL TRIPS -->
                                        {{-- <li> <a class="menu-button single_menu" href="#">services </a>
                                        </li> --}}
                                        <li><a class="menu-button single_menu" href="#">Blog</a>
                                        </li>
                                        <li> <a class="menu-button single_menu" href="{{ route('contact') }}">Contact </a>
                                        </li>
                                        @if (Auth::check())
                                            <li>
                                                <div class="dropdown-wrapper menu-button"> <a class="menu-button"
                                                        href="#">Account</a>
                                                    <div class="drop-menu"> <a class="menu-button"
                                                            href="{{ route('user_profile') }}">My Profile</a>
                                                        <a class="menu-button" href="{{ route('mybooking') }}">My Booking</a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                    <!-- .cd-dropdown-content -->
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- .cd-dropdown-wrapper -->
                </header>
            </div>
        </div>
    </div>
</div>
<!-- hs Navigation End -->
