<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\SubCityController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\TransporterController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarBookingController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PackageTypeController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\LocalRideController;
use App\Http\Controllers\AirportRideController;
use App\Http\Controllers\OutStationController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\HolidayPackageController;
use App\Http\Controllers\HolidayPackageMainController;
use App\Http\Controllers\DynamicWebPageController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\SEOMetaController;
use App\Http\Controllers\VehicleTypeSeoController;
use App\Http\Controllers\ListLayoutController;
use App\Http\Controllers\ContentLayoutController;
use App\Http\Controllers\VehicleSeoController;
use App\Http\Controllers\HolidayPackageSeoController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\QuotationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index', 'as' => 'home.index'])->name('index');
Route::get('/contact', [HomeController::class, 'contact', 'as' => 'home.contact'])->name('contact');
Route::get('/office-ride-enterprise', [HomeController::class, 'office', 'as' => 'home.office'])->name('office');
Route::get('/about-us', [HomeController::class, 'about', 'as' => 'home.about'])->name('about');
Route::get('/become-a-partner', [HomeController::class, 'partner', 'as' => 'home.partner'])->name('partner');
Route::get('/consumer-complaints', [HomeController::class, 'complaint', 'as' => 'home.complaint'])->name('complaint');
Route::get('/car-booking', [CarBookingController::class, 'index', 'as' => 'car_booking.index'])->name('car_booking');
Route::get('/car-booking/{quotationId}', [CarBookingController::class, 'car_booking_quotation', 'as' => 'car_booking_quotation.index'])->name('car_booking_quotation');
Route::get('/car-detail/{url}', [CarBookingController::class, 'detail', 'as' => 'car_booking.detail'])->name('car_detail');
Route::get('/car-checkout', [CarBookingController::class, 'checkout', 'as' => 'car_booking.checkout'])->name('car_checkout');
Route::get('/car-booking-complete', [CarBookingController::class, 'complete', 'as' => 'car_booking.complete'])->name('car_complete');
Route::get('/holiday-packages', [HolidayPackageMainController::class, 'index', 'as' => 'holiday_package.index'])->name('holiday_package');
Route::post('/holiday-packages-enquiry', [HolidayPackageMainController::class, 'HolidayPackageEnquiry', 'as' => 'HolidayPackageEnquiry.index'])->name('Holiday_Package_Enquiry');
Route::get('/holiday-packages/{url}', [HolidayPackageMainController::class, 'detail', 'as' => 'holiday_package.detail'])->name('holiday_package_detail');
Route::get('/corporate-tips', [HomeController::class, 'CorporateTips', 'as' => 'home.CorporateTips'])->name('CorporateTips');
Route::get('/school-trips', [HomeController::class, 'SchoolTrips', 'as' => 'home.SchoolTrips'])->name('SchoolTrips');
Route::get('/privacy-policy', [HomeController::class, 'privecypolicy', 'as' => 'home.privecypolicy.blade'])->name('privecypolicy');
Route::get('/refund', [HomeController::class, 'Refund', 'as' => 'home.Refund'])->name('Refund');
Route::get('/terms-and-condition', [HomeController::class, 'TermandConditions', 'as' => 'home.TermandConditions'])->name('TermandConditions');
Route::get('/cancellecenandreturn', [HomeController::class, 'cancellecenandreturn', 'as' => 'home.cancellecenandreturn'])->name('cancellection Policy');
Route::get('/employee-transportation', [HomeController::class, 'employeetransportation', 'as' => 'home.employeetransportation'])->name('employeetransportation');
Route::get('/became-partner', [HomeController::class, 'becamepartner', 'as' => 'home.becamepartner'])->name('becamepartner');

Route::get('/vehicle-all-ajax-frontend/{id}', [VehicleController::class, 'vehicle_all_ajax', 'as' => 'admin.city.vehicle_all_ajax'])->name('vehicle_all_ajax_frontend');
Route::post('/insert-quotation', [QuotationController::class, 'store', 'as' => 'quotation.store'])->name('quotation_store');
Route::post('/insert-enquiry', [EnquiryController::class, 'insert_enquiry', 'as' => 'insert_enquiry.insert_enquiry'])->name('insert_enquiry');
Route::post('/insert-complaint', [ComplaintController::class, 'insert_complaint', 'as' => 'insert_complaint.insert_complaint'])->name('insert_complaint');

Route::prefix('/admin')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'index', 'as' => 'admin.login'])->name('login');
    Route::post('/authenticate', [AuthenticationController::class, 'authenticate', 'as' => 'admin.authenticate'])->name('authenticate');
    Route::get('/forgot-password', [AuthenticationController::class, 'forgotPassword', 'as' => 'admin.forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password', [AuthenticationController::class, 'requestForgotPassword', 'as' => 'admin.requestForgotPassword'])->name('requestForgotPassword');
    Route::get('/reset-password/{id}', [AuthenticationController::class, 'resetPassword', 'as' => 'admin.resetPassword'])->name('resetPassword');
    Route::post('/reset-password/{id}', [AuthenticationController::class, 'requestResetPassword', 'as' => 'admin.requestResetPassword'])->name('requestResetPassword');
    // Route::get('/dashboard', [DashboardController::class, 'index', 'as' => 'admin.dasboard'])->name('dashboard');
});

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index', 'as' => 'admin.dasboard'])->name('dashboard');

    Route::prefix('/country')->group(function () {
        Route::get('/', [CountryController::class, 'view', 'as' => 'admin.country.view'])->name('country_view');
        Route::get('/view/{id}', [CountryController::class, 'display', 'as' => 'admin.country.display'])->name('country_display');
        Route::get('/create', [CountryController::class, 'create', 'as' => 'admin.country.create'])->name('country_create');
        Route::post('/create', [CountryController::class, 'store', 'as' => 'admin.country.store'])->name('country_store');
        Route::get('/excel', [CountryController::class, 'excel', 'as' => 'admin.country.excel'])->name('country_excel');
        Route::post('/ajax_create', [CountryController::class, 'ajax_store', 'as' => 'admin.country.ajax_store'])->name('country_ajax_store');
        Route::get('/edit/{id}', [CountryController::class, 'edit', 'as' => 'admin.country.edit'])->name('country_edit');
        Route::post('/edit/{id}', [CountryController::class, 'update', 'as' => 'admin.country.update'])->name('country_update');
        Route::get('/delete/{id}', [CountryController::class, 'delete', 'as' => 'admin.country.delete'])->name('country_delete');
    });

    Route::prefix('/state')->group(function () {
        Route::get('/', [StateController::class, 'view', 'as' => 'admin.state.view'])->name('state_view');
        Route::get('/view/{id}', [StateController::class, 'display', 'as' => 'admin.state.display'])->name('state_display');
        Route::get('/state-all-ajax/{id}', [StateController::class, 'state_all_ajax', 'as' => 'admin.state.state_all_ajax'])->name('state_all_ajax');
        Route::get('/create', [StateController::class, 'create', 'as' => 'admin.state.create'])->name('state_create');
        Route::post('/create', [StateController::class, 'store', 'as' => 'admin.state.store'])->name('state_store');
        Route::get('/excel', [StateController::class, 'excel', 'as' => 'admin.state.excel'])->name('state_excel');
        Route::post('/ajax_create', [StateController::class, 'ajax_store', 'as' => 'admin.state.ajax_store'])->name('state_ajax_store');
        Route::get('/edit/{id}', [StateController::class, 'edit', 'as' => 'admin.state.edit'])->name('state_edit');
        Route::post('/edit/{id}', [StateController::class, 'update', 'as' => 'admin.state.update'])->name('state_update');
        Route::get('/delete/{id}', [StateController::class, 'delete', 'as' => 'admin.state.delete'])->name('state_delete');
    });

    Route::prefix('/city')->group(function () {
        Route::get('/', [CityController::class, 'view', 'as' => 'admin.city.view'])->name('city_view');
        Route::get('/view/{id}', [CityController::class, 'display', 'as' => 'admin.city.display'])->name('city_display');
        Route::get('/city-all-ajax/{id}', [CityController::class, 'city_all_ajax', 'as' => 'admin.city.city_all_ajax'])->name('city_all_ajax');
        Route::get('/create', [CityController::class, 'create', 'as' => 'admin.city.create'])->name('city_create');
        Route::post('/create', [CityController::class, 'store', 'as' => 'admin.city.store'])->name('city_store');
        Route::get('/excel', [CityController::class, 'excel', 'as' => 'admin.city.excel'])->name('city_excel');
        Route::get('/edit/{id}', [CityController::class, 'edit', 'as' => 'admin.city.edit'])->name('city_edit');
        Route::post('/edit/{id}', [CityController::class, 'update', 'as' => 'admin.city.update'])->name('city_update');
        Route::get('/delete/{id}', [CityController::class, 'delete', 'as' => 'admin.city.delete'])->name('city_delete');
    });

    Route::prefix('/sub-city')->group(function () {
        Route::get('/', [SubCityController::class, 'view', 'as' => 'admin.subcity.view'])->name('subcity_view');
        Route::get('/view/{id}', [SubCityController::class, 'display', 'as' => 'admin.subcity.display'])->name('subcity_display');
        Route::get('/sub-city-all-ajax/{id}', [SubCityController::class, 'subcity_all_ajax', 'as' => 'admin.subcity.subcity_all_ajax'])->name('subcity_all_ajax');
        Route::get('/sub-city-major-all-ajax', [SubCityController::class, 'subcity_all_major_ajax', 'as' => 'admin.subcity.subcity_all_major_ajax'])->name('subcity_all_major_ajax');
        Route::get('/create', [SubCityController::class, 'create', 'as' => 'admin.subcity.create'])->name('subcity_create');
        Route::post('/create', [SubCityController::class, 'store', 'as' => 'admin.subcity.store'])->name('subcity_store');
        Route::get('/excel', [SubCityController::class, 'excel', 'as' => 'admin.subcity.excel'])->name('subcity_excel');
        Route::get('/edit/{id}', [SubCityController::class, 'edit', 'as' => 'admin.subcity.edit'])->name('subcity_edit');
        Route::post('/edit/{id}', [SubCityController::class, 'update', 'as' => 'admin.subcity.update'])->name('subcity_update');
        Route::get('/delete/{id}', [SubCityController::class, 'delete', 'as' => 'admin.subcity.delete'])->name('subcity_delete');
    });

    Route::prefix('/vehicle-type')->group(function () {
        Route::get('/', [VehicleTypeController::class, 'view', 'as' => 'admin.vehicletype.view'])->name('vehicletype_view');
        Route::get('/view/{id}', [VehicleTypeController::class, 'display', 'as' => 'admin.vehicletype.display'])->name('vehicletype_display');
        Route::get('/create', [VehicleTypeController::class, 'create', 'as' => 'admin.vehicletype.create'])->name('vehicletype_create');
        Route::post('/create', [VehicleTypeController::class, 'store', 'as' => 'admin.vehicletype.store'])->name('vehicletype_store');
        Route::get('/excel', [VehicleTypeController::class, 'excel', 'as' => 'admin.vehicletype.excel'])->name('vehicletype_excel');
        Route::get('/edit/{id}', [VehicleTypeController::class, 'edit', 'as' => 'admin.vehicletype.edit'])->name('vehicletype_edit');
        Route::post('/edit/{id}', [VehicleTypeController::class, 'update', 'as' => 'admin.vehicletype.update'])->name('vehicletype_update');
        Route::get('/delete/{id}', [VehicleTypeController::class, 'delete', 'as' => 'admin.vehicletype.delete'])->name('vehicletype_delete');
    });

    Route::prefix('/amenity')->group(function () {
        Route::get('/', [AmenityController::class, 'view', 'as' => 'admin.amenity.view'])->name('amenity_view');
        Route::get('/view/{id}', [AmenityController::class, 'display', 'as' => 'admin.amenity.display'])->name('amenity_display');
        Route::get('/create', [AmenityController::class, 'create', 'as' => 'admin.amenity.create'])->name('amenity_create');
        Route::post('/create', [AmenityController::class, 'store', 'as' => 'admin.amenity.store'])->name('amenity_store');
        Route::get('/excel', [AmenityController::class, 'excel', 'as' => 'admin.amenity.excel'])->name('amenity_excel');
        Route::get('/edit/{id}', [AmenityController::class, 'edit', 'as' => 'admin.amenity.edit'])->name('amenity_edit');
        Route::post('/edit/{id}', [AmenityController::class, 'update', 'as' => 'admin.amenity.update'])->name('amenity_update');
        Route::get('/delete/{id}', [AmenityController::class, 'delete', 'as' => 'admin.amenity.delete'])->name('amenity_delete');
    });

    Route::prefix('/accommodation')->group(function () {
        Route::get('/', [AccommodationController::class, 'view', 'as' => 'admin.accommodation.view'])->name('accommodation_view');
        Route::get('/view/{id}', [AccommodationController::class, 'display', 'as' => 'admin.accommodation.display'])->name('accommodation_display');
        Route::get('/create', [AccommodationController::class, 'create', 'as' => 'admin.accommodation.create'])->name('accommodation_create');
        Route::post('/create', [AccommodationController::class, 'store', 'as' => 'admin.accommodation.store'])->name('accommodation_store');
        Route::get('/excel', [AccommodationController::class, 'excel', 'as' => 'admin.accommodation.excel'])->name('accommodation_excel');
        Route::get('/edit/{id}', [AccommodationController::class, 'edit', 'as' => 'admin.accommodation.edit'])->name('accommodation_edit');
        Route::post('/edit/{id}', [AccommodationController::class, 'update', 'as' => 'admin.accommodation.update'])->name('accommodation_update');
        Route::get('/delete/{id}', [AccommodationController::class, 'delete', 'as' => 'admin.accommodation.delete'])->name('accommodation_delete');
    });

    Route::prefix('/transporter')->group(function () {
        Route::get('/', [TransporterController::class, 'view', 'as' => 'admin.transporter.view'])->name('transporter_view');
        Route::get('/view/{id}', [TransporterController::class, 'display', 'as' => 'admin.transporter.display'])->name('transporter_display');
        Route::get('/create', [TransporterController::class, 'create', 'as' => 'admin.transporter.create'])->name('transporter_create');
        Route::post('/create', [TransporterController::class, 'store', 'as' => 'admin.transporter.store'])->name('transporter_store');
        Route::get('/excel', [TransporterController::class, 'excel', 'as' => 'admin.transporter.excel'])->name('transporter_excel');
        Route::get('/edit/{id}', [TransporterController::class, 'edit', 'as' => 'admin.transporter.edit'])->name('transporter_edit');
        Route::post('/edit/{id}', [TransporterController::class, 'update', 'as' => 'admin.transporter.update'])->name('transporter_update');
        Route::get('/delete/{id}', [TransporterController::class, 'delete', 'as' => 'admin.transporter.delete'])->name('transporter_delete');

        Route::prefix('/driver/{transporter_id}')->group(function () {
            Route::get('/', [TransporterController::class, 'view_driver', 'as' => 'admin.transporter_driver.view'])->name('transporter_driver_view');
            Route::get('/view/{id}', [TransporterController::class, 'display_driver', 'as' => 'admin.transporter_driver.display'])->name('transporter_driver_display');
            Route::get('/create', [TransporterController::class, 'create_driver', 'as' => 'admin.transporter_driver.create'])->name('transporter_driver_create');
            Route::post('/create', [TransporterController::class, 'store_driver', 'as' => 'admin.transporter_driver.store'])->name('transporter_driver_store');
            Route::get('/edit/{id}', [TransporterController::class, 'edit_driver', 'as' => 'admin.transporter_driver.edit'])->name('transporter_driver_edit');
            Route::post('/edit/{id}', [TransporterController::class, 'update_driver', 'as' => 'admin.transporter_driver.update'])->name('transporter_driver_update');
            Route::get('/delete/{id}', [TransporterController::class, 'delete_driver', 'as' => 'admin.transporter_driver.delete'])->name('transporter_driver_delete');
        });

    });

    Route::prefix('/vehicle')->group(function () {
        Route::get('/', [VehicleController::class, 'view', 'as' => 'admin.vehicle.view'])->name('vehicle_view');
        Route::get('/view/{id}', [VehicleController::class, 'display', 'as' => 'admin.vehicle.display'])->name('vehicle_display');
        Route::get('/vehicle-all-ajax/{id}', [VehicleController::class, 'vehicle_all_ajax', 'as' => 'admin.city.vehicle_all_ajax'])->name('vehicle_all_ajax');
        Route::get('/create', [VehicleController::class, 'create', 'as' => 'admin.vehicle.create'])->name('vehicle_create');
        Route::post('/create', [VehicleController::class, 'store', 'as' => 'admin.vehicle.store'])->name('vehicle_store');
        Route::get('/excel', [VehicleController::class, 'excel', 'as' => 'admin.vehicle.excel'])->name('vehicle_excel');
        Route::get('/edit/{id}', [VehicleController::class, 'edit', 'as' => 'admin.vehicle.edit'])->name('vehicle_edit');
        Route::post('/edit/{id}', [VehicleController::class, 'update', 'as' => 'admin.vehicle.update'])->name('vehicle_update');
        Route::get('/delete/{id}', [VehicleController::class, 'delete', 'as' => 'admin.vehicle.delete'])->name('vehicle_delete');
        Route::get('/delete-upload-image/{id}', [VehicleController::class, 'delete_upload_image', 'as' => 'admin.vehicle.delete_upload_image'])->name('vehicle_delete_upload_image');
    });

    Route::prefix('/enquiry')->group(function () {
        Route::get('/', [EnquiryController::class, 'view', 'as' => 'admin.enquiry.view'])->name('enquiry_view');
        Route::get('/view/{id}', [EnquiryController::class, 'display', 'as' => 'admin.enquiry.display'])->name('enquiry_display');
        Route::get('/excel', [EnquiryController::class, 'excel', 'as' => 'admin.enquiry.excel'])->name('enquiry_excel');
        Route::get('/delete/{id}', [EnquiryController::class, 'delete', 'as' => 'admin.enquiry.delete'])->name('enquiry_delete');
    });
    
    Route::prefix('/complaint')->group(function () {
        Route::get('/', [ComplaintController::class, 'view', 'as' => 'admin.complaint.view'])->name('complaint_view');
        Route::get('/view/{id}', [ComplaintController::class, 'display', 'as' => 'admin.complaint.display'])->name('complaint_display');
        Route::get('/excel', [ComplaintController::class, 'excel', 'as' => 'admin.complaint.excel'])->name('complaint_excel');
        Route::get('/delete/{id}', [ComplaintController::class, 'delete', 'as' => 'admin.complaint.delete'])->name('complaint_delete');
    });

    Route::prefix('/package-type')->group(function () {
        Route::get('/', [PackageTypeController::class, 'view', 'as' => 'admin.packagetype.view'])->name('packagetype_view');
        Route::get('/view/{id}', [PackageTypeController::class, 'display', 'as' => 'admin.packagetype.display'])->name('packagetype_display');
        Route::get('/create', [PackageTypeController::class, 'create', 'as' => 'admin.packagetype.create'])->name('packagetype_create');
        Route::post('/create', [PackageTypeController::class, 'store', 'as' => 'admin.packagetype.store'])->name('packagetype_store');
        Route::get('/excel', [PackageTypeController::class, 'excel', 'as' => 'admin.packagetype.excel'])->name('packagetype_excel');
        Route::get('/edit/{id}', [PackageTypeController::class, 'edit', 'as' => 'admin.packagetype.edit'])->name('packagetype_edit');
        Route::post('/edit/{id}', [PackageTypeController::class, 'update', 'as' => 'admin.packagetype.update'])->name('packagetype_update');
        Route::get('/delete/{id}', [PackageTypeController::class, 'delete', 'as' => 'admin.packagetype.delete'])->name('packagetype_delete');
    });

    Route::prefix('/common-terms-condition')->group(function () {
        Route::get('/edit', [CommonController::class, 'terms_condition_edit', 'as' => 'admin.local_ride_terms_condition.edit'])->name('terms_condition_edit');
        Route::post('/edit', [CommonController::class, 'terms_condition_update', 'as' => 'admin.local_ride_terms_condition.update'])->name('terms_condition_edit');
    });

    Route::prefix('/common-include-exclude')->group(function () {
        Route::get('/edit', [CommonController::class, 'include_exclude_edit', 'as' => 'admin.local_ride_include_exclude.edit'])->name('include_exclude_edit');
        Route::post('/edit', [CommonController::class, 'include_exclude_update', 'as' => 'admin.local_ride_include_exclude.update'])->name('include_exclude_update');
    });

    Route::prefix('/common-description')->group(function () {
        Route::get('/edit', [CommonController::class, 'description_edit', 'as' => 'admin.local_ride_description.edit'])->name('description_edit');
        Route::post('/edit', [CommonController::class, 'description_update', 'as' => 'admin.local_ride_description.update'])->name('description_update');
    });
    
    Route::prefix('/common-notes')->group(function () {
        Route::get('/edit', [CommonController::class, 'note_edit', 'as' => 'admin.local_ride_note.edit'])->name('note_edit');
        Route::post('/edit', [CommonController::class, 'note_update', 'as' => 'admin.local_ride_note.update'])->name('note_update');
    });
    
    Route::prefix('/common-holiday-package-terms-condition')->group(function () {
        Route::get('/edit', [CommonController::class, 'holidaypackage_terms_condition_edit', 'as' => 'admin.local_ride_note.edit'])->name('holidaypackage_terms_condition_edit');
        Route::post('/edit', [CommonController::class, 'holidaypackage_terms_condition_update', 'as' => 'admin.local_ride_note.update'])->name('holidaypackage_terms_condition_update');
    });
    
    Route::prefix('/common-holiday-package-policy')->group(function () {
        Route::get('/edit', [CommonController::class, 'holidaypackage_policy_edit', 'as' => 'admin.local_ride_note.edit'])->name('holidaypackage_policy_edit');
        Route::post('/edit', [CommonController::class, 'holidaypackage_policy_update', 'as' => 'admin.local_ride_note.update'])->name('holidaypackage_policy_update');
    });

    Route::prefix('/common-outstation-terms-condition')->group(function () {
        Route::get('/edit', [CommonController::class, 'outstation_terms_condition_edit', 'as' => 'admin.outstation_terms_condition.edit'])->name('outstation_terms_condition_edit');
        Route::post('/edit', [CommonController::class, 'outstation_terms_condition_update', 'as' => 'admin.outstation_terms_condition.update'])->name('outstation_terms_condition_edit');
    });

    Route::prefix('/common-outstation-include-exclude')->group(function () {
        Route::get('/edit', [CommonController::class, 'outstation_include_exclude_edit', 'as' => 'admin.outstation_include_exclude.edit'])->name('outstation_include_exclude_edit');
        Route::post('/edit', [CommonController::class, 'outstation_include_exclude_update', 'as' => 'admin.outstation_include_exclude.update'])->name('outstation_include_exclude_update');
    });

    Route::prefix('/common-outstation-description')->group(function () {
        Route::get('/edit', [CommonController::class, 'outstation_description_edit', 'as' => 'admin.outstation_description.edit'])->name('outstation_description_edit');
        Route::post('/edit', [CommonController::class, 'outstation_description_update', 'as' => 'admin.outstation_description.update'])->name('outstation_description_update');
    });
    
    Route::prefix('/common-outstation-notes')->group(function () {
        Route::get('/edit', [CommonController::class, 'outstation_note_edit', 'as' => 'admin.outstation_note.edit'])->name('outstation_note_edit');
        Route::post('/edit', [CommonController::class, 'outstation_note_update', 'as' => 'admin.outstation_note.update'])->name('outstation_note_update');
    });
    
    Route::prefix('/common-airport-terms-condition')->group(function () {
        Route::get('/edit', [CommonController::class, 'airport_terms_condition_edit', 'as' => 'admin.airport_terms_condition.edit'])->name('airport_terms_condition_edit');
        Route::post('/edit', [CommonController::class, 'airport_terms_condition_update', 'as' => 'admin.airport_terms_condition.update'])->name('airport_terms_condition_edit');
    });

    Route::prefix('/common-airport-include-exclude')->group(function () {
        Route::get('/edit', [CommonController::class, 'airport_include_exclude_edit', 'as' => 'admin.airport_include_exclude.edit'])->name('airport_include_exclude_edit');
        Route::post('/edit', [CommonController::class, 'airport_include_exclude_update', 'as' => 'admin.airport_include_exclude.update'])->name('airport_include_exclude_update');
    });

    Route::prefix('/common-airport-description')->group(function () {
        Route::get('/edit', [CommonController::class, 'airport_description_edit', 'as' => 'admin.airport_description.edit'])->name('airport_description_edit');
        Route::post('/edit', [CommonController::class, 'airport_description_update', 'as' => 'admin.airport_description.update'])->name('airport_description_update');
    });
    
    Route::prefix('/common-airport-notes')->group(function () {
        Route::get('/edit', [CommonController::class, 'airport_note_edit', 'as' => 'admin.airport_note.edit'])->name('airport_note_edit');
        Route::post('/edit', [CommonController::class, 'airport_note_update', 'as' => 'admin.airport_note.update'])->name('airport_note_update');
    });

    Route::prefix('/local-ride')->group(function () {
        Route::get('/', [LocalRideController::class, 'view', 'as' => 'admin.localride.view'])->name('localride_view');
        Route::get('/view/{id}', [LocalRideController::class, 'display', 'as' => 'admin.localride.display'])->name('localride_display');
        Route::get('/create', [LocalRideController::class, 'create', 'as' => 'admin.localride.create'])->name('localride_create');
        Route::post('/create', [LocalRideController::class, 'store', 'as' => 'admin.localride.store'])->name('localride_store');
        Route::get('/excel', [LocalRideController::class, 'excel', 'as' => 'admin.localride.excel'])->name('localride_excel');
        Route::get('/edit/{id}', [LocalRideController::class, 'edit', 'as' => 'admin.localride.edit'])->name('localride_edit');
        Route::post('/edit/{id}', [LocalRideController::class, 'update', 'as' => 'admin.localride.update'])->name('localride_update');
        Route::get('/delete/{id}', [LocalRideController::class, 'delete', 'as' => 'admin.localride.delete'])->name('localride_delete');
    });
    
    Route::prefix('/outstation')->group(function () {
        Route::get('/', [OutStationController::class, 'view', 'as' => 'admin.outstation.view'])->name('outstation_view');
        Route::get('/view/{id}', [OutStationController::class, 'display', 'as' => 'admin.outstation.display'])->name('outstation_display');
        Route::get('/create', [OutStationController::class, 'create', 'as' => 'admin.outstation.create'])->name('outstation_create');
        Route::post('/create', [OutStationController::class, 'store', 'as' => 'admin.outstation.store'])->name('outstation_store');
        Route::get('/excel', [OutStationController::class, 'excel', 'as' => 'admin.outstation.excel'])->name('outstation_excel');
        Route::get('/edit/{id}', [OutStationController::class, 'edit', 'as' => 'admin.outstation.edit'])->name('outstation_edit');
        Route::post('/edit/{id}', [OutStationController::class, 'update', 'as' => 'admin.outstation.update'])->name('outstation_update');
        Route::get('/delete/{id}', [OutStationController::class, 'delete', 'as' => 'admin.outstation.delete'])->name('outstation_delete');
    });
    
    Route::prefix('/airport-ride')->group(function () {
        Route::get('/', [AirportRideController::class, 'view', 'as' => 'admin.airportride.view'])->name('airportride_view');
        Route::get('/view/{id}', [AirportRideController::class, 'display', 'as' => 'admin.airportride.display'])->name('airportride_display');
        Route::get('/create', [AirportRideController::class, 'create', 'as' => 'admin.airportride.create'])->name('airportride_create');
        Route::post('/create', [AirportRideController::class, 'store', 'as' => 'admin.airportride.store'])->name('airportride_store');
        Route::get('/excel', [AirportRideController::class, 'excel', 'as' => 'admin.airportride.excel'])->name('airportride_excel');
        Route::get('/edit/{id}', [AirportRideController::class, 'edit', 'as' => 'admin.airportride.edit'])->name('airportride_edit');
        Route::post('/edit/{id}', [AirportRideController::class, 'update', 'as' => 'admin.airportride.update'])->name('airportride_update');
        Route::get('/delete/{id}', [AirportRideController::class, 'delete', 'as' => 'admin.airportride.delete'])->name('airportride_delete');
    });

    Route::prefix('/coupon')->group(function () {
        Route::get('/', [CouponController::class, 'view', 'as' => 'admin.coupon.view'])->name('coupon_view');
        Route::get('/view/{id}', [CouponController::class, 'display', 'as' => 'admin.coupon.display'])->name('coupon_display');
        Route::get('/create', [CouponController::class, 'create', 'as' => 'admin.coupon.create'])->name('coupon_create');
        Route::post('/create', [CouponController::class, 'store', 'as' => 'admin.coupon.store'])->name('coupon_store');
        Route::get('/excel', [CouponController::class, 'excel', 'as' => 'admin.coupon.excel'])->name('coupon_excel');
        Route::get('/edit/{id}', [CouponController::class, 'edit', 'as' => 'admin.coupon.edit'])->name('coupon_edit');
        Route::post('/edit/{id}', [CouponController::class, 'update', 'as' => 'admin.coupon.update'])->name('coupon_update');
        Route::get('/delete/{id}', [CouponController::class, 'delete', 'as' => 'admin.coupon.delete'])->name('coupon_delete');
    });
    
    Route::prefix('/airport')->group(function () {
        Route::get('/', [AirportController::class, 'view', 'as' => 'admin.airport.view'])->name('airport_view');
        Route::get('/view/{id}', [AirportController::class, 'display', 'as' => 'admin.airport.display'])->name('airport_display');
        Route::get('/airport-all-ajax/{id}', [AirportController::class, 'airport_all_ajax', 'as' => 'admin.airport.airport_all_ajax'])->name('airport_all_ajax');
        Route::get('/create', [AirportController::class, 'create', 'as' => 'admin.airport.create'])->name('airport_create');
        Route::post('/create', [AirportController::class, 'store', 'as' => 'admin.airport.store'])->name('airport_store');
        Route::get('/excel', [AirportController::class, 'excel', 'as' => 'admin.airport.excel'])->name('airport_excel');
        Route::get('/edit/{id}', [AirportController::class, 'edit', 'as' => 'admin.airport.edit'])->name('airport_edit');
        Route::post('/edit/{id}', [AirportController::class, 'update', 'as' => 'admin.airport.update'])->name('airport_update');
        Route::get('/delete/{id}', [AirportController::class, 'delete', 'as' => 'admin.airport.delete'])->name('airport_delete');
    });
    
    Route::prefix('/sub-admin')->group(function () {
        Route::get('/', [SubAdminController::class, 'view', 'as' => 'admin.subadmin.view'])->name('subadmin_view');
        Route::get('/view/{id}', [SubAdminController::class, 'display', 'as' => 'admin.subadmin.display'])->name('subadmin_display');
        Route::get('/create', [SubAdminController::class, 'create', 'as' => 'admin.subadmin.create'])->name('subadmin_create');
        Route::post('/create', [SubAdminController::class, 'store', 'as' => 'admin.subadmin.store'])->name('subadmin_store');
        Route::get('/excel', [SubAdminController::class, 'excel', 'as' => 'admin.subadmin.excel'])->name('subadmin_excel');
        Route::get('/edit/{id}', [SubAdminController::class, 'edit', 'as' => 'admin.subadmin.edit'])->name('subadmin_edit');
        Route::post('/edit/{id}', [SubAdminController::class, 'update', 'as' => 'admin.subadmin.update'])->name('subadmin_update');
        Route::get('/delete/{id}', [SubAdminController::class, 'delete', 'as' => 'admin.subadmin.delete'])->name('subadmin_delete');
    });
    
    Route::prefix('/festival')->group(function () {
        Route::get('/', [FestivalController::class, 'view', 'as' => 'admin.festival.view'])->name('festival_view');
        Route::get('/view/{id}', [FestivalController::class, 'display', 'as' => 'admin.festival.display'])->name('festival_display');
        Route::get('/create', [FestivalController::class, 'create', 'as' => 'admin.festival.create'])->name('festival_create');
        Route::post('/create', [FestivalController::class, 'store', 'as' => 'admin.festival.store'])->name('festival_store');
        Route::get('/excel', [FestivalController::class, 'excel', 'as' => 'admin.festival.excel'])->name('festival_excel');
        Route::get('/edit/{id}', [FestivalController::class, 'edit', 'as' => 'admin.festival.edit'])->name('festival_edit');
        Route::post('/edit/{id}', [FestivalController::class, 'update', 'as' => 'admin.festival.update'])->name('festival_update');
        Route::get('/delete/{id}', [FestivalController::class, 'delete', 'as' => 'admin.festival.delete'])->name('festival_delete');
    });
    
    Route::prefix('/holiday-package')->group(function () {
        Route::get('/', [HolidayPackageController::class, 'view', 'as' => 'admin.holidaypackage.view'])->name('holidaypackage_view');
        Route::get('/view/{id}', [HolidayPackageController::class, 'display', 'as' => 'admin.holidaypackage.display'])->name('holidaypackage_display');
        Route::get('/preview/{url}', [HolidayPackageController::class, 'preview', 'as' => 'admin.holidaypackage.preview'])->name('holidaypackage_preview');
        Route::get('/create', [HolidayPackageController::class, 'create', 'as' => 'admin.holidaypackage.create'])->name('holidaypackage_create');
        Route::post('/create', [HolidayPackageController::class, 'store', 'as' => 'admin.holidaypackage.store'])->name('holidaypackage_store');
        Route::get('/excel', [HolidayPackageController::class, 'excel', 'as' => 'admin.holidaypackage.excel'])->name('holidaypackage_excel');
        Route::get('/edit/{id}', [HolidayPackageController::class, 'edit', 'as' => 'admin.holidaypackage.edit'])->name('holidaypackage_edit');
        Route::post('/edit/{id}', [HolidayPackageController::class, 'update', 'as' => 'admin.holidaypackage.update'])->name('holidaypackage_update');
        Route::get('/delete/{id}', [HolidayPackageController::class, 'delete', 'as' => 'admin.holidaypackage.delete'])->name('holidaypackage_delete');
    });
    
    Route::prefix('/dynamic-web-pages')->group(function () {
        Route::get('/', [DynamicWebPageController::class, 'view', 'as' => 'admin.dynamicwebpage.view'])->name('dynamicwebpage_view');
        Route::get('/view/{id}', [DynamicWebPageController::class, 'display', 'as' => 'admin.dynamicwebpage.display'])->name('dynamicwebpage_display');
        Route::get('/create', [DynamicWebPageController::class, 'create', 'as' => 'admin.dynamicwebpage.create'])->name('dynamicwebpage_create');
        Route::post('/create', [DynamicWebPageController::class, 'store', 'as' => 'admin.dynamicwebpage.store'])->name('dynamicwebpage_store');
        Route::get('/excel', [DynamicWebPageController::class, 'excel', 'as' => 'admin.dynamicwebpage.excel'])->name('dynamicwebpage_excel');
        Route::get('/edit/{id}', [DynamicWebPageController::class, 'edit', 'as' => 'admin.dynamicwebpage.edit'])->name('dynamicwebpage_edit');
        Route::post('/edit/{id}', [DynamicWebPageController::class, 'update', 'as' => 'admin.dynamicwebpage.update'])->name('dynamicwebpage_update');
        Route::get('/delete/{id}', [DynamicWebPageController::class, 'delete', 'as' => 'admin.dynamicwebpage.delete'])->name('dynamicwebpage_delete');
    });

    Route::prefix('/seo-meta')->group(function () {
        Route::get('/', [SEOMetaController::class, 'view', 'as' => 'admin.seometa.view'])->name('seometa_view');
        Route::get('/view/{id}', [SEOMetaController::class, 'display', 'as' => 'admin.seometa.display'])->name('seometa_display');
        Route::get('/excel', [SEOMetaController::class, 'excel', 'as' => 'admin.seometa.excel'])->name('seometa_excel');
        Route::get('/edit/{id}', [SEOMetaController::class, 'edit', 'as' => 'admin.seometa.edit'])->name('seometa_edit');
        Route::post('/edit/{id}', [SEOMetaController::class, 'update', 'as' => 'admin.seometa.update'])->name('seometa_update');
    });
    
    Route::prefix('/faq')->group(function () {
        Route::get('/', [FAQController::class, 'view', 'as' => 'admin.faq.view'])->name('faq_view');
        Route::get('/view/{id}', [FAQController::class, 'display', 'as' => 'admin.faq.display'])->name('faq_display');
        Route::get('/create', [FAQController::class, 'create', 'as' => 'admin.faq.create'])->name('faq_create');
        Route::post('/create', [FAQController::class, 'store', 'as' => 'admin.faq.store'])->name('faq_store');
        Route::get('/excel', [FAQController::class, 'excel', 'as' => 'admin.faq.excel'])->name('faq_excel');
        Route::get('/edit/{id}', [FAQController::class, 'edit', 'as' => 'admin.faq.edit'])->name('faq_edit');
        Route::post('/edit/{id}', [FAQController::class, 'update', 'as' => 'admin.faq.update'])->name('faq_update');
        Route::get('/delete/{id}', [FAQController::class, 'delete', 'as' => 'admin.faq.delete'])->name('faq_delete');
    });
    
    Route::prefix('/vehicle-type-seo')->group(function () {
        Route::get('/', [VehicleTypeSeoController::class, 'view', 'as' => 'admin.vehicletypeseo.view'])->name('vehicletypeseo_view');
        Route::get('/view/{id}', [VehicleTypeSeoController::class, 'display', 'as' => 'admin.vehicletypeseo.display'])->name('vehicletypeseo_display');
        Route::get('/preview/{id}', [VehicleTypeSeoController::class, 'preview', 'as' => 'admin.vehicletypeseo.preview'])->name('vehicletypeseo_preview');
        Route::get('/create', [VehicleTypeSeoController::class, 'create', 'as' => 'admin.vehicletypeseo.create'])->name('vehicletypeseo_create');
        Route::post('/create', [VehicleTypeSeoController::class, 'store', 'as' => 'admin.vehicletypeseo.store'])->name('vehicletypeseo_store');
        Route::get('/edit/{id}', [VehicleTypeSeoController::class, 'edit', 'as' => 'admin.vehicletypeseo.edit'])->name('vehicletypeseo_edit');
        Route::post('/edit/{id}', [VehicleTypeSeoController::class, 'update', 'as' => 'admin.vehicletypeseo.update'])->name('vehicletypeseo_update');
        Route::get('/delete/{id}', [VehicleTypeSeoController::class, 'delete', 'as' => 'admin.vehicletypeseo.delete'])->name('vehicletypeseo_delete');
        Route::prefix('/banner-images/{vehicleseotype_id}')->group(function () {
            Route::get('/', [VehicleTypeSeoController::class, 'view_image', 'as' => 'admin.vehicletypeseo_image.view'])->name('vehicletypeseo_image_view');
            Route::get('/view/{id}', [VehicleTypeSeoController::class, 'display_image', 'as' => 'admin.vehicletypeseo_image.display'])->name('vehicletypeseo_image_display');
            Route::get('/create', [VehicleTypeSeoController::class, 'create_image', 'as' => 'admin.vehicletypeseo_image.create'])->name('vehicletypeseo_image_create');
            Route::post('/create', [VehicleTypeSeoController::class, 'store_image', 'as' => 'admin.vehicletypeseo_image.store'])->name('vehicletypeseo_image_store');
            Route::get('/edit/{id}', [VehicleTypeSeoController::class, 'edit_image', 'as' => 'admin.vehicletypeseo_image.edit'])->name('vehicletypeseo_image_edit');
            Route::post('/edit/{id}', [VehicleTypeSeoController::class, 'update_image', 'as' => 'admin.vehicletypeseo_image.update'])->name('vehicletypeseo_image_update');
            Route::get('/delete/{id}', [VehicleTypeSeoController::class, 'delete_image', 'as' => 'admin.vehicletypeseo_image.delete'])->name('vehicletypeseo_image_delete');
        });
        Route::prefix('/content-layout/{vehicleseotype_id}')->group(function () {
            Route::get('/', [VehicleTypeSeoController::class, 'view_content_layout', 'as' => 'admin.vehicletypeseo_content_layout.view'])->name('vehicletypeseo_content_layout_view');
            Route::get('/view/{id}', [VehicleTypeSeoController::class, 'display_content_layout', 'as' => 'admin.vehicletypeseo_content_layout.display'])->name('vehicletypeseo_content_layout_display');
            Route::get('/create', [VehicleTypeSeoController::class, 'create_content_layout', 'as' => 'admin.vehicletypeseo_content_layout.create'])->name('vehicletypeseo_content_layout_create');
            Route::post('/create', [VehicleTypeSeoController::class, 'store_content_layout', 'as' => 'admin.vehicletypeseo_content_layout.store'])->name('vehicletypeseo_content_layout_store');
            Route::get('/edit/{id}', [VehicleTypeSeoController::class, 'edit_content_layout', 'as' => 'admin.vehicletypeseo_content_layout.edit'])->name('vehicletypeseo_content_layout_edit');
            Route::post('/edit/{id}', [VehicleTypeSeoController::class, 'update_content_layout', 'as' => 'admin.vehicletypeseo_content_layout.update'])->name('vehicletypeseo_content_layout_update');
            Route::get('/delete/{id}', [VehicleTypeSeoController::class, 'delete_content_layout', 'as' => 'admin.vehicletypeseo_content_layout.delete'])->name('vehicletypeseo_content_layout_delete');
        });
        
    });

    Route::prefix('/list-layout')->group(function () {
        Route::get('/', [ListLayoutController::class, 'view_list_layout', 'as' => 'admin.list_layout.view'])->name('list_layout_view');
        Route::get('/view/{id}', [ListLayoutController::class, 'display_list_layout', 'as' => 'admin.list_layout.display'])->name('list_layout_display');
        Route::get('/create', [ListLayoutController::class, 'create_list_layout', 'as' => 'admin.list_layout.create'])->name('list_layout_create');
        Route::post('/create', [ListLayoutController::class, 'store_list_layout', 'as' => 'admin.list_layout.store'])->name('list_layout_store');
        Route::get('/edit/{id}', [ListLayoutController::class, 'edit_list_layout', 'as' => 'admin.list_layout.edit'])->name('list_layout_edit');
        Route::post('/edit/{id}', [ListLayoutController::class, 'update_list_layout', 'as' => 'admin.list_layout.update'])->name('list_layout_update');
        Route::get('/delete/{id}', [ListLayoutController::class, 'delete_list_layout', 'as' => 'admin.list_layout.delete'])->name('list_layout_delete');
    });
    Route::prefix('/content-layout')->group(function () {
        Route::get('/', [ContentLayoutController::class, 'view_content_layout', 'as' => 'admin.content_layout.view'])->name('content_layout_view');
        Route::get('/view/{id}', [ContentLayoutController::class, 'display_content_layout', 'as' => 'admin.content_layout.display'])->name('content_layout_display');
        Route::get('/create', [ContentLayoutController::class, 'create_content_layout', 'as' => 'admin.content_layout.create'])->name('content_layout_create');
        Route::post('/create', [ContentLayoutController::class, 'store_content_layout', 'as' => 'admin.content_layout.store'])->name('content_layout_store');
        Route::get('/edit/{id}', [ContentLayoutController::class, 'edit_content_layout', 'as' => 'admin.content_layout.edit'])->name('content_layout_edit');
        Route::post('/edit/{id}', [ContentLayoutController::class, 'update_content_layout', 'as' => 'admin.content_layout.update'])->name('content_layout_update');
        Route::get('/delete/{id}', [ContentLayoutController::class, 'delete_content_layout', 'as' => 'admin.content_layout.delete'])->name('content_layout_delete');
    });

    Route::prefix('/vehicle-seo')->group(function () {
        Route::get('/', [VehicleSeoController::class, 'view', 'as' => 'admin.vehicleseo.view'])->name('vehicleseo_view');
        Route::get('/preview/{id}', [VehicleSeoController::class, 'preview', 'as' => 'admin.vehicleseo.preview'])->name('vehicleseo_preview');
        Route::get('/view/{id}', [VehicleSeoController::class, 'display', 'as' => 'admin.vehicleseo.display'])->name('vehicleseo_display');
        Route::get('/create', [VehicleSeoController::class, 'create', 'as' => 'admin.vehicleseo.create'])->name('vehicleseo_create');
        Route::post('/create', [VehicleSeoController::class, 'store', 'as' => 'admin.vehicleseo.store'])->name('vehicleseo_store');
        Route::get('/edit/{id}', [VehicleSeoController::class, 'edit', 'as' => 'admin.vehicleseo.edit'])->name('vehicleseo_edit');
        Route::post('/edit/{id}', [VehicleSeoController::class, 'update', 'as' => 'admin.vehicleseo.update'])->name('vehicleseo_update');
        Route::get('/delete/{id}', [VehicleSeoController::class, 'delete', 'as' => 'admin.vehicleseo.delete'])->name('vehicleseo_delete');
        
        Route::prefix('/content-layout/{vehicleseo_id}')->group(function () {
            Route::get('/', [VehicleSeoController::class, 'view_content_layout', 'as' => 'admin.vehicleseo_content_layout.view'])->name('vehicleseo_content_layout_view');
            Route::get('/view/{id}', [VehicleSeoController::class, 'display_content_layout', 'as' => 'admin.vehicleseo_content_layout.display'])->name('vehicleseo_content_layout_display');
            Route::get('/create', [VehicleSeoController::class, 'create_content_layout', 'as' => 'admin.vehicleseo_content_layout.create'])->name('vehicleseo_content_layout_create');
            Route::post('/create', [VehicleSeoController::class, 'store_content_layout', 'as' => 'admin.vehicleseo_content_layout.store'])->name('vehicleseo_content_layout_store');
            Route::get('/edit/{id}', [VehicleSeoController::class, 'edit_content_layout', 'as' => 'admin.vehicleseo_content_layout.edit'])->name('vehicleseo_content_layout_edit');
            Route::post('/edit/{id}', [VehicleSeoController::class, 'update_content_layout', 'as' => 'admin.vehicleseo_content_layout.update'])->name('vehicleseo_content_layout_update');
            Route::get('/delete/{id}', [VehicleSeoController::class, 'delete_content_layout', 'as' => 'admin.vehicleseo_content_layout.delete'])->name('vehicleseo_content_layout_delete');
        });
    });

    Route::prefix('/holiday-package-seo')->group(function () {
        Route::get('/', [HolidayPackageSeoController::class, 'view', 'as' => 'admin.holidaypackageseo.view'])->name('holidaypackageseo_view');
        Route::get('/view/{id}', [HolidayPackageSeoController::class, 'display', 'as' => 'admin.holidaypackageseo.display'])->name('holidaypackageseo_display');
        Route::get('/create', [HolidayPackageSeoController::class, 'create', 'as' => 'admin.holidaypackageseo.create'])->name('holidaypackageseo_create');
        Route::post('/create', [HolidayPackageSeoController::class, 'store', 'as' => 'admin.holidaypackageseo.store'])->name('holidaypackageseo_store');
        Route::get('/edit/{id}', [HolidayPackageSeoController::class, 'edit', 'as' => 'admin.holidaypackageseo.edit'])->name('holidaypackageseo_edit');
        Route::post('/edit/{id}', [HolidayPackageSeoController::class, 'update', 'as' => 'admin.holidaypackageseo.update'])->name('holidaypackageseo_update');
        Route::get('/delete/{id}', [HolidayPackageSeoController::class, 'delete', 'as' => 'admin.holidaypackageseo.delete'])->name('holidaypackageseo_delete');
        Route::prefix('/banner-images/{holidaypackageseo_id}')->group(function () {
            Route::get('/', [HolidayPackageSeoController::class, 'view_image', 'as' => 'admin.holidaypackageseo_image.view'])->name('holidaypackageseo_image_view');
            Route::get('/view/{id}', [HolidayPackageSeoController::class, 'display_image', 'as' => 'admin.holidaypackageseo_image.display'])->name('holidaypackageseo_image_display');
            Route::get('/create', [HolidayPackageSeoController::class, 'create_image', 'as' => 'admin.holidaypackageseo_image.create'])->name('holidaypackageseo_image_create');
            Route::post('/create', [HolidayPackageSeoController::class, 'store_image', 'as' => 'admin.holidaypackageseo_image.store'])->name('holidaypackageseo_image_store');
            Route::get('/edit/{id}', [HolidayPackageSeoController::class, 'edit_image', 'as' => 'admin.holidaypackageseo_image.edit'])->name('holidaypackageseo_image_edit');
            Route::post('/edit/{id}', [HolidayPackageSeoController::class, 'update_image', 'as' => 'admin.holidaypackageseo_image.update'])->name('holidaypackageseo_image_update');
            Route::get('/delete/{id}', [HolidayPackageSeoController::class, 'delete_image', 'as' => 'admin.holidaypackageseo_image.delete'])->name('holidaypackageseo_image_delete');
        });
        Route::prefix('/content-layout/{holidaypackageseo_id}')->group(function () {
            Route::get('/', [HolidayPackageSeoController::class, 'view_content_layout', 'as' => 'admin.holidaypackageseo_content_layout.view'])->name('holidaypackageseo_content_layout_view');
            Route::get('/view/{id}', [HolidayPackageSeoController::class, 'display_content_layout', 'as' => 'admin.holidaypackageseo_content_layout.display'])->name('holidaypackageseo_content_layout_display');
            Route::get('/create', [HolidayPackageSeoController::class, 'create_content_layout', 'as' => 'admin.holidaypackageseo_content_layout.create'])->name('holidaypackageseo_content_layout_create');
            Route::post('/create', [HolidayPackageSeoController::class, 'store_content_layout', 'as' => 'admin.holidaypackageseo_content_layout.store'])->name('holidaypackageseo_content_layout_store');
            Route::get('/edit/{id}', [HolidayPackageSeoController::class, 'edit_content_layout', 'as' => 'admin.holidaypackageseo_content_layout.edit'])->name('holidaypackageseo_content_layout_edit');
            Route::post('/edit/{id}', [HolidayPackageSeoController::class, 'update_content_layout', 'as' => 'admin.holidaypackageseo_content_layout.update'])->name('holidaypackageseo_content_layout_update');
            Route::get('/delete/{id}', [HolidayPackageSeoController::class, 'delete_content_layout', 'as' => 'admin.holidaypackageseo_content_layout.delete'])->name('holidaypackageseo_content_layout_delete');
        });
        
    });
    
    Route::prefix('/testimonial')->group(function () {
        Route::get('/', [TestimonialController::class, 'view', 'as' => 'admin.testimonial.view'])->name('testimonial_view');
        Route::get('/view/{id}', [TestimonialController::class, 'display', 'as' => 'admin.testimonial.display'])->name('testimonial_display');
        Route::get('/create', [TestimonialController::class, 'create', 'as' => 'admin.testimonial.create'])->name('testimonial_create');
        Route::post('/create', [TestimonialController::class, 'store', 'as' => 'admin.testimonial.store'])->name('testimonial_store');
        Route::get('/edit/{id}', [TestimonialController::class, 'edit', 'as' => 'admin.testimonial.edit'])->name('testimonial_edit');
        Route::post('/edit/{id}', [TestimonialController::class, 'update', 'as' => 'admin.testimonial.update'])->name('testimonial_update');
        Route::get('/delete/{id}', [TestimonialController::class, 'delete', 'as' => 'admin.testimonial.delete'])->name('testimonial_delete');
        Route::get('/excel', [TestimonialController::class, 'excel', 'as' => 'admin.testimonial.excel'])->name('testimonial_excel');
    });

    Route::get('/logout', [DashboardController::class, 'logout', 'as' => 'admin.logout'])->name('logout');
});