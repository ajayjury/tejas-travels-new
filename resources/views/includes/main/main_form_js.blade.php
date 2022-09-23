<script src="{{ asset('assets/js/clocklet.min.js') }}"></script>
    <script src="{{ asset('assets/js/mc-calendar.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
    <script>
        const datePicker = MCDatepicker.create({
            el: '#outstation_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });

        let datePicker4 = MCDatepicker.create({
            el: '#outstation_return_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });

        datePicker.onSelect((date, formatedDate) => {
            datePicker4.destroy();
            datePicker4 = MCDatepicker.create({
                el: '#outstation_return_date',
                bodyType: 'inline',
                closeOnBlur: true,
                minDate: new Date(date),
                theme: {
                    theme_color: '#3097fe'
                }
            });
        });

        const datePicker1 = MCDatepicker.create({
            el: '#local_ride_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });
        const datePicker2 = MCDatepicker.create({
            el: '#airport_date',
            bodyType: 'inline',
            minDate: new Date(),
            closeOnBlur: true,
            theme: {
                theme_color: '#3097fe'
            }
        });
        const datePicker3 = MCDatepicker.create({
            el: '#multilocation_date',
            bodyType: 'inline',
            minDate: new Date(),
            closeOnBlur: true,
            theme: {
                theme_color: '#3097fe'
            }
        });
    </script>

    <script type="text/javascript">
        mdtimepicker(document.querySelectorAll('.timepicker'));
    </script>

    <script type="text/javascript">
        
        async function sendOtpToNewNumber() {
            const number = document.getElementById('phonenumber-resend-otp').getElementsByTagName("input")[0].value

            console.log(number)



            if (/^[0-9]+$/.test(number) && number.length === 10) {

                try {
                    const response = await axios.post('{{ route('quotation_generate_quotation_otp') }}', {
                        phone: number
                    })
                } catch (err) {
                    errorToast("internal server error")
                    return
                }

                document.getElementById('showNumber').innerHTML = number;
                document.getElementById('phone-number-show-number').style.display = "block";
                document.getElementById('rider_phone').value = number;

                document.getElementById('enter-otp').style.display = "block"
                document.getElementById('submit-otp').style.display = "block"
                document.getElementById('phonenumber-resend-otp').style.display = "none"
                document.getElementById('phonenumber-resend-otp-button').style.display = "none"

            } else {
                errorToast("Please enter correct Phone number")
                return
            }
        }
    </script>

    <script type="text/javascript">
        function editPhone() {
            document.getElementById('phone-number-show-number').style.display = "none"
            document.getElementById('enter-otp').style.display = "none"
            document.getElementById('submit-otp').style.display = "none"
            document.getElementById('phonenumber-resend-otp').style.display = "block"
            document.getElementById('phonenumber-resend-otp-button').style.display = "block"


        }
    </script>

    <script type="text/javascript">
        function initialize() {

            document.getElementById('airport_pickup').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('airport_pickup').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            document.getElementById('airport_drop').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('airport_drop').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            document.getElementById('outstation_pickup').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('outstation_pickup').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            document.getElementById('outstation_drop').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('outstation_drop').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            document.getElementById('local_ride_pickup').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('local_ride_pickup').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            const locationInputs = document.getElementsByClassName("map-input");

            console.log(locationInputs)


            const autocompletes = [];
            const geocoder = new google.maps.Geocoder;
            for (let i = 0; i < locationInputs.length; i++) {

                const input = locationInputs[i];
                const fieldKey = input.id.replace("-input", "");

                const autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.key = fieldKey;
                autocompletes.push({
                    input: input,
                    autocomplete: autocomplete
                });
            }

            for (let i = 0; i < autocompletes.length; i++) {
                const input = autocompletes[i].input;
                const autocomplete = autocompletes[i].autocomplete;
                const map = autocompletes[i].map;
                const marker = autocompletes[i].marker;

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    marker.setVisible(false);
                    const place = autocomplete.getPlace();

                    geocoder.geocode({
                        'placeId': place.place_id
                    }, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            const lat = results[0].geometry.location.lat();
                            const lng = results[0].geometry.location.lng();
                            setLocationCoordinates(autocomplete.key, lat, lng);
                        }
                    });

                    if (!place.geometry) {
                        window.alert("No details available for input: '" + place.name + "'");
                        input.value = "";
                        return;
                    }

                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

                });
            }
        }

        function setLocationCoordinates(key, lat, lng) {
            const latitudeField = document.getElementById(key + "-" + "latitude");
            const longitudeField = document.getElementById(key + "-" + "longitude");
            latitudeField.value = lat;
            longitudeField.value = lng;
        }
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
        async defer></script>

    <script>
        function FormSubmit() {
            console.log('submit')
            if (document.getElementById('rider_name').value == "") {
                errorToast("Please enter your name")
                return false;
            }
            if (document.getElementById('rider_email').value == "") {
                errorToast("Please enter your email")
                return false;
            }
            if (document.getElementById('rider_phone').value == "") {
                errorToast("Please enter your phone")
                return false;
            }
            if (document.getElementById('rider_phone').value == "") {
                errorToast("Please enter your phone")
                return false;
            }
            if (document.getElementById('rider_otp').value == "") {
                errorToast("Please enter your otp")
                return false;
            }
            if (document.getElementById('rider_pickup_location').value == "") {
                errorToast("Please enter your pickup location")
                return false;
            }
            // console.log(document.getElementById('vehicleSelected'))
            if (document.getElementById('vehicleSelected').value == "") {
                errorToast("Please select a vehicle")
                return false;
            }

            axios.post('{{ route('quotation_verify_quotation_otp') }}', {
                phone: document.getElementById('rider_phone').value,
                otp: document.getElementById('rider_otp').value
            }).then((res) => {
                var submitBtn = document.getElementById('submitBtn')
                submitBtn.innerHTML = `
            <span class="d-flex align-items-center">
                <span class="spinner-border flex-shrink-0" role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
                <span class="flex-grow-1 ms-2">
                    Loading...
                </span>
            </span>
            `
                submitBtn.disabled = true;
                var formData = new FormData();
                formData.append('name', document.getElementById('rider_name').value)
                formData.append('email', document.getElementById('rider_email').value)
                formData.append('phone', document.getElementById('rider_phone').value)
                formData.append('pickup_address', document.getElementById('rider_pickup_location').value)
                formData.append('vehicletype', mainNameVehicleType)
                formData.append('vehicletype_id', mainIdVehicleType)
                formData.append('vehicle_id', document.getElementById('vehicleSelected').value)

                if (selectedTripType == 'LOCAL RIDE') {
                    formData.append('triptype', 'Local Ride')
                    formData.append('triptype_id', 2)
                    formData.append('from_date', document.getElementById('local_ride_date').value)
                    formData.append('from_time', document.getElementById('local_ride_time').value)
                    formData.append('from_city', document.getElementById('local_ride_pickup').value)

                } else if (selectedTripType == 'OUTSTATION') {
                    formData.append('triptype', 'OutStation')
                    formData.append('triptype_id', 3)
                    formData.append('from_date', document.getElementById('outstation_date').value)
                    formData.append('from_time', document.getElementById('outstation_time').value)
                    formData.append('from_city', document.getElementById('outstation_pickup').value)
                    formData.append('to_city', document.getElementById('outstation_drop').value)
                } else if (selectedTripType == 'AIRPORT') {
                    formData.append('triptype', 'Airport')
                    formData.append('triptype_id', 4)
                    formData.append('from_date', document.getElementById('airport_date').value)
                    formData.append('from_time', document.getElementById('airport_time').value)
                    formData.append('from_city', document.getElementById('airport_pickup').value)
                } else if (selectedTripType == 'MULTI-LOCATION') {
                    formData.append('triptype', 'Multiple Location')
                    formData.append('triptype_id', 1)
                    formData.append('from_date', document.getElementById('multilocation_date').value)
                    formData.append('from_time', document.getElementById('multilocation_time').value)
                    formData.append('from_city', document.getElementById('multilocation_pickup').value)
                    var toCityText = ""
                    for (let index3 = 0; index3 < document.getElementsByName('multilocation_drop[]')
                        .length; index3++) {
                        if (index3 == 1) {
                            continue;
                        } else if (index3 == document.getElementsByName('multilocation_drop[]').length - 1) {
                            toCityText += document.getElementsByName('multilocation_drop[]')[index3].value;
                        } else {
                            toCityText = toCityText + document.getElementsByName('multilocation_drop[]')[index3]
                                .value + ',';
                        }

                    }
                    formData.append('to_city', toCityText)
                }

                if (selectedTripType == 'OUTSTATION') {
                    if (selectedSubTripType == 'onewaytrip') {
                        formData.append('subtriptype', 'onewaytrip')
                        formData.append('subtriptype_id', 1)
                    } else {
                        formData.append('subtriptype', 'roundtrip')
                        formData.append('subtriptype_id', 2)
                        formData.append('to_date', document.getElementById('outstation_return_date').value)
                        formData.append('to_time', document.getElementById('outstation_return_time').value)
                    }
                } else if (selectedTripType == 'AIRPORT') {
                    if (selectedAirportSubTripType == 'pickup') {
                        formData.append('subtriptype', 'pickup')
                        formData.append('subtriptype_id', 1)
                    } else {
                        formData.append('subtriptype', 'drop')
                        formData.append('subtriptype_id', 2)
                    }
                } 
                // else if (selectedTripType == 'LOCAL RIDE') {
                //     formData.append('packagetype', selectedPackageType)
                //     formData.append('packagetype_id', selectedPackageTypeId)
                // }

                axios.post('{{ route('quotation_store') }}', formData).then((res) => {

                    setTimeout(function() {
                        window.location.replace(res.data.url);
                    }, 1000);
                }).catch((error) => {
                    submitBtn.innerHTML = `
                Search
                `
                    submitBtn.disabled = false;
                    if (error?.response?.data?.form_error?.vehicletype_id) {
                        errorToast(error?.response?.data?.form_error?.vehicletype_id[0])
                    }
                    if (error?.response?.data?.form_error?.packagetype_id) {
                        errorToast(error?.response?.data?.form_error?.packagetype_id[0])
                    }
                    if (error?.response?.data?.form_error?.state_id) {
                        errorToast(error?.response?.data?.form_error?.state_id[0])
                    }
                    if (error?.response?.data?.form_error?.city_id) {
                        errorToast(error?.response?.data?.form_error?.city_id[0])
                    }
                    if (error?.response?.data?.form_error?.url) {
                        errorToast(error?.response?.data?.form_error?.url[0])
                    }
                    if (error?.response?.data?.form_error?.vehicle) {
                        errorToast(error?.response?.data?.form_error?.vehicle[0])
                    }
                    if (error?.response?.data?.form_error?.list) {
                        errorToast(error?.response?.data?.form_error?.list[0])
                    }
                    if (error?.response?.data?.form_error?.content) {
                        errorToast(error?.response?.data?.form_error?.content[0])
                    }
                    if (error?.response?.data?.form_error?.subcity) {
                        errorToast(error?.response?.data?.form_error?.subcity[0])
                    }
                })

            }).catch((err) => {
                console.log(err)
                errorToast("Error validating otp")
            })
        }




        async function changeJourneyTypeSelectCarDiv() {
            const radio1 = document.getElementById('radio1')
            const radio2 = document.getElementById('radio2')
            const radio3 = document.getElementById('radio3')
            const radio4 = document.getElementById('radio4')

            console.log(radio1.checked)
            console.log(radio2.checked)
            console.log(radio3.checked)
            console.log(radio4.checked)

            if (radio1.checked) {

            }

        }
    </script>

    <script>
        var span = document.getElementsByClassName("close-modal")[0];
        var modal = document.getElementById("myModal");

        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>

    <script>
        const errorToast = (message) => {
            iziToast.error({
                title: 'Error',
                message: message,
                position: 'bottomCenter',
                timeout: 7000
            });
        }
        const successToast = (message) => {
            iziToast.success({
                title: 'Success',
                message: message,
                position: 'bottomCenter',
                timeout: 6000
            });
        }

        var nextScreen = 1;
        var selectedVehicleType = ""
        var selectedVehicleTypeId = ""
        var selectedTripType = ""
        var selectedTripTypeId = ""
        var selectedSubTripType = "roundtrip"
        var selectedSubTripTypeId = "roundtrip"
        var selectedAirportSubTripType = "pickup"
        var selectedAirportSubTripTypeId = "pickup"
        var selectedPickUpAddress = ""
        var selectedPickUpAddressId = ""
        var selectedDestinationAddress = ""
        var selectedDestinationAddressId = ""
        var selectedDateTime = ""
        var selectedPackageType = ""
        var selectedPackageTypeId = ""
        var mainIdVehicleType = ""
        var mainNameVehicleType = ""
        var mainDescVehicleType = ""
        var mainImageVehicleType = ""

        function changeToVehicleTypeScreen(to) {
            nextScreen = to;
            var myEle = document.getElementById("home-book");
            if(myEle){
            document.getElementById('home-book').classList.add('w-72');
            }
           
            console.log(document.getElementById('vehicleTypeScreen'))
            document.getElementById('screenTitle').innerText = 'SELECT YOUR VEHICLE TYPE'
            document.getElementById('journeyType').style.display = 'none'
            console.log(document.getElementById('journeyType'))
            document.getElementById('vehicleTypeScreen').style.display = 'block'
        }

        function changeToDetailEntryScreen() {
            if (selectedVehicleTypeId == "" || selectedVehicleType == "") {
                errorToast("Please select a vehicle type")
                return false;
            }
            var myEle = document.getElementById("home-book");
            if(myEle){
                document.getElementById('home-book').classList.add('w-65');
            document.getElementById('home-book').classList.add('mt42');

            }
           
            document.getElementById('vehicleTypeScreen').style.display = 'none'
            switch (nextScreen) {
                case 1:
                    document.getElementById('outstation').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'OUTSTATION'
                    selectedTripType = 'OUTSTATION'
                    selectedTripTypeId = 'OUTSTATION'
                    document.getElementById('outstation_name').innerText = mainNameVehicleType
                    document.getElementById('outstation_desc').innerText = mainDescVehicleType
                    document.getElementById('outstation_image').src = mainImageVehicleType
                    break;
                case 2:
                    document.getElementById('local_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'LOCAL RIDE'
                    selectedTripType = 'LOCAL RIDE'
                    selectedTripTypeId = 'LOCAL RIDE'
                    document.getElementById('local_ride_name').innerText = mainNameVehicleType
                    document.getElementById('local_ride_desc').innerText = mainDescVehicleType
                    document.getElementById('local_ride_image').src = mainImageVehicleType
                    break;
                case 3:
                    document.getElementById('multiple_location').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'MULTI-LOCATION'
                    selectedTripType = 'MULTI-LOCATION'
                    selectedTripTypeId = 'MULTI-LOCATION'
                    document.getElementById('multiple_location_name').innerText = mainNameVehicleType
                    document.getElementById('multiple_location_desc').innerText = mainDescVehicleType
                    document.getElementById('multiple_location_image').src = mainImageVehicleType
                    break;
                case 4:
                    document.getElementById('airport_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'AIRPORT'
                    selectedTripType = 'AIRPORT'
                    selectedTripTypeId = 'AIRPORT'
                    document.getElementById('airport_name').innerText = mainNameVehicleType
                    document.getElementById('airport_desc').innerText = mainDescVehicleType
                    document.getElementById('airport_image').src = mainImageVehicleType
                    break;

            }
        }

        function goBackScreen(from) {
            
            document.getElementById('vehicleTypeScreen').style.display = 'block'
            document.getElementById('screenTitle').innerText = 'SELECT YOUR VEHICLE TYPE'
            nextScreen = from;
            var myEle = document.getElementById("home-book");
            if(myEle){
            document.getElementById('home-book').classList.remove('w-65');
            }
            switch (nextScreen) {
                case 1:
                    document.getElementById('outstation').style.display = 'none'
                    break;
                case 2:
                    document.getElementById('local_ride').style.display = 'none'
                    break;
                case 3:
                    document.getElementById('multiple_location').style.display = 'none'
                    break;
                case 4:
                    document.getElementById('airport_ride').style.display = 'none'
                    break;

            }
        }

        function goToFirstScreen() {
            document.getElementById('screenTitle').innerText = 'SELECT YOUR JOURNEY TYPE'
            document.getElementById('journeyType').style.display = 'block'
            document.getElementById('vehicleTypeScreen').style.display = 'none'
        }

        function goBackFromUserScreen() {
            document.getElementById('userScreen').style.display = 'none'
            switch (nextScreen) {
                case 1:
                    document.getElementById('outstation').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'OUTSTATION'
                    break;
                case 2:
                    document.getElementById('local_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'LOCAL RIDE'
                    break;
                case 3:
                    document.getElementById('multiple_location').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'MULTI-LOCATION'
                    break;
                case 4:
                    document.getElementById('airport_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'AIRPORT'
                    break;

            }
        }

        function sendOtp() {
            // console.log('sending otp')
            if (document.getElementById('rider_name').value == "") {
                errorToast("Please enter your name")
                return false;
            }
            if (document.getElementById('rider_email').value == "") {
                errorToast("Please enter your email")
                return false;
            }
            if (document.getElementById('rider_phone').value == "") {
                errorToast("Please enter your phone")
                return false;
            }
            if (document.getElementById('rider_phone').value == "") {
                errorToast("Please enter your phone")
                return false;
            }
            if (document.getElementById('rider_pickup_location').value == "") {
                errorToast("Please enter your pickup location")
                return false;
            }
            if (document.getElementById('vehicleSelected').value == "") {
                errorToast("Please select a vehicle")
                return false;
            }
            const phoneNumber = document.getElementById('rider_phone').value
            console.log(document.getElementById('rider_phone').value)
            if (document.getElementById('rider_phone').value == "" || document.getElementById('rider_phone').value
                .length !== 10) {
                errorToast("Please enter your phone")
                return false;
            }

            axios.post('{{ route('quotation_generate_quotation_otp') }}', {
                phone: document.getElementById('rider_phone').value
            }).then((res) => {
                console.log(res)
                successToast('otp send successfully')
                var modal = document.getElementById("myModal");
                const number = document.getElementById('showNumber')
                number.innerHTML = phoneNumber
                console.log(number)
                modal.style.display = 'block'
                document.getElementById('sendOtpButton').innerHtml = 'Resend Otp'

            }).catch((err) => {
                console.log(err)
            })




        }

        function goToUserScreen() {

            switch (nextScreen) {
                case 1:
                    if (document.getElementById('outstation_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    if (document.getElementById('outstation_drop').value == "") {
                        errorToast("Please enter destination address")
                        break;
                        return false;
                    }
                    if (document.getElementById('outstation_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('outstation_time').value == "") {
                        console.log(document.getElementById('outstation_time').value);
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    if (selectedSubTripType == 'roundtrip') {
                        if (document.getElementById('outstation_return_date').value == "") {
                            errorToast("Please enter return date")
                            break;
                            return false;
                        }
                        if (document.getElementById('outstation_return_time').value == "") {
                            errorToast("Please enter return time")
                            break;
                            return false;
                        }
                    }
                    document.getElementById('outstation').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;
                case 2:
                    if (document.getElementById('local_ride_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    if (document.getElementById('local_ride_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('local_ride_time').value == "") {
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    // var checkCounter = 0;
                    // for (let indexPackageType2 = 0; indexPackageType2 < document.getElementsByName('local_ride_packagetype')
                    //     .length; indexPackageType2++) {
                    //     if (document.getElementsByName('local_ride_packagetype')[indexPackageType2].type === 'radio' &&
                    //         document.getElementsByName('local_ride_packagetype')[indexPackageType2].checked) {
                    //         checkCounter++;
                    //     } else {
                    //         continue;
                    //     }
                    // }
                    // if (checkCounter == 0) {
                    //     errorToast("Please select a package type")
                    //     break;
                    //     return false;
                    // }
                    document.getElementById('local_ride').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;
                case 3:
                    if (document.getElementById('multilocation_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    for (let index3 = 0; index3 < document.getElementsByName('multilocation_drop[]').length; index3++) {
                        if (index3 == 1) {
                            continue;
                        }
                        if (document.getElementsByName('multilocation_drop[]')[index3].value == "") {
                            errorToast("Please enter destination address")
                            break;
                            return false;
                        }

                    }
                    if (document.getElementById('multilocation_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('multilocation_time').value == "") {
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    document.getElementById('multiple_location').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;
                case 4:
                    if (document.getElementById('airport_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    if (document.getElementById('airport_drop').value == "") {
                        errorToast("Please enter destination address")
                        break;
                        return false;
                    }
                    if (document.getElementById('airport_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('airport_time').value == "") {
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    document.getElementById('airport_ride').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;

            }

        }

        function selectVehicleType(id, main_id, main_name, main_description, main_image) {
            // console.log(id)
            if (selectedVehicleTypeId == "") {
                var element = document.getElementById(id)
                element.classList.add("car-selected-box");
                selectedVehicleTypeId = id;
                selectedVehicleType = id;
            } else {
                var element2 = document.getElementById(selectedVehicleTypeId)
                element2.classList.remove("car-selected-box");
                var element = document.getElementById(id)
                element.classList.add("car-selected-box");
                selectedVehicleTypeId = id;
                selectedVehicleType = id;
            }
            mainIdVehicleType = main_id
            mainNameVehicleType = main_name
            mainDescVehicleType = main_description
            mainImageVehicleType = main_image
            setVehicleRequest(main_id)
            changeToDetailEntryScreen()
            console.log('1',selectedTripTypeId);

        }

        function selectTripType(id) {
            if (selectedSubTripTypeId == "") {
                document.getElementById('onewaytrip').parentNode.classList.remove('selected-radio-box')
                document.getElementById('roundtrip').parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedSubTripTypeId = id;
                selectedSubTripType = id;
                if (id == 'roundtrip') {
                    document.getElementById('outstation_roundtrip_date').style.display = 'block'
                    document.getElementById('outstation_roundtrip_time').style.display = 'block'
                } else {
                    document.getElementById('outstation_roundtrip_date').style.display = 'none'
                    document.getElementById('outstation_roundtrip_time').style.display = 'none'
                }
            } else {
                document.getElementById(selectedSubTripTypeId).parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedSubTripTypeId = id;
                selectedSubTripType = id;
                if (id == 'roundtrip') {
                    document.getElementById('outstation_roundtrip_date').style.display = 'block'
                    document.getElementById('outstation_roundtrip_time').style.display = 'block'
                } else {
                    document.getElementById('outstation_roundtrip_date').style.display = 'none'
                    document.getElementById('outstation_roundtrip_time').style.display = 'none'
                }
            }

        }

        // function selectPackageType(id, name) {
        //     if (selectedPackageTypeId == "") {
        //         for (let indexPackageType = 0; indexPackageType < document.getElementsByName('local_ride_packagetype')
        //             .length; indexPackageType++) {
        //             document.getElementsByName('local_ride_packagetype')[indexPackageType].parentNode.classList.remove(
        //                 'selected-radio-box')
        //         }
        //         document.getElementById(id).checked = true;
        //         document.getElementById(id).parentNode.classList.add('selected-radio-box')
        //         selectedPackageTypeId = id;
        //         selectedPackageType = name;
        //     } else {
        //         document.getElementById(selectedPackageTypeId).parentNode.classList.remove('selected-radio-box')
        //         document.getElementById(id).checked = true;
        //         document.getElementById(id).parentNode.classList.add('selected-radio-box')
        //         selectedPackageTypeId = id;
        //         selectedPackageType = name;
        //     }

        // }

        function selectAirportTripType(id) {
            if (selectedAirportSubTripTypeId == "") {
                document.getElementById('pickup').parentNode.classList.remove('selected-radio-box')
                document.getElementById('drop').parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedAirportSubTripTypeId = id;
                selectedAirportSubTripType = id;
            } else {
                document.getElementById(selectedAirportSubTripTypeId).parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedAirportSubTripTypeId = id;
                selectedAirportSubTripType = id;
            }
        }
        selectAirportTripType('pickup')
    </script>

    <script>
        async function setVehicleRequest(id) {
            if (nextScreen == 1) {
                var vtype = 3;
            } else if (nextScreen == 2) {
                var vtype = 2;
            } else if (nextScreen == 4) {
                var vtype = 4;
            } else if (nextScreen == 3) {
                var vtype = 1;
            }
            const response = await axios.get('{{ URL::to('/') }}/user/vehicle-all-ajax-frontend-main/' + id + '/' + vtype)
            if (response.data.vehicles.length > 0) {

                var opt =
                    "<option class='font-weight-bold' value='' disabled selected>Select your Vehicle Type</option>";
                response.data.vehicles.forEach((item) => {
                    opt += `<option value='${item.id}'>${item.name}</option>`
                })
                document.getElementById('vehicleSelected').innerHTML = opt;
                document.getElementById('vehicleSelected').style.display = 'none';
                document.getElementById('vehicleSelected').style.display = 'block';
                console.log(document.getElementById('vehicleSelected').innerHTML)
            }else{
                var opt =
                    "<option class='font-weight-bold' value='' disabled selected>Select your Vehicle Type</option>";
                document.getElementById('vehicleSelected').innerHTML = opt;
                document.getElementById('vehicleSelected').style.display = 'none';
                document.getElementById('vehicleSelected').style.display = 'block';
            }
        }
    </script>

<script type="text/javascript">
    var i = 1;
    var count = 1;

    function duplicate() {
        if (count != 6) {
            var div = document.getElementById('duplicate_destination_0'),
                clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
            clone.id = "duplicate_destination_" + (++i);
            clone.style = "display:block;";
            ++count;
            document.getElementById('duplicateDestinationContainer').appendChild(clone);
            document.getElementsByName('multilocation_drop[]')[count - 1].value = "";
            toggleAddDestinationButton()
            initialize()
        }


    }

    function remove() {
        // console.log(this.event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
        if (count != 0) {
            this.event.target.parentNode.parentNode.parentNode.parentNode.remove();
            --count;
        }
        toggleAddDestinationButton()
    }

    function toggleAddDestinationButton() {
        if (count == 5) {
            document.getElementById('addDestinationBtn').style.display = 'none'
        } else {
            document.getElementById('addDestinationBtn').style.display = 'block'
        }
    }
</script>
