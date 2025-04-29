(function($){
	jQuery(document).ready(function($) {	

		$('.google-map').each(function(){
			var latitude = $(this).data('latitude');
			var longitude = $(this).data('longitude');
			var marker1 = $(this).data('marker');
			var title = $(this).data('title');
			var description = $(this).data('description');
			var dataHue = $(this).data('hue');
			var dataSaturation  = $(this).data('saturation');
			var dataLightness   = $(this).data('lightness');
			var dataType   = $(this).data('type');
			var map_id_unique = $(this).data('id');
			
			/* ==============================================
MAP -->
=============================================== */

	if( dataType !== undefined && dataType !== false ) {
		if( dataType == 'satellite' ) {
			mapType = google.maps.MapTypeId.SATELLITE;
		} else if( dataType == 'hybrid' ) {
			mapType = google.maps.MapTypeId.HYBRID;
		} else if( dataType == 'terrain' ) {
			mapType = google.maps.MapTypeId.TERRAIN;
		} else{
			mapType = google.maps.MapTypeId.ROADMAP;
		}
	}else{
			mapType = google.maps.MapTypeId.ROADMAP;
		}

    var locations = [
        ['<div class="map-data"><h6><a href="#">'+title+'</a></h6><div class="map-content">'+description+'</div></div>', latitude, longitude, 2]
        ];     
        var map = new google.maps.Map(document.getElementById(map_id_unique), {
        zoom: 12,
        scrollwheel: false,
        navigationControl: true,
        mapTypeControl: false,
        scaleControl: false,
        draggable: true,
       styles: [
    {
        stylers: [
            { hue : dataHue },
			{ saturation: dataSaturation },
			{ lightness: dataLightness }
        ]
    }
],
        center: new google.maps.LatLng(latitude, longitude),
		
        mapTypeId: mapType
		
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({ 
        position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
        map: map ,
        icon: marker1
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
        }
        })(marker, i));
    }

	})	
		
	});
})(jQuery);