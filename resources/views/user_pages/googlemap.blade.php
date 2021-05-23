@extends('welcome')
@section('content')
    <style>
        a.datban {
            color: blue;
            font-size: 16px;

        }

        #floating-panel {
            position: absolute;
            top: 200px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: "Roboto", "sans-serif";
            line-height: 30px;
            padding-left: 10px;
            width: 600px
        }

    </style>
    <div class="about-low-area section-padding30">
        <div class="site-section ">
            <div class="container-fluid">
                {{-- <div id="floating-panel" class="row">
                    <div class="mt-10">
                        <input type="text" name="lat_res" id="lat_res" class="single-input">
                    </div>
                    <div class=" mt-10">
                        <input type="text" name="lng_res" id="lng_res" class="single-input">
                    </div>
                    <div class=" mt-10">
                        <input type="text" name="lat_user" id="lat_user" class="single-input">
                    </div>
                    <div class=" mt-10">
                        <input type="text" name="lng_user" id="lng_user" class="single-input">
                    </div>
                    <button id="chiduong" class="border-btn header-btn">Chỉ đường</button>
                </div> --}}

                <div id="floating-panel">
                    <b>Start: </b>
                    <select id="start">
                        <option value="chicago, il">Chicago</option>
                        <option value="st louis, mo">St Louis</option>
                        <option value="joplin, mo">Joplin, MO</option>
                        <option value="oklahoma city, ok">Oklahoma City</option>
                        <option value="amarillo, tx">Amarillo</option>
                        <option value="gallup, nm">Gallup, NM</option>
                        <option value="flagstaff, az">Flagstaff, AZ</option>
                        <option value="winona, az">Winona</option>
                        <option value="kingman, az">Kingman</option>
                        <option value="barstow, ca">Barstow</option>
                        <option value="san bernardino, ca">San Bernardino</option>
                        <option value="los angeles, ca">Los Angeles</option>
                    </select>
                    <b>End: </b>
                    <select id="end">
                        <option value="chicago, il">Chicago</option>
                        <option value="st louis, mo">St Louis</option>
                        <option value="joplin, mo">Joplin, MO</option>
                        <option value="oklahoma city, ok">Oklahoma City</option>
                        <option value="amarillo, tx">Amarillo</option>
                        <option value="gallup, nm">Gallup, NM</option>
                        <option value="flagstaff, az">Flagstaff, AZ</option>
                        <option value="winona, az">Winona</option>
                        <option value="kingman, az">Kingman</option>
                        <option value="barstow, ca">Barstow</option>
                        <option value="san bernardino, ca">San Bernardino</option>
                        <option value="los angeles, ca">Los Angeles</option>
                    </select>
                </div>



                <div id="map" style="width: 100% ; height : 850px"></div>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById("map"), {
                // center: {
                //     lat: 10.843371,
                //     lng: 106.795153
                // },
                // zoom: 13,
                zoom: 14,
                center: {
                    lat: 37.77,
                    lng: -122.447
                },
            });

            var icon_marker = {
                url: "public/frontend/assets/img/marker/icon_marker.png",
                scaledSize: new google.maps.Size(30, 40),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 0)
            };


            //multi marker

            var locations = [
                @foreach ($data_marker as $key => $value)
                    ["{{ $value->tenquan }}",{{ $value->kinhdo }},{{ $value->vido }}, "{{ $value->diachi }}" ,
                    {{ $value->id_quan }}],
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
                        infowindow.setContent('<strong><b>' + locations[i][0] + '</b></strong> <br>' +
                            '<p>' + locations[i][3] + '</p>' + '<a class="datban" href="' + url_datban +
                            locations[i][4] + '">' + "Đặt bàn tại quán" + '</a>');
                        marker1.setAnimation(google.maps.Animation.BOUNCE);
                        document.getElementById('lat_res').value = locations[i][1];
                        document.getElementById('lng_res').value = locations[i][2];

                        infowindow.open(map, marker1);
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
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
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


            // Direction
            // const directionsService = new google.maps.DirectionsService();
            // const directionsRenderer = new google.maps.DirectionsRenderer();
            // directionsRenderer.setMap(map);

            // const onChangeHandler = function() {
            //    DisplayRoute(directionsService, directionsRenderer);
            // };
            // var btn_chiduong = document.getElementById('chiduong');
            // document.getElementById('chiduong').addEventListener("click", onChangeHandler);


            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

            const onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsRenderer);
            };
            document.getElementById("start").addEventListener("change", onChangeHandler);
            document.getElementById("end").addEventListener("change", onChangeHandler);
        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
            directionsService.route({
                    origin: {
                        query: document.getElementById("start").value,
                    },
                    destination: {
                        query: document.getElementById("end").value,
                    },
                    travelMode: google.maps.TravelMode.DRIVING,
                },
                (response, status) => {
                    if (status === "OK") {
                        directionsRenderer.setDirections(response);
                    } else {
                        window.alert("Directions request failed due to " + status);
                    }
                }
            );
        }

        // function DisplayRoute(directionsService, directionsRenderer) {
        //     // var location_user = new google.maps.myLatLng(document.getElementById('lat_user').value, document.getElementById(
        //     //     'lng_user').value);
        //     // var location_res = new google.maps.myLatLng(document.getElementById('lat_res').value, document.getElementById(
        //     //     'lng_res').value)
        //     directionsService.route({
        //             origin: {
        //                 lat:document.getElementById('lat_user').value,
        //                 lng:document.getElementById('lng_user').value,
        //             },
        //             destination: {
        //                 lat:document.getElementById('lat_res').value,
        //                 lng:document.getElementById('lng_res').value,
        //             },
        //             travelMode: google.maps.TravelMode.WALKING,
        //         },
        //         (response, status) => {
        //             if (status === "OK") {
        //                 directionsRenderer.setDirections(response);
        //             } else {
        //                 window.alert("Directions request failed due to " + status);
        //             }
        //         }
        //     );
        // }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ? "Lỗi : Lỗi Geolocation" :
                "Lỗi : Trình duyệt không hỗ trợ Geolocation.");
            infoWindow.open(map);
        }

    </script>

@endsection
