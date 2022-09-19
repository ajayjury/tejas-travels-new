<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\VehicleType;
use App\Models\Vehicle;
use App\Models\Testimonial;
use App\Models\PackageType;
use App\Models\ListLayout;
use App\Models\HolidayPackage;
use App\Models\City;


class CarRentalController extends Controller
{
    public function index($type=null) {
        $listlayout = ListLayout::where('heading','like','%Bangalore%')->orWhere('heading','like','%bangalore%')->orWhere('heading','like','%BANGALORE%')->orderBy('id', 'DESC')->get();
        $vehicleTypes = VehicleType::with(['Vehicle'])->where('status',1)->get();
        switch ($type) {
            case 'Bus':
            case 'bus':
            case 'BUS':
                # code...
                $content_rental = '
                <div class="col-md-12">
                    <div class="x_car_detail_main_wrapper float_left">
                        <div class="x_car_detail_slider_bottom_cont_left">
                            <h3>We specialize in Bus Rentals:</h3>
                        </div>
                        <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper" style="font-family: system-ui;">
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Bus rental services are one of the most prevalent and widely used modes of transportation. Most individuals nowadays prefer to use bus rental services for numerous types of journeys and trips. Rental transportation services are great for moving a large group of individuals like corporate events, meetings, weddings, and more.
                            Now hire the bus of your choice for rentals with a click of a button. We have access to transparent detailing, Tejas Travels supports easy online booking and also ensures comfort, and expert professional services round the clock all through the year.</p><br/>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="x_car_detail_main_wrapper float_left">
                        <div class="x_car_detail_slider_bottom_cont_left">
                            <h3>Renting A Bus was never easier:</h3>
                        </div>
                        <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper" style="font-family: system-ui;">
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Travelling opens the door to delightful existence, and the option of renting a bus is the foundation for making the entire voyage happy, comfortable, and cradle-like. Bus rentals in Bangalore have the mentioned features in harmony with your needs and aspiration during your ride.
                            Bus rental services from Tejas Travels have eminent features to make long journeys stress-free, smooth and comfortable for all age groups.</p><br/>
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">The options for Fully Air-Condition(Cool + Warm) and non-air-conditioned buses are available. Our buses have an Audio System, Video System, Comfortable seat with pushback (2 X 2), Spacious leg space with footrest, Air Suspension, Decent Interiors, Open/Close Windows and Mike System and more. Buses also have amenities such as comfortable blankets and charging connections.</p><br/>
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Large buses like the 26-seater bus on rent, 27-seater bus rental, 29-seater bus rent, 30-seater bus on hire, 32-seater bus rental for travel, 33-seater bus rental services, 35-seater bus rental, 40-seater bus rental, 45-seater bus rental, 49-seater bus rental, 50-seater bus rental are available with transparent fare details, convenient bookings, easy cancellations and refunds.</p><br/>
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">You may now order a whole bus for your wedding at a very reasonable and unmatched price. A full sleeper bus booking can be made at any time for the journey to travel with family or friends. Now, you can book a full sleeper ac bus online for a journey that fits any budget and in any season. A complete bus reservation can be ideal for making the entire trip memorable. In Bangalore, the bus fee or bus price per kilometre varies according to the number of seats.</p><br/>
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Tejas Tours offers excellent bus services for bus travel within Bangalore and outstation travel purposes. Rates for the bus rental in Bangalore with Tejas Travels are evaluated carefully and moderately priced, keeping the bus rent price in Bangalore for luxury coach rentals.</p><br/>
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Customer service is available both before and during your trip. Our customer service centres are open 24 hours a day, 365 days a year.</p><br/>
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">We accept the physical and online modes of payments by Cash, Credit Cards, Debit Cards, Internet Banking, Google Pay, Phone Pay, Paytm and Wallets.</p><br/>
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">The luxury bus rentals or hire rates can be viewed on our website for bus rental services. Bus services are regularly conducted to provide a smooth riding experience each time you choose our luxury bus services for travel.</p><br/>
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Luxury bus rentals in Bangalore are the most popular option for travelling as a family.
                            Choose a luxury bus rental if one wishes to hire a bus to ride within the city limits.
                            The bus rent per km in Bangalore rates is most appropriate for comfortable travel for outstation journeys too. The bus rental by Tejas Travels provides ample leg space and luggage space to travel as a family.
                            Passengers do not have to wait in crowded railway stations and local bus hires. Bus bookings can be rescheduled easily, unlike railways. Convenient drop points and pick-up spots make the journey planning simpler.</p><br/>
                            <p><span style="background-color: transparent; color: rgb(0, 0, 0);">The luxury bus rental by Tejas Travels is sanitised from time and time as per COVID-19 protocol.</p><br/>
                        </div>
                    </div>
                </div>
            ';

            $rental_og = '
            <meta property="og:url" content="https://www.tejastravels.com/rental/Bus"/>
            <meta property="og:type" content="website"/>
            <meta property="og:title" content="Fare Details To Rent Executive Luxury Hire Buses, Bangalore"/>
            <meta property="og:description" content="Find Our Complete Vehicle Transparent Fare Details To Book Executive Buses On Rent With Trained Drivers From Tejas Travels For Comfortable Journey Experiences"/>
            <meta property="og:image" content="https://www.tejastravels.com/vehicle/1662029284-tejasmanjunath 005.jpg"/>
            <meta property="fb:app_id" content="214979608937351"/>
            <meta property="fb:admins" content="100000297684375,100001162319118"/>
            <meta name="twitter:card" content="https://www.tejastravels.com/assets/images/tejas-logo.png">
            <meta name="twitter:title" content="Fare Details To Rent Executive Luxury Hire Buses, Bangalore"/>
            <meta name="twitter:description" content="Find Our Complete Vehicle Transparent Fare Details To Book Executive Buses On Rent With Trained Drivers From Tejas Travels For Comfortable Journey Experiences"/>
            <meta name="twitter:image" content="https://www.tejastravels.com/vehicle/1662029284-tejasmanjunath 005.jpg"/>
            ';
            $rental_title = 'Fare Details To Rent Executive Luxury Hire Buses, Bangalore';
            $rental_description = 'Find Our Complete Vehicle Transparent Fare Details To Book Executive Buses On Rent With Trained Drivers From Tejas Travels For Comfortable Journey Experiences';
            $rental_script = '
            <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "Bus Rental",
      "image": [
        "https://www.tejastravels.com/vehicle/1662029284-tejasmanjunath 005.jpg",
        "https://www.tejastravels.com/assets/images/tejas-logo.png"
       ],
      "description": "Find Our Complete Vehicle Transparent Fare Details To Book Executive Buses On Rent With Trained Drivers From Tejas Travels For Comfortable Journey Experiences.",
      "brand": {
        "@type": "Brand",
        "name": "Tejas Tours and Travels"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
      },
       "name": "Tejas Tours and Travels",
      "author": {
        "@type": "Person",
        "name": "Tejas Travels"
      },
      "offers": {
        "@type": "Offer",
        "url": "https://www.tejastravels.com/rental/Bus",
        "price" : "Starting from 11 INR"
      }
     }
    }
    </script>
            ';
                break;
                case 'Luxury-Vehicle':
                    case 'luxury-vehicle':
                    case 'LUXURY-VEHICLE':
                        # code...
                        $content_rental = '
                        <div class="col-md-12">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper" style="font-family: system-ui;">
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Quality luxury rental cabs are the best alternative for all occasions. Choose Tejas Travels’ luxury airport taxi services in Bangalore and always stay on time.
                                    Outstation luxury cabs hiring in Bangalore with a driver are also available. Travel in style in these vehicles with comfortable interiors, plush features and reasonable rates whenever you desire. Attend weddings, prestigious events, corporate events, family affairs and more and establish a sense of choice and niche.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Luxury car rentals in Bangalore are luxury Rolls Royce Ghost hire, luxury Camry rent, luxury Audi Q7 rent, luxury Audi 6, luxury Corolla Altis for rental, Luxury Toyota Fortuner cab for rent, luxury Mercedes Benz S Class for hire, luxury BMW 5 series and luxury BMW 7 Series for rent.
                                    All our luxury rental cars are air-Conditioned Cabs (cool + Warm), an audio system, a Comfortable Bucket Seat, Spacious and ample leg space, Driver + comfortable seating and Adjustable Power Seats.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Tejas Travels has experience of 15 plus years in providing luxury cab rental in Bangalore. Cab rentals from us will always leave you with memorable times and a smooth journey.
                                    Be it taxis in Bangalore, airport cabs or car rentals with a driver, book cabs online at Tejas Travels.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">If you are looking for luxury cab hire in Bangalore, Tejas Travels is the best travel partner for all your in-station and outstation travel needs.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Be it luxury cab hire of Rolls Royce Ghost in Bangalore or Luxury car rental in Audi 6 for outstations, Tejas Travels will leave no stone unturned to provide the best luxury car rental in Bangalore. We have a fleet of sturdy and well-maintained luxury cabs for travel. Providing distinct rental in luxury car rentals in Bangalore and ensuring safe luxury cab rental in Bangalore is our forte.
                                    Luxury car rentals in Bangalore are convenient to avoid parking hassles, tiring long drives and wear and tear on your vehicle.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Luxury ride rental with Tejas Travels is convenient, reliable and unassailable. Luxury car rentals in Bangalore may offer several options but luxury vehicle rentals in Bangalore by Tejas Travels provide you with rounded and seamless service from the minute you book services in Bangalore with us. You will find bliss in getting car rental services that have reasonable and competitive prices. After serving decades in delivering cab travel in Bangalore, Tejas Travels has grown through experiences to bring about comfortable and accessible luxury car rental with incomparable luxury cab prices per km in Bangalore.
                                    </p><br/>
                                </div>
                            </div>
                        </div>
                    ';
                    $rental_og = '
                    <meta property="og:url" content="https://www.tejastravels.com/rental/Luxury-Vehicle "/>
                    <meta property="og:type" content="website"/>
                    <meta property="og:title" content="Fare Details To Rent Luxury Vehicles In Bangalore On Hire"/>
                    <meta property="og:description" content="Find Our Complete Vehicle Transparent Fare Details To Book Luxury Vehicles With Tejas Travels With A Touch Of Sophistication On Comfortable And Enjoyable Rides"/>
                    <meta property="og:image" content="https://www.tejastravels.com/vehicle/1662038733-a3f15722-aa27-49f4-92f3-763c9304a5d9.jpg"/>
                    <meta property="fb:app_id" content="214979608937351"/>
                    <meta property="fb:admins" content="100000297684375,100001162319118"/>
                    <meta name="twitter:card" content="https://www.tejastravels.com/assets/images/tejas-logo.png">
                    <meta name="twitter:title" content="Fare Details To Rent Luxury Vehicles In Bangalore On Hire"/>
                    <meta name="twitter:description" content="Find Our Complete Vehicle Transparent Fare Details To Book Luxury Vehicles With Tejas Travels With A Touch Of Sophistication On Comfortable And Enjoyable Rides"/>
                    <meta name="twitter:image" content="https://www.tejastravels.com/vehicle/1662038733-a3f15722-aa27-49f4-92f3-763c9304a5d9.jpg"/>
                    ';
                    $rental_title = 'Fare Details To Rent Luxury Vehicles In Bangalore On Hire';
            $rental_description = 'Find Our Complete Vehicle Transparent Fare Details To Book Luxury Vehicles With Tejas Travels With A Touch Of Sophistication On Comfortable And Enjoyable Rides';
            $rental_script = '
            <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "Luxury Vehicle Rental",
      "image": [
        "https://www.tejastravels.com/vehicle/1662038733-a3f15722-aa27-49f4-92f3-763c9304a5d9.jpg"",
        "https://www.tejastravels.com/assets/images/tejas-logo.png"
       ],
      "description": "Find Our Complete Vehicle Transparent Fare Details To Book Luxury Vehicles With Tejas Travels With A Touch Of Sophistication On Comfortable And Enjoyable Rides",
      "brand": {
        "@type": "Brand",
        "name": "Tejas Tours and Travels"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
      },
       "name": "Tejas Tours and Travels",
      "author": {
        "@type": "Person",
        "name": "Tejas Travels"
      },
      "offers": {
        "@type": "Offer",
        "url": "https://www.tejastravels.com/rental/Luxury-Vehicle",
        "price" : "Starting from 11 INR"
      }
     }
    }
    </script>
            ';            
            break;
                case 'Cabs':
                case 'cabs':
                case 'CABS':
                    $content_rental = '
                    <div class="col-md-12">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper" style="font-family: system-ui;">
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Renting a car is a very comfortable and practical way to travel, whether for business or pleasure. We get exactly where we want to go and when we want to go with our own hired vehicle. It allows us to explore areas more independently, go further, and see things we might have missed otherwise.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Cab rental is appropriate for individuals on a personal trip, as well as businesses and commercial travellers who are required to build a formal business contact, execute their professional obligations, and demonstrate a particular level of creativity.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Tejas Travels supplied our consumers with an unrivalled experience when it came to cab rentals in Bangalore. With a large choice of car hire and car rentals in Bangalore, our deluxe taxi rentals are the best cabs for travel in Bangalore. For numerous decades, we have provided inexpensive packages for cab rentals and automobile hiring with uncompromising quality and efficiency.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">The portal has a fleet of vehicles on rent like Innova 4-5 seater for rent, Innova 6-7 seater on rent, Innova Crysta for rental, Dzire cab rent, Etios car rental and more. The rates are affordable so that the renting of cabs can be done frequently without having to burn your monthly budget.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">The cabs accommodate 4-5 and even 6-7 members to make each journey with friends remarkable. Travel with friends and with family on safe rides with a driver. The chauffeurs are verified for their driving skills and they all meet up to professional standards. The rides are maintained and serviced regularly under the keen monitoring of an efficient team.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">The cab rentals in Bangalore by Tejas Travels will never fail to satisfy you and make your journey smooth, safe and memorable. Get access to luxury cab/car services in Bangalore through our 24*7 online portal.
                                    Car rentals in Bangalore are increasing in demand due to several reasons. Cab travel is convenient by cab hire to avoid parking hassles, tiring long drives and wear and tear of your vehicle. Travel hassle-free by renting a car to travel anywhere in India.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Cab rentals are most appropriate for comfortable cab travel for outstation journeys too. Convenient drop points and pick-up spots make the journey planning simpler. One can access ample space for luggage and dont have to worry about safety. Cars from Tejas Travels provide ample leg space and luggage space to travel as a family. Passengers do not have to wait in crowded railway stations and bus stops. Cab rental can be rescheduled easily, unlike railways.</p><br/>
                                    <p><span style="background-color: transparent; color: rgb(0, 0, 0);">The hired cabs are sanitised from time and time as per COVID-19 protocol.</p><br/>
                                </div>
                            </div>
                        </div>
                    ';
                    $rental_og = '
                    <meta property="og:url" content="https://www.tejastravels.com/rental/Cabs"/>
                    <meta property="og:type" content="website"/>
                    <meta property="og:title" content="Fare Details To Hire Cars At Competitive Rates In Bangalore"/>
                    <meta property="og:description" content="Find Our Complete Vehicle Transparent Fare Details For Booking Convenient Car Rentals With Comfortable Interiors And Experienced Chauffeurs From Tejas Travels"/>
                    <meta property="og:image" content="https://www.tejastravels.com/vehicle/1662528072-INNOVA CRYSTA 7 Ac.jpg"/>
                    <meta property="fb:app_id" content="214979608937351"/>
                    <meta property="fb:admins" content="100000297684375,100001162319118"/>
                    <meta name="twitter:card" content="https://www.tejastravels.com/assets/images/tejas-logo.png">
                    <meta name="twitter:title" content="Fare Details To Hire Cars At Competitive Rates In Bangalore"/>
                    <meta name="twitter:description" content="Find Our Complete Vehicle Transparent Fare Details For Booking Convenient Car Rentals With Comfortable Interiors And Experienced Chauffeurs From Tejas Travels"/>
                    <meta name="twitter:image" content="https://www.tejastravels.com/vehicle/1662528072-INNOVA CRYSTA 7 Ac.jpg"/>
                    ';
                    $rental_title = 'Fare Details To Hire Cars At Competitive Rates In Bangalore';
            $rental_description = 'Find Our Complete Vehicle Transparent Fare Details For Booking Convenient Car Rentals With Comfortable Interiors And Experienced Chauffeurs From Tejas Travels';
            $rental_script = '
            <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "Cab Rental",
      "image": [
        "https://www.tejastravels.com/vehicle/1662528072-INNOVA CRYSTA 7 Ac.jpg",
        "https://www.tejastravels.com/assets/images/tejas-logo.png"
       ],
      "description": "Find Our Complete Vehicle Transparent Fare Details For Booking Convenient Car Rentals With Comfortable Interiors And Experienced Chauffeurs From Tejas Travels.",
      "brand": {
        "@type": "Brand",
        "name": "Tejas Tours and Travels"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
      },
       "name": "Tejas Tours and Travels",
      "author": {
        "@type": "Person",
        "name": "Tejas Travels"
      },
      "offers": {
        "@type": "Offer",
        "url": "https://www.tejastravels.com/rental/Cabs",
        "price" : "Starting from 11 INR"
      }
     }
    }
    </script>
            ';        
            break;
                case 'Tempo-Traveller':
                case 'tempo-traveller':
                case 'TEMPO-TRAVELLER':
                    $content_rental = '
                    <div class="col-md-12">
                        <div class="x_car_detail_main_wrapper float_left">
                            <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper" style="font-family: system-ui;">
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">If you are planning a trip with family and friends, a Tempo Traveller is an excellent choice. You dont have to stand in line for public transportation in the present Covid-19 scenario. Tempo Travellers are ideal for short and long-distance trips with small or large parties. They are luxurious and provide passengers with a high-quality travel experience. It provides you with comfort and security, allowing you to travel without incident.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">When luxury amenities are available at affordable pricing, with the added benefit of spacious legroom, individual seating arrangements, and adequate moving space, renting a tempo traveller in Bangalore seems like the ideal option. All of our tempo travellers provide a variety of seating options.
                                You can look into Multiple Seating Options for Tempo Traveller. When planning a corporate tour, get-togethers with family or friends, office pick-ups and drop-offs, marriage celebrations or parties, religious pilgrims, weekend vacations, or a one-day picnic, mini buses are the ideal solution. The vehicle will not allow you to feel jerks or jump in your seats as a result of damaged roads.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">To ensure your comfort, you can rent a Tempo Traveller with interiors that include a high back chair, pushback seats, adequate legroom, music and video playing options, charging points, and much more for a reasonable price. With our extensive experience in travel services, we believe that Tempo Travellers rentals are an economical solution for group travel. To make your journey more comfortable, you can use rapid Outstation cab booking services. Tejas Travels Automobile Rental provides hassle-free outstation car booking for a comfortable journey of your choice.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Tejas Tours and Travels makes every effort to improve our services regularly. Tejas Tours and Travels offers highly inexpensive and pleasantly affordable Tempo Traveller rentals in Bangalore. Our website allows you to book tempo traveller rentals in Bangalore simply, at any time and from any location. Clients do not need to wait in crowded train stations or on local bus hires.
                                When you book a tempo traveller in Bangalore from us, each vehicle is sanitised regularly.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Unlike trains, tempo travellers for rent in Bangalore can be readily rescheduled. The most common option for family travel is to rent a Tempo Traveller in Bangalore. Choose our Tempo Traveller services for rent in Bangalore if you want to hire tempo travellers for in-city and out-of-town trips. These vehicles are popular due to their ample leg space, luxurious interior features, and luggage space.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Convenient drop-off and pick-up locations make travelling by tempo traveller in Bangalore easier.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Tejas Travels makes online booking simple.</p><br/>
                            </div>
                        </div>
                    </div>
                ';
                $rental_og = '
                <meta property="og:url" content="https://www.tejastravels.com/rental/Tempo-Traveller"/>
                <meta property="og:type" content="website"/>
                <meta property="og:title" content="Fare Details To Hire Tempo Travellers On Rent In Bangalore"/>
                <meta property="og:description" content="Find Our Complete Vehicle Transparent Fare Details By Booking Tempo Travellers Online With Tejas Travels For Pleasant Journey Experiences On Comfortable Rides"/>
                <meta property="og:image" content="https://www.tejastravels.com/vehicle/1662181097-DSC02366.jpg"/>
                <meta property="fb:app_id" content="214979608937351"/>
                <meta property="fb:admins" content="100000297684375,100001162319118"/>
                <meta name="twitter:card" content="https://www.tejastravels.com/assets/images/tejas-logo.png">
                <meta name="twitter:title" content="Fare Details To Hire Tempo Travellers On Rent In Bangalore"/>
                <meta name="twitter:description" content="Find Our Complete Vehicle Transparent Fare Details By Booking Tempo Travellers Online With Tejas Travels For Pleasant Journey Experiences On Comfortable Rides"/>
                <meta name="twitter:image" content="https://www.tejastravels.com/vehicle/1662181097-DSC02366.jpg"/>

                ';
                $rental_title = 'Fare Details To Hire Tempo Travellers On Rent In Bangalore';
                $rental_description = 'Find Our Complete Vehicle Transparent Fare Details By Booking Tempo Travellers Online With Tejas Travels For Pleasant Journey Experiences On Comfortable Rides';
                $rental_script = '
                <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "Tempo Traveller Rental",
      "image": [
        "https://www.tejastravels.com/vehicle/1662181097-DSC02366.jpg",
        "https://www.tejastravels.com/assets/images/tejas-logo.png"
       ],
      "description": "Find Our Complete Vehicle Transparent Fare Details By Booking Tempo Travellers Online With Tejas Travels For Pleasant Journey Experiences On Comfortable Rides.",
      "brand": {
        "@type": "Brand",
        "name": "Tejas Tours and Travels"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
      },
       "name": "Tejas Tours and Travels",
      "author": {
        "@type": "Person",
        "name": "Tejas Travels"
      },
      "offers": {
        "@type": "Offer",
        "url": "https://www.tejastravels.com/rental/Tempo-Traveller",
        "price" : "Starting from 11 INR"
      }
     }
    }
    </script>
                ';    
                break;
                case 'Mini-Bus':
                case 'mini-bus':
                case 'MINI-BUS':
                    $content_rental = '
                    <div class="col-md-12">
                        <div class="x_car_detail_main_wrapper float_left">
                            <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper" style="font-family: system-ui;">
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Make every travel a special one by renting a minibus for the day at a cost that is both affordable and reasonable. Our air-conditioned and non-air-conditioned minibuses are ideal for any group trip of 14-30 people or less. Journeys are a feeling that stays with us as a lovely recall of enjoyable moments spent with family and friends. Travel by commodious and executive Minibus rentals to make each of your journeys an exceptional experience.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">You can easily book any of the selected Minibuses using our website and leave the rest to us. There is also plenty of room for baggage and luggage storage. Register with us in three simple steps and we will keep you up to date on the latest discounts, promotions, and deals at incomparable pricing. Tejas Travels minibus booking for weddings is quite popular in Bangalore and beyond.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Minibus travel for rent in Bangalore is the most popular alternative for outstation travel. If you want to acquire minibus services within the city limits, choose minibus rentals in Bangalore. Minibus hire in Bangalore is ideal for comfortable minibus travel, including outstation trips. The vehicle has been a popular choice for mini-coach rentals. A minibus rented as a premium mini-coach rental in Bangalore gives enough leg and luggage space for a family to travel.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">The seats are cosy to snuggle you with comfort. The interior features are also rich to provide a class and sleek appearance. The executive Minibus options are 14-Seater Minibus, 15-Seater Minibus, 16-Seater Minibus, 18-Seater Minibus, 19-Seater Minibus, 20-Seater Minibus, 21-Seater Minibus, 22-Seater Minibus, 24-Seater Minibus, 25-Seater Minibus, 27-Seater Minibus, 30-Seater Minibus at Tejas Travels.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">We assure regular maintenance of our Minibuses so that every ride to take with us is comfortable to give you cradle-like travel. All necessary measures for Covid-19 as precautions are taken, as hygiene has been our prime priority.
                                The minibus price per kilometre in Bangalore is the lowest of any minibus rental price on any web. Tejas Travels ensures that your luxury mini-coach hire is cleaned and serviced after each ride when you order a minibus for the day or longer. The professional team and staff adhere to safety precautions as a protocol. Tejas Travels rates for minibus hire in Bangalore are reasonable for the service we deliver.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">We will make every trip for minibus booking on searching for a minibus for rent near me a memorable and comfortable one at any time of year. The rent for a 14-seater minibus is only Rs 21 per mile. Luxury minibus 15-seater rent per km for 16-seater minibus rentals in Bangalore is ideal for any trip and comes at an incredible price. When it comes to educational tours, minibus 17-seater rent per mile in Bangalore may accommodate any budget.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Unlike trains, mini-coach services can be readily rescheduled.
                                Convenient drop-off and pick-up locations make trip planning easier.
                                There is plenty of luggage room and no need to be concerned about safety.
                                The minibuses are Air-Conditioned (cool + Warm), Audio System, Video System, Comfortable seats with pushback (2 X 2), Spacious leg space with footrest, Mike System and Open/Close Windows.</p><br/>
                                <p><span style="background-color: transparent; color: rgb(0, 0, 0);">Your one-stop destination for ‘minibus travels near me’ is certainly Tejas Travels.</p><br/>
                            </div>
                        </div>
                    </div>
                    ';
                    $rental_og = '
                    <meta property="og:url" content="https://www.tejastravels.com/rental/Mini-Bus"/>
                    <meta property="og:type" content="website"/>
                    <meta property="og:title" content="Fare Details To Hire Minibuses Coaches On Rent In Bangalore"/>
                    <meta property="og:description" content="Find Our Complete Vehicle Transparent Fare Details To Hire Minibuses On Rent In Bangalore For Smooth Rides And Great Customer Service Experience Every Time"/>
                    <meta property="og:image" content="https://www.tejastravels.com/vehicle/1662477486-DSC02017.jpg"/>
                    <meta property="fb:app_id" content="214979608937351"/>
                    <meta property="fb:admins" content="100000297684375,100001162319118"/>
                    <meta name="twitter:card" content="https://www.tejastravels.com/assets/images/tejas-logo.png">
                    <meta name="twitter:title" content="Fare Details To Hire Minibuses Coaches On Rent In Bangalore"/>
                    <meta name="twitter:description" content="Find Our Complete Vehicle Transparent Fare Details To Hire Minibuses On Rent In Bangalore For Smooth Rides And Great Customer Service Experience Every Time"/>
                    <meta name="twitter:image" content="https://www.tejastravels.com/vehicle/1662477486-DSC02017.jpg"/>
                    ';
                    $rental_title = 'Fare Details To Hire Minibuses Coaches On Rent In Bangalore';
            $rental_description = 'Find Our Complete Vehicle Transparent Fare Details To Hire Minibuses On Rent In Bangalore For Smooth Rides And Great Customer Service Experience Every Time
            ';
            $rental_script = '
            <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "Mini Bus Rental",
      "image": [
        "https://www.tejastravels.com/vehicle/1662477486-DSC02017.jpg",
        "https://www.tejastravels.com/assets/images/tejas-logo.png"
       ],
      "description": "Find Our Complete Vehicle Transparent Fare Details To Hire Minibuses On Rent In Bangalore For Smooth Rides And Great Customer Service Experience Every Time.",
      "brand": {
        "@type": "Brand",
        "name": "Tejas Tours and Travels"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
      },
       "name": "Tejas Tours and Travels",
      "author": {
        "@type": "Person",
        "name": "Tejas Travels"
      },
      "offers": {
        "@type": "Offer",
        "url": "https://www.tejastravels.com/rental/Mini-Bus",
        "price" : "Starting from 11 INR"
      }
     }
    }
    </script>
            ';        
            break;
            
            default:
                # code...
                $content_rental = null;
                $rental_description = null;
                $rental_title = null;
                $rental_og = null;
                $rental_script = null;
                break;
        }
        if(!empty($type)){
            $type = str_replace('-', ' ', $type);
        }
        return view('pages.main.car_rental')->with('rental_script', $rental_script)->with('rental_og', $rental_og)->with('rental_title', $rental_title)->with('rental_description', $rental_description)->with('listlayouts', $listlayout)->with('content_rental', $content_rental)->with('vehicleTabTypeText', $type)->with('vehicletypes',$vehicleTypes)->with('title','Rental')->with('packagetypes',PackageType::all())->with('city', City::all());
    }
}