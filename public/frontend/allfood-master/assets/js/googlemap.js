// function initMap() {
//     var map = new google.maps.Map(document.getElementById("map"), {
//         center: {
//             lat: 10.843371,
//             lng: 106.795153
//         },
//         zoom: 13,
//     });

//     var infoWindow = new google.maps.InfoWindow();

//     // current location
//     var locate;
//     map.controls[google.maps.ControlPosition.TOP_CENTER].push(locate);
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(
//             (position) => {
//                 const pos = {
//                     lat: position.coords.latitude,
//                     lng: position.coords.longitude,
//                 };
//                 infoWindow.setPosition(pos);
//                 var marker = new google.maps.Marker({
//                     map: map,
//                     position: {
//                         lat: pos.lat,
//                         lng: pos.lng,
//                     },
//                 });
//                 infoWindow.setContent("lat and lng : " + pos.lat + "------" + pos.lng);
//                 infoWindow.open(map);
//                 map.setCenter(pos);
//             },
//             () => {
//                 handleLocationError(true, infoWindow, map.getCenter());
//             }
//         );
//     } else {
//         handleLocationError(false, infoWindow, map.getCenter());
//     }
// }

// function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//     infoWindow.setPosition(pos);
//     infoWindow.setContent(browserHasGeolocation ? "Lỗi : Lỗi Geolocation" : "Lỗi : Trình duyệt không hỗ trợ Geolocation.");
//     infoWindow.open(map);
// }