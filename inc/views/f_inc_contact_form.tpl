<br>
<div class="container">
	<div class="row">
		<div class="col-lg">
            {$pagedata.content}

            {if $msg}
				<div class="alert alert-success mt-3" role="alert">
                    {$msg}
				</div>
            {/if}

            {if !$B_success}
				<form method="post" style="margin-top:25px;">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">{$translation.name}*</span>
						</div>
						<input type="text" class="form-control" placeholder="" aria-label="Username"
							   aria-describedby="basic-addon1" name="data[name]" value="{$data.name}" required>
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon2">{$translation.email}*</span>
						</div>
						<input type="text" class="form-control" placeholder="" aria-label="Email"
							   aria-describedby="basic-addon2" name="data[email]" value="{$data.email}" required>
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">{$translation.message}*</span>
						</div>
						<textarea rows="10" class="form-control" aria-label="Content" name="data[content]"
								  value="{$data.content}" required></textarea>
					</div>

					<div class="g-recaptcha" data-sitekey="6Ld2phMTAAAAANjahu7CaXFbOSJVeabrTbLv4Flq"></div>

					<button type="submit" class="btn btn-success mt-4">{$translation.send_message}</button>
				</form>
            {/if}
		</div>
		<div class="col-lg">
			<h2>hobidd wird zur Verfügung gestellt von</h2>

			<span class="text-bold">PEPPERMINDED&nbsp;</span>MARKETING SOLUTIONS<br/><br>
			DR FRANZ-REINPRECHTWEG 5<br/>
			9020 KLAGENFURT AM WS<br/>
			AUSTRIA<br/><br>
			UID ATU45471109<br>
			<br/>
			<a href="office@pepperminded.com">office@pepperminded.com</a><br/>


            {*<div id="map" style="height: 400px; margin-top:50px;"></div>
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

                    var styles = [{"featureType": "landscape", "stylers": [{"saturation": -100}, {"lightness": 65}, {"visibility": "on"}]}, {"featureType": "poi", "stylers": [{"saturation": -100}, {"lightness": 51}, {"visibility": "simplified"}]}, {"featureType": "road.highway", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "road.arterial", "stylers": [{"saturation": -100}, {"lightness": 30}, {"visibility": "on"}]}, {"featureType": "road.local", "stylers": [{"saturation": -100}, {"lightness": 40}, {"visibility": "on"}]}, {"featureType": "transit", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "administrative.province", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "labels", "stylers": [{"visibility": "on"}, {"lightness": -25}, {"saturation": -100}]}, {"featureType": "water", "elementType": "geometry", "stylers": [{"hue": "#ffff00"}, {"lightness": -25}, {"saturation": -97}]}];
                    map.set('styles', styles);
                }
                </script>
            {/literal}
        </div>*}
		</div>
	</div>
