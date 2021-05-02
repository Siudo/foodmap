@extends('welcome')
@section('content')

    <div class="site-section ">
        <div class="container-fluid">
        
            <div id="map" style="width: 100% ; height : 850px"></div>
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

           
            @foreach ($data_marker as $key => $value)
                
                var lat = {{$value->kinhdo}};
                var lng = {{$value->vido}};
                
                var infoContent = document.createElement('div');
                //var name = {{$value->diachi}};
                var strong = document.createElement('strong');
                
                strong.textContent = "name" ;
                infoContent.appendChild(strong);
                infoContent.appendChild(document.createElement('br'));

                var position_mark = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));
                
                var some_mark = new google.maps.Marker({
                    map:map,
                    position: position_mark,
                    label : 'R',
                });
                var infoWindow = new google.maps.InfoWindow();
                google.maps.event.addListener(some_mark,'click', function() {
                infoWindow.setContent(infoContent);
                infoWindow.open(map, some_mark);
                });

            @endforeach
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
                        marker.addListener('click',function(){
                            infoWindow.setContent("lat and lng : " + pos.lat + "------" + pos.lng);
                            infoWindow.open(map,marker);
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

    </script>
  
@endsection
