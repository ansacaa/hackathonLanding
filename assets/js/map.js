/* ---------------------------------------------- /*
* Google Map
/* ---------------------------------------------- */

function initMap() {
    if(document.getElementById('map') === null || typeof google == 'undefined') return;
    
    var cntr = new google.maps.LatLng(19.020000,-98.244);
    var mkr = new google.maps.LatLng(19.019700,-98.244584);

    var mapElement = document.getElementById('map');
    var map = new google.maps.Map(mapElement, {
        zoom: 17,
        center: cntr
    });

    var marker = new google.maps.Marker({
        position: mkr,
        title: 'Tecnológico de Monterrey Campus Puebla',
        map: map,
    });

    var infowindow = new google.maps.InfoWindow({
        content: '<p>Atlixcáyotl 5718, Reserva Territorial Atlixcáyotl, 72453 Puebla, Pue.</p>'
    });

    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });
}