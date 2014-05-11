<?php
require_once("config.php");
require_once("database.php");
require_once("header.php");
?>
<div class="container-fluid">
	<div class="row my-row">
			<div id="map"></div>
			<script type="text/javascript" src="/js/leaflet.js"></script>
			<script type="text/javascript">
				var map = L.map('map').setView([14.6042, 120.9821], 13);
				L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
					maxZoom: 18,
					attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
						'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
						'Imagery © <a href="http://mapbox.com">Mapbox</a>',
					id: 'examples.map-9ijuk24y'
				}).addTo(map);
				$.get('/markerfeed.php', function(x) {
					var temp = $.parseJSON(x);
					
					var marker = L.marker([51.5, -0.09]).addTo(map);
				});
				// map.on('click', function(e) {
					// var marker = L.marker(e.latlng).addTo(map);
				// });
			</script>
	</div>
</div>
<?php
require_once("footer.php");