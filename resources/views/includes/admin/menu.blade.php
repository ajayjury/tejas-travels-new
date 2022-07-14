
            <!-- ========== App Menu ========== -->
            <div class="app-menu navbar-menu">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <!-- Dark Logo-->
                    <a href="{{route('dashboard')}}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('admin/images/tejas-travel-ico.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('admin/images/tejas-travel-logo.png') }}" alt="" height="17">
                        </span>
                    </a>
                    <!-- Light Logo-->
                    <a href="{{route('dashboard')}}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('admin/images/tejas-travel-ico.png') }}" alt="" height="30">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('admin/images/tejas-travel-logo.png') }}" alt="" height="30">
                        </span>
                    </a>
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>

                <div id="scrollbar">
                    <div class="container-fluid">
            
                        <div id="two-column-menu">
                        </div>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link {{strpos(url()->current(),'country') !== false || strpos(url()->current(),'state') !== false || strpos(url()->current(),'sub-city') !== false || strpos(url()->current(),'city') !== false ? 'active' : ''}}" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{strpos(url()->current(),'country') !== false || strpos(url()->current(),'state') !== false || strpos(url()->current(),'sub-city') !== false || strpos(url()->current(),'city') !== false ? 'true' : 'false'}}" aria-controls="sidebarDashboards">
                                    <i class="ri-account-pin-circle-fill"></i> <span data-key="t-dashboards">Location Management</span>
                                </a>
                                <div class="collapse menu-dropdown {{strpos(url()->current(),'country') !== false || strpos(url()->current(),'state') !== false || strpos(url()->current(),'subcity') !== false || strpos(url()->current(),'city') !== false ? 'show' : ''}}" id="sidebarDashboards">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('country_view')}}" class="nav-link {{strpos(url()->current(),'country') !== false ? 'active' : ''}}" data-key="t-analytics"> Countries </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('state_view')}}" class="nav-link {{strpos(url()->current(),'state') !== false ? 'active' : ''}}" data-key="t-analytics"> States </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('city_view')}}" class="nav-link {{strpos(url()->current(),'city') !== false ? 'active' : ''}}" data-key="t-analytics"> Cities </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('subcity_view')}}" class="nav-link {{strpos(url()->current(),'sub-city') !== false ? 'active' : ''}}" data-key="t-analytics"> Sub-Cities </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> <!-- end Dashboard Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{strpos(url()->current(),'vehicle-type') !== false || strpos(url()->current(),'vehicle') !== false || strpos(url()->current(),'amenity') !== false || strpos(url()->current(),'accommodation') !== false || strpos(url()->current(),'transporter') !== false || strpos(url()->current(),'package-type') !== false || strpos(url()->current(),'airport') !== false || strpos(url()->current(),'festival') !== false ? 'active' : ''}}" href="#sidebarDashboards1" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{strpos(url()->current(),'vehicle-type') !== false || strpos(url()->current(),'vehicle') !== false || strpos(url()->current(),'amenity') !== false || strpos(url()->current(),'accommodation') !== false || strpos(url()->current(),'transporter') !== false || strpos(url()->current(),'package-type') !== false || strpos(url()->current(),'airport') !== false || strpos(url()->current(),'festival') !== false ? 'true' : 'false'}}" aria-controls="sidebarDashboards1">
                                    <i class="bx bx-folder-plus"></i> <span data-key="t-dashboards">Master</span>
                                </a>
                                <div class="collapse menu-dropdown {{strpos(url()->current(),'vehicle-type') !== false || strpos(url()->current(),'vehicle') !== false || strpos(url()->current(),'amenity') !== false || strpos(url()->current(),'accommodation') !== false || strpos(url()->current(),'transporter') !== false || strpos(url()->current(),'package-type') !== false || strpos(url()->current(),'airport') !== false || strpos(url()->current(),'festival') !== false ? 'show' : ''}}" id="sidebarDashboards1">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('vehicletype_view')}}" class="nav-link {{strpos(url()->current(),'vehicle-type') !== false ? 'active' : ''}}" data-key="t-analytics"> Vehicle Types </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('vehicle_view')}}" class="nav-link {{strpos(url()->current(),'vehicle') !== false ? 'active' : ''}}" data-key="t-analytics"> Vehicle </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('amenity_view')}}" class="nav-link {{strpos(url()->current(),'amenity') !== false ? 'active' : ''}}" data-key="t-analytics"> Amenity </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('accommodation_view')}}" class="nav-link {{strpos(url()->current(),'accommodation') !== false ? 'active' : ''}}" data-key="t-analytics"> Accommodation </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('transporter_view')}}" class="nav-link {{strpos(url()->current(),'transporter') !== false ? 'active' : ''}}" data-key="t-analytics"> Transporter </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('packagetype_view')}}" class="nav-link {{strpos(url()->current(),'package-type') !== false ? 'active' : ''}}" data-key="t-analytics"> Package Type </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('airport_view')}}" class="nav-link {{strpos(url()->current(),'airport') !== false ? 'active' : ''}}" data-key="t-analytics"> Airport </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('festival_view')}}" class="nav-link {{strpos(url()->current(),'festival') !== false ? 'active' : ''}}" data-key="t-analytics"> Festival </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> <!-- end Dashboard Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{strpos(url()->current(),'enquiry') !== false || strpos(url()->current(),'complaint') !== false ? 'active' : ''}}" href="#sidebarDashboards4" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{strpos(url()->current(),'enquiry') !== false || strpos(url()->current(),'complaint') !== false ? 'true' : 'false'}}" aria-controls="sidebarDashboards4">
                                    <i class="ri-message-fill"></i> <span data-key="t-dashboards">Enquiry Management</span>
                                </a>
                                <div class="collapse menu-dropdown {{strpos(url()->current(),'enquiry') !== false || strpos(url()->current(),'complaint') !== false  ? 'show' : ''}}" id="sidebarDashboards4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('enquiry_view')}}" class="nav-link {{strpos(url()->current(),'enquiry') !== false ? 'active' : ''}}" data-key="t-analytics"> Enquiries </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('complaint_view')}}" class="nav-link {{strpos(url()->current(),'complaint') !== false ? 'active' : ''}}" data-key="t-analytics"> Complaints </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> <!-- end Dashboard Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{strpos(url()->current(),'local-ride') !== false || strpos(url()->current(),'outstation') !== false || strpos(url()->current(),'coupon') !== false || strpos(url()->current(),'airport-ride') !== false ? 'active' : ''}}" href="#sidebarDashboards2" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{strpos(url()->current(),'local-ride') !== false || strpos(url()->current(),'outstation') !== false || strpos(url()->current(),'coupon') !== false || strpos(url()->current(),'airport-ride') !== false ? 'true' : 'false'}}" aria-controls="sidebarDashboards2">
                                    <i class="ri-exchange-dollar-line"></i> <span data-key="t-dashboards">Prices</span>
                                </a>
                                <div class="collapse menu-dropdown {{strpos(url()->current(),'local-ride') !== false || strpos(url()->current(),'outstation') !== false || strpos(url()->current(),'coupon') !== false || strpos(url()->current(),'airport-ride') !== false  ? 'show' : ''}}" id="sidebarDashboards2">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('localride_view')}}" class="nav-link {{strpos(url()->current(),'local-ride') !== false ? 'active' : ''}}" data-key="t-analytics"> Local Ride </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('outstation_view')}}" class="nav-link {{strpos(url()->current(),'outstation') !== false ? 'active' : ''}}" data-key="t-analytics"> OutStation </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('airportride_view')}}" class="nav-link {{strpos(url()->current(),'airport-ride') !== false ? 'active' : ''}}" data-key="t-analytics"> Airport Ride </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('coupon_view')}}" class="nav-link {{strpos(url()->current(),'coupon') !== false ? 'active' : ''}}" data-key="t-analytics"> Coupons </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> <!-- end Dashboard Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{strpos(url()->current(),'common-terms-condition') !== false || strpos(url()->current(),'common-include-exclude') !== false || strpos(url()->current(),'common-description') !== false || strpos(url()->current(),'common-note') !== false || strpos(url()->current(),'common-holiday-package-terms-condition') !== false || strpos(url()->current(),'common-holiday-package-policy') !== false ? 'active' : ''}}" href="#sidebarDashboards3" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{strpos(url()->current(),'common-terms-condition') !== false || strpos(url()->current(),'common-include-exclude') !== false || strpos(url()->current(),'common-description') !== false || strpos(url()->current(),'common-note') !== false || strpos(url()->current(),'common-holiday-package-terms-condition') !== false || strpos(url()->current(),'common-holiday-package-policy') !== false ? 'true' : 'false'}}" aria-controls="sidebarDashboards3">
                                    <i class="ri-questionnaire-fill"></i> <span data-key="t-dashboards">Commons</span>
                                </a>
                                <div class="collapse menu-dropdown {{strpos(url()->current(),'common-terms-condition') !== false || strpos(url()->current(),'common-include-exclude') !== false  || strpos(url()->current(),'common-description') !== false  || strpos(url()->current(),'common-note') !== false || strpos(url()->current(),'common-holiday-package-terms-condition') !== false || strpos(url()->current(),'common-holiday-package-policy') !== false  ? 'show' : ''}}" id="sidebarDashboards3">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('terms_condition_edit')}}" class="nav-link {{strpos(url()->current(),'common-terms-condition') !== false ? 'active' : ''}}" data-key="t-analytics"> Local Ride - Terms & Condition </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('include_exclude_edit')}}" class="nav-link {{strpos(url()->current(),'common-include-exclude') !== false ? 'active' : ''}}" data-key="t-analytics"> Local Ride - Includes\Excludes </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('description_edit')}}" class="nav-link {{strpos(url()->current(),'common-description') !== false ? 'active' : ''}}" data-key="t-analytics"> Local Ride - Description </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('note_edit')}}" class="nav-link {{strpos(url()->current(),'common-note') !== false ? 'active' : ''}}" data-key="t-analytics"> Local Ride - Note </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('holidaypackage_terms_condition_edit')}}" class="nav-link {{strpos(url()->current(),'common-holiday-package-terms-condition') !== false ? 'active' : ''}}" data-key="t-analytics"> Holiday Package - Terms & Condition </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('holidaypackage_policy_edit')}}" class="nav-link {{strpos(url()->current(),'common-holiday-package-policy') !== false ? 'active' : ''}}" data-key="t-analytics"> Holiday Package - Policy </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('outstation_terms_condition_edit')}}" class="nav-link {{strpos(url()->current(),'common-outstation-terms-condition') !== false ? 'active' : ''}}" data-key="t-analytics"> Outstation - Terms & Condition </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('outstation_include_exclude_edit')}}" class="nav-link {{strpos(url()->current(),'common-outstation-include-exclude') !== false ? 'active' : ''}}" data-key="t-analytics"> Outstation - Includes\Excludes </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('outstation_description_edit')}}" class="nav-link {{strpos(url()->current(),'common-outstation-description') !== false ? 'active' : ''}}" data-key="t-analytics"> Outstation - Description </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('outstation_note_edit')}}" class="nav-link {{strpos(url()->current(),'common-outstation-note') !== false ? 'active' : ''}}" data-key="t-analytics"> Outstation - Note </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('airport_terms_condition_edit')}}" class="nav-link {{strpos(url()->current(),'common-airport-terms-condition') !== false ? 'active' : ''}}" data-key="t-analytics"> Airport - Terms & Condition </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('airport_include_exclude_edit')}}" class="nav-link {{strpos(url()->current(),'common-airport-include-exclude') !== false ? 'active' : ''}}" data-key="t-analytics"> Airport - Includes\Excludes </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('airport_description_edit')}}" class="nav-link {{strpos(url()->current(),'common-airport-description') !== false ? 'active' : ''}}" data-key="t-analytics"> Airport - Description </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('airport_note_edit')}}" class="nav-link {{strpos(url()->current(),'common-airport-note') !== false ? 'active' : ''}}" data-key="t-analytics"> Airport - Note </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li> <!-- end Dashboard Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{strpos(url()->current(),'sub-admin') !== false ? 'active' : ''}}" href="#sidebarDashboards5" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{strpos(url()->current(),'sub-admin') !== false ? 'true' : 'false'}}" aria-controls="sidebarDashboards5">
                                    <i class="ri-admin-fill"></i> <span data-key="t-dashboards">Root Management</span>
                                </a>
                                <div class="collapse menu-dropdown {{strpos(url()->current(),'sub-admin') !== false ? 'show' : ''}}" id="sidebarDashboards5">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('subadmin_view')}}" class="nav-link {{strpos(url()->current(),'sub-admin') !== false ? 'active' : ''}}" data-key="t-analytics"> Sub Admins </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> <!-- end Dashboard Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{strpos(url()->current(),'holiday-package') !== false || strpos(url()->current(),'dynamic-web-pages') !== false || strpos(url()->current(),'faq') !== false || strpos(url()->current(),'seo-meta') !== false || strpos(url()->current(),'list-layout') !== false || strpos(url()->current(),'content-layout') !== false || strpos(url()->current(),'vehicle-type-seo') !== false || strpos(url()->current(),'vehicle-seo') !== false || strpos(url()->current(),'holiday-package-seo') !== false || strpos(url()->current(),'testimonial') !== false ? 'active' : ''}}" href="#sidebarDashboards6" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{strpos(url()->current(),'holiday-package') !== false || strpos(url()->current(),'dynamic-web-pages') !== false || strpos(url()->current(),'faq') !== false || strpos(url()->current(),'seo-meta') !== false || strpos(url()->current(),'list-layout') !== false || strpos(url()->current(),'content-layout') !== false || strpos(url()->current(),'vehicle-type-seo') !== false || strpos(url()->current(),'vehicle-seo') !== false || strpos(url()->current(),'holiday-package-seo') !== false || strpos(url()->current(),'testimonial') !== false ? 'true' : 'false'}}" aria-controls="sidebarDashboards6">
                                    <i class="ri-gallery-fill"></i> <span data-key="t-dashboards">Content Management</span>
                                </a>
                                <div class="collapse menu-dropdown {{strpos(url()->current(),'holiday-package') !== false || strpos(url()->current(),'dynamic-web-pages') !== false || strpos(url()->current(),'faq') !== false || strpos(url()->current(),'seo-meta') !== false || strpos(url()->current(),'list-layout') !== false || strpos(url()->current(),'content-layout') !== false || strpos(url()->current(),'vehicle-type-seo') !== false || strpos(url()->current(),'vehicle-seo') !== false || strpos(url()->current(),'holiday-package-seo') !== false || strpos(url()->current(),'testimonial') !== false ? 'show' : ''}}" id="sidebarDashboards6">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('holidaypackage_view')}}" class="nav-link {{strpos(url()->current(),'holiday-package') !== false ? 'active' : ''}}" data-key="t-analytics"> Holiday Package </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('dynamicwebpage_view')}}" class="nav-link {{strpos(url()->current(),'dynamic-web-pages') !== false ? 'active' : ''}}" data-key="t-analytics"> Dynamic Web Pages </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('faq_view')}}" class="nav-link {{strpos(url()->current(),'faq') !== false ? 'active' : ''}}" data-key="t-analytics"> FAQ </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('testimonial_view')}}" class="nav-link {{strpos(url()->current(),'testimonial') !== false ? 'active' : ''}}" data-key="t-analytics"> Testimonial </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('seometa_view')}}" class="nav-link {{strpos(url()->current(),'seo-meta') !== false ? 'active' : ''}}" data-key="t-analytics"> SEO META </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('list_layout_view')}}" class="nav-link {{strpos(url()->current(),'list-layout') !== false ? 'active' : ''}}" data-key="t-analytics"> List Layout </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('content_layout_view')}}" class="nav-link {{strpos(url()->current(),'content-layout') !== false ? 'active' : ''}}" data-key="t-analytics"> Content Layout </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('vehicletypeseo_view')}}" class="nav-link {{strpos(url()->current(),'vehicle-type-seo') !== false ? 'active' : ''}}" data-key="t-analytics"> VehicleType SEO </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('vehicleseo_view')}}" class="nav-link {{strpos(url()->current(),'vehicle-seo') !== false ? 'active' : ''}}" data-key="t-analytics"> Vehicle SEO </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('holidaypackageseo_view')}}" class="nav-link {{strpos(url()->current(),'holiday-package-seo') !== false ? 'active' : ''}}" data-key="t-analytics"> Holiday Package SEO </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> <!-- end Dashboard Menu -->

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>