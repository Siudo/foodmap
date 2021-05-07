@extends('welcome')
@section('content')
    <div class="about-low-area section-padding30">
        <div class="site-section ">
            <div class="container-fluid">
                <div id="floating-panel" class="row">
                    <div class="mt-10">                     
                        <input type="text" name="first_name" placeholder="Vị trí của bạn" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'First Name'" required class="single-input">
                    </div>
                    <div class=" mt-10"> </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fas fa-map-marker"></i></div>
                        <div class="form-select" id="default-select"">
                            <select>
                                <option value=" 1">City</option>
                                <option value="1">Dhaka</option>
                                <option value="1">Dilli</option>
                                <option value="1">Newyork</option>
                                <option value="1">Islamabad</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div id="map" style="width: 100% ; height : 850px"></div>
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
                anchor: new google.maps.Point(0, 0)
            };


            var locations = [
                @foreach ($data_marker as $key => $value)
                    ["{{ $value->tenquan }}",{{ $value->kinhdo }},{{ $value->vido }}],
                @endforeach
            ];
            var infowindow = new google.maps.InfoWindow();

            var marker1, i;
            for (i = 0; i < locations.length; i++) {
                marker1 = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                google.maps.event.addListener(marker1, 'click', (function(marker1, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        marker1.setAnimation(google.maps.Animation.BOUNCE);
                        infowindow.open(map, marker1);
                    }
                })(marker1, i));
            }




            //     // // var marker11 = [
            @foreach ($data_marker as $key => $value)
                // [{{ $value->id_quan }},{{ $value->kinhdo }},{{ $value->vido }}],
                // @endforeach
            //     ];

            //     console.log(marker11);
            //     var marker9;
            //    for(int i = 0; i < marker11.length ; i++){
            //        var pos1 = new google.maps.LatLng(parseFloat(marker11[i][1]),parseFloat(marker11[i][2]));
            //        marker9 = new google.maps.Marker({
            //            position: pos1,
            //             map:map,
            //             icon : icon_marker,
            //        });
            //    }




            //SHOW MULTI MARKER
            // var some_mark,infoWindow;
            @foreach ($data_marker as $key => $value)
            
                // var lat = {{ $value->kinhdo }};
                // var lng = {{ $value->vido }};
            
                // // var infoContent = document.createElement('div');
                // // // var name = {{ $value->diachi }};
                // // var strong = document.createElement('strong');
            
                // // strong.textContent = "name" ;
                // // infoContent.appendChild(strong);
                // // infoContent.appendChild(document.createElement('br'));
            
            
                // var position_mark = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));
            
                // some_mark = new google.maps.Marker({
                // map:map,
                // position: position_mark,
                // animation: google.maps.Animation.DROP,
                // icon : icon_marker,
            
                // });
                // infoWindow = new google.maps.InfoWindow();
                // google.maps.event.addListener(some_mark,'click', function(event) {
                // if (some_mark.getAnimation() !== null) {
                // some_mark.setAnimation(null);
                // } else {
                // some_mark.setAnimation(google.maps.Animation.BOUNCE);
                // }
                // infoWindow.setContent("");
                // infoWindow.open(map, some_mark);
                // });
            
                // @endforeach

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

                        map.setCenter(pos);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                handleLocationError(false, infoWindow, map.getCenter());
            }







        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ? "Lỗi : Lỗi Geolocation" :
                "Lỗi : Trình duyệt không hỗ trợ Geolocation.");
            infoWindow.open(map);
        }
        google.maps.event.addDomListener(window, 'load', initMap);

    </script>

@endsection
