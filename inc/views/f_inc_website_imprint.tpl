<div class="container">
	<div class="row">
		<div class="col-lg">
			<h1>hobidd is brought to you by</h1><br>

			<span class="text-bold">PEPPERMINDED&nbsp;</span>MARKETING SOLUTIONS<br/><br>
			DR FRANZ-REINPRECHTWEG 5<br/>
			9020 KLAGENFURT AM WS<br/>
			AUSTRIA<br/><br>
			UID ATU45471109<br>
			<br/>
			<a href="office@pepperminded.com">office@pepperminded.com</a><br/>


			<div id="map" style="height: 400px; margin-top:50px;"></div>
            {literal}
				<script>
                    var map;

                    function initMap() {
                        var hobidd = {lat: 46.638485, lng: 14.293089};

                        map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: 46.638485, lng: 14.293089},
                            zoom: 5
                        });

                        var marker = new google.maps.Marker({
                            position: hobidd,
                            map: map
                        });

                        var styles = [{
                            "featureType": "landscape",
                            "stylers": [{"saturation": -100}, {"lightness": 65}, {"visibility": "on"}]
                        }, {
                            "featureType": "poi",
                            "stylers": [{"saturation": -100}, {"lightness": 51}, {"visibility": "simplified"}]
                        }, {
                            "featureType": "road.highway",
                            "stylers": [{"saturation": -100}, {"visibility": "simplified"}]
                        }, {
                            "featureType": "road.arterial",
                            "stylers": [{"saturation": -100}, {"lightness": 30}, {"visibility": "on"}]
                        }, {
                            "featureType": "road.local",
                            "stylers": [{"saturation": -100}, {"lightness": 40}, {"visibility": "on"}]
                        }, {
                            "featureType": "transit",
                            "stylers": [{"saturation": -100}, {"visibility": "simplified"}]
                        }, {
                            "featureType": "administrative.province",
                            "stylers": [{"visibility": "off"}]
                        }, {
                            "featureType": "water",
                            "elementType": "labels",
                            "stylers": [{"visibility": "on"}, {"lightness": -25}, {"saturation": -100}]
                        }, {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [{"hue": "#ffff00"}, {"lightness": -25}, {"saturation": -97}]
                        }];
                        map.set('styles', styles);
                    }
				</script>
            {/literal}
		</div>
	</div>
</div>
