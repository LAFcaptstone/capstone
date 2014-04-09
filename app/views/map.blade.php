@extends('layouts.master')

@section('topscript')
<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5pYCoWnluxbeBgj6r9-evOPE_WJflfl0&sensor=true">
</script>
	 <script type="text/javascript">
			var geocoder;
			var map;
			function initialize() {
				geocoder = new google.maps.Geocoder();
				var mapOptions = {
					center: new google.maps.LatLng(29.424122, -98.493628),
					zoom: 11
				};
				map = new google.maps.Map(document.getElementById("map-canvas"),
					mapOptions);
				}
				function codeAddress() {
  					var address = document.getElementById('address').value;
  					geocoder.geocode( { 'address': address}, function(results, status) {
   						if (status == google.maps.GeocoderStatus.OK) {
      						map.setCenter(results[0].geometry.location);
    						var marker = new google.maps.Marker({
          						map: map,
          						position: results[0].geometry.location

      						});
      						alert(status);
    					}else {
      						alert('Geocode was not successful for the following reason: ' + status);
    					}
  					});
				}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
<style type="text/css">
	html { height: 100% }
	body { height: 100%; margin: 0; padding: 0 }
	#map-canvas { height: 100%; width:65%; margin-left: 30% }
	#panel {
        position: absolute;
        top: 5px;
        left: 50%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
</style>

@section('content')
<div class='row'>
<div id="panel">
      <input id="address" type="textbox" value="San Antonio, Texas">
      <input type="button" value="Geocode" onclick="codeAddress()">
</div>
<div id="map-canvas"/>

@stop