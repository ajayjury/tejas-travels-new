<!-- xs offer car tabs Start -->
<div class="x_offer_car_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_offer_car_heading_wrapper float_left">
                    <h4>Testimonials</h4>
                    <h3>Top Reviews</h3>
                    <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id ullamcorper libero
                        <br>Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="screenshot">
                    <div class="owl-carousel screen nplr screen-loop">
                        @foreach ($testimonials as $key=>$value)
                        <div>
                            <div class="card  valign-wrapper">
                                <!-- Client's image -->
                                <div class="card-image">
                                    <img src="{{ asset('assets/images/home/client_1.jpg') }}" alt="img">
                                </div>
                                <!-- /Client's image -->
                                <div class="card-content center-align valign">
                                    <div class="testi_slide_star">
                                        @for($i=1; $i<=$value->star;$i++)
                                        <i class="fa fa-star"></i>
                                        @endfor
                                    </div>
                                    <!-- Client's Feedback -->
                                    <p>“ {{$value->message}} ”</p>
                                    <!-- /Client's Feedback -->
                                    <!-- Client's Name -->
                                    <p class="card-title">{{$value->name}} <span>{{$value->designation}}</span>
                                    </p>
                                    <!-- /Client's Name -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- btc team Wrapper Start -->