function createMap() {

    var myLatLng = {
        lat: 10.843371,
        lng: 106.795153
    };
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: myLatLng,
    });
    var marker = new google.maps.Marker({ map: map });
    var inforWindow = new google.maps.InfoWindow();
    marker.setVisible(false);

    var searchBox = document.getElementById("searchmap");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(searchBox);
    var autocomplete = new google.maps.places.Autocomplete(searchBox);
    autocomplete.bindTo('bounds', map);

    autocomplete.addListener('place_changed', () => {
        inforWindow.close();
        var place = autocomplete.getPlace();
        if (!place.geometry || !place.geometry.location) {
            return;

        }
        if (place.geometry.viewpoint) {
            map.fitBounds(place.geometry.viewpoint);

        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(15);
        }
        marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location,
        });
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
        document.getElementById('lat_res').value = place.geometry.location.lat();
        document.getElementById('lng_res').value = place.geometry.location.lng();
        inforWindow.setContent('<div><strong style="font-weight: bold">' + place.name + '</strong><br>' + address);
        inforWindow.open(map, marker);

    });

}