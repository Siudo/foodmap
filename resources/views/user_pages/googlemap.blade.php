@extends('welcome')
@section('content')
    <style>
        a.datban {
            color: blue;
            font-size: 16px;

        }

        #floating-panel {
            position: absolute;
            top: 270px;
            left: 2%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: "Roboto", "sans-serif";
            line-height: 30px;
            padding-left: 10px;
            width: 480px;
            border-radius: 20px;
        }

        .btn_pt{
            border: none;
            background: transparent;
            cursor: pointer;
        }

    </style>
    <div class="about-low-area section-padding30">
        <div class="site-section ">
            <div class="container-fluid">
                <div id="floating-panel">
                    <div class="row">
                        <div class="col">
                            <p id="ten_res" style="color: blue; font-size:20px;"></p>
                        </div>
                    </div>
                    <div class="row" id="mode-selector">

                        <div class="col">
                            <button class="btn_pt" id="changemode-walking" style="color: black; font-size:25px;"><i class="fas fa-car-alt"></i></button>

                        </div>
                        <div class="col">
                            <button class="btn_pt" id="changemode-transit" style="color: black; font-size:25px;"><i class="fas fa-bus"></i></button>
                        </div>
                        <div class="col">
                            <button class="btn_pt" id="changemode-driving" style="color: black; font-size:25px;"><i
                                    class="fas fa-walking"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text"  id="org_input" placeholder="Địa chỉ của bạn"
                                class="single-input">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="text" id="des_input" placeholder="Địa chỉ của nơi tới" class="single-input">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2" style="text-align: right;padding-right: 8px;">
                            <i class="far fa-clock" style="color: black;font-size: 25px "></i>
                        </div>
                        <div class="col">
                            <p id="tgian_mocua" style="text-align: start">0:00</p>
                        </div>
                    </div>
                    <div class="mt-10">
                        <input type="hidden" name="lat_res" id="lat_res" class="single-input">
                    </div>
                    <div class=" mt-10">
                        <input type="hidden" name="lng_res" id="lng_res" class="single-input">
                    </div>
                    <div class=" mt-10">
                        <input type="hidden" name="lat_user" id="lat_user" class="single-input">
                    </div>
                    <div class=" mt-10">
                        <input type="hidden" name="lng_user" id="lng_user" class="single-input">
                    </div>
                    <div class=" mt-10">
                        <input type="hidden" id="phuongtien" class="single-input">
                    </div>
                    <div class="row">
                        <div class="col">
                            <a id="btn_datban" class="border-btn header-btn">Đặt bàn</a>
                        </div>
                        <div class="col">
                            <button id="btn_chiduong" class="border-btn header-btn">Chỉ đường</button>
                        </div>
                    </div>


                </div>





                <div id="map" style="width: 100% ; height : 900px"></div>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 10.843371,
                    lng: 106.795153
                },
                zoom: 13,

            });

            var icon_marker = {
                url: "public/frontend/assets/img/marker/icon_marker.png",
                scaledSize: new google.maps.Size(30, 40),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 0),
            };


            //multi marker

            var locations = [
                @foreach ($data_marker as $key => $value)
                    ["{{ $value->tenquan }}",{{ $value->kinhdo }},{{ $value->vido }}, "{{ $value->diachi }}" ,
                    {{ $value->id_quan }} , "{{ $value->hinhdd }}","{{ $value->tgianmocua }}"],
                @endforeach
            ];
            var infowindow = new google.maps.InfoWindow();
            var marker1, i;

            for (i = 0; i < locations.length; i++) {
                marker1 = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: icon_marker,
                });


                var url_datban = '{{ URL::to('/datban/') }}' + '/';
                google.maps.event.addListener(marker1, 'click', (function(marker1, i) {
                    return function() {
                        // infowindow.setContent('<strong><b>' + locations[i][0] + '</b></strong> <br>' +
                        //     '<p>' + locations[i][3] + '</p>' + '<a class="datban" href="' + url_datban +
                        //     locations[i][4] + '">' + "Đặt bàn tại quán" + '</a>');
                        marker1.setAnimation(google.maps.Animation.BOUNCE);
                        document.getElementById('lat_res').value = locations[i][1];
                        document.getElementById('lng_res').value = locations[i][2];
                        document.getElementById('ten_res').innerHTML = locations[i][0];
                        document.getElementById('tgian_mocua').innerHTML = locations[i][6];
                        document.getElementById('btn_datban').href = url_datban + locations[i][4];
                        document.getElementById('des_input').value = locations[i][3];
                        //infowindow.open(map, marker1);
                    }
                })(marker1, i));
            }





            var infoWindow = new google.maps.InfoWindow();
            // current location
            var locate;
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locate);
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            // lat: position.coords.latitude,
                            // lng: position.coords.longitude,
                             lat: 10.8452971,
                            lng: 106.7950824,
                        };
                        infoWindow.setPosition(pos);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: pos,
                        });
                        marker.addListener('click', function() {
                            infoWindow.setContent("lat and lng : " + pos.lat + "------" + pos.lng);
                            infoWindow.open(map, marker);
                        });
                        document.getElementById('lat_user').value = pos.lat;
                        document.getElementById('lng_user').value = pos.lng;
                        map.setCenter(pos);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                handleLocationError(false, infoWindow, map.getCenter());
            }

           
           // new AutocompleteDirectionsHandler(map);


            
           // Direction
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer({
                suppressMarkers: true
            });
            directionsRenderer.setMap(map);
            document.getElementById("btn_chiduong").addEventListener("click", () => {
                calculateAndDisplayRoute(directionsService, directionsRenderer);

            });


        }



        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
            directionsService.route({
                    // origin: location_user,
                    // destination: location_res,
                    origin: {
                        lat: parseFloat(document.getElementById('lat_user').value),
                        lng: parseFloat(document.getElementById('lng_user').value),
                    },
                    destination: {
                        lat: parseFloat(document.getElementById('lat_res').value),
                        lng: parseFloat(document.getElementById('lng_res').value),
                    },
                    travelMode: google.maps.TravelMode.WALKING,
                },
                (response, status) => {
                    if (status == "OK") {
                        directionsRenderer.setDirections(response);
                        var leg = response.routes[0].legs[0];
                        var marker = new google.maps.Marker({
                            position: leg.start_location,
                        });
                        var marker1 = new google.maps.Marker({
                            position: leg.end_location,
                        });
                    } else {
                        window.alert("Directions request failed due to " + status);
                    }
                }
            );
        }


        ///////////////    AUTO COMPLETE & DIRECTIONS  ////////////////////////////////////
        // class AutocompleteDirectionsHandler {
        //     constructor(map) {
        //         this.map = map;
        //         this.originPlaceId = "";
        //         this.destinationPlaceId = "";
        //         this.travelMode = google.maps.TravelMode.WALKING;
        //         this.directionsService = new google.maps.DirectionsService();
        //         this.directionsRenderer = new google.maps.DirectionsRenderer();
        //         this.directionsRenderer.setMap(map);
        //         const originInput = document.getElementById("org_input");
        //         const destinationInput = document.getElementById("des_input");
        //         const modeSelector = document.getElementById("mode-selector");
        //         const originAutocomplete = new google.maps.places.Autocomplete(originInput);
        //         // Specify just the place data fields that you need.
        //         originAutocomplete.setFields(["place_id"]);
        //         const destinationAutocomplete = new google.maps.places.Autocomplete(
        //             destinationInput
        //         );
        //         // Specify just the place data fields that you need.
        //         destinationAutocomplete.setFields(["place_id"]);
        //         this.setupClickListener(
        //             "changemode-walking",
        //             google.maps.TravelMode.WALKING
        //         );
        //         this.setupClickListener(
        //             "changemode-transit",
        //             google.maps.TravelMode.TRANSIT
        //         );
        //         this.setupClickListener(
        //             "changemode-driving",
        //             google.maps.TravelMode.DRIVING
        //         );
        //         this.setupPlaceChangedListener(originAutocomplete, "ORIG");
        //         this.setupPlaceChangedListener(destinationAutocomplete, "DEST");
        //         this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        //         this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        //         this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
        //     }
        //     // Sets a listener on a radio button to change the filter type on Places
        //     // Autocomplete.
        //     setupClickListener(id, mode) {
        //         const radioButton = document.getElementById(id);
        //         radioButton.addEventListener("click", () => {
        //             this.travelMode = mode;
        //             this.route();
        //         });
        //     }
        //     setupPlaceChangedListener(autocomplete, mode) {
        //         autocomplete.bindTo("bounds", this.map);
        //         autocomplete.addListener("place_changed", () => {
        //             const place = autocomplete.getPlace();

        //             if (!place.place_id) {
        //                 window.alert("Please select an option from the dropdown list.");
        //                 return;
        //             }   

        //             if (mode === "ORIG") {
        //                 this.originPlaceId = place.place_id;
        //             } else {
        //                 this.destinationPlaceId = place.place_id;
        //             }
        //             this.route();
        //         });
        //     }
        //     route() {
        //         if (!this.originPlaceId || !this.destinationPlaceId) {
        //             return;
        //         }
        //         const me = this;
        //         this.directionsService.route({
        //                 origin: {
        //                     placeId: this.originPlaceId
        //                 },
        //                 destination: {
        //                     placeId: this.destinationPlaceId
        //                 },
        //                 travelMode: this.travelMode,
        //             },
        //             (response, status) => {
        //                 if (status === "OK") {
        //                     me.directionsRenderer.setDirections(response);
        //                 } else {
        //                     window.alert("Directions request failed due to " + status);
        //                 }
        //             }
        //         );
        //     }
        // }








        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ? "Lỗi : Lỗi Geolocation" :
                "Lỗi : Trình duyệt không hỗ trợ Geolocation.");
            infoWindow.open(map);
        }

    </script>

@endsection
