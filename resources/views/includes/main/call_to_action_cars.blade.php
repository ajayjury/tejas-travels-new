<!-- x booking Wrapper Start -->
<div class="x_booking_main_wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="x_book_logo_wrapper float_left">
                    <img src="{{ asset('assets/images/tejas-white-logo.png') }}" alt="logo">
                </div>
            </div>
            <div class="col-md-6">
                <div class="x_book_logo_heading_wrapper float_left">
                    <h3>Making Every Tour A Memorable One!!</h3>
                    <p>Book with Tejas Tours and Travels- We are A User-Centric Vehicle Rental Company.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="x_book_logo_btn float_left">
                    <ul>
                        <li><a
                            @if(str_contains(URL::current(), 'vehicle-type') || str_contains(URL::current(), 'vehicle-seo') || str_contains(URL::current(), 'car-rental'))
                            href="#" onclick="scrollAbove()"
                            @else
                            href="{{route('index')}}"
                             @endif
                             >Book Now <i class="fa fa-arrow-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- x booking Wrapper End -->