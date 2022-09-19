<!-- btc tittle Wrapper Start -->
<div class="btc_tittle_main_wrapper">
    <div class="btc_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_left_heading">
                    <h1>{{$title}}</h1>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_right_heading">
                    <div class="btc_tittle_right_cont_wrapper">
                        <ul itemscope="" itemtype="https://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="{{route('index')}}" itemprop="item"><span itemprop="name">Home <i class="fa fa-angle-right"></i></span> <meta itemprop="position" content="1"></a>
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="{{url()->current()}}" itemprop="item"><span itemprop="name">{{$title}}</span> <meta itemprop="position" content="2"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- btc tittle Wrapper End -->