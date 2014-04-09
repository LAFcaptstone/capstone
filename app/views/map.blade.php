@extends('layouts.master')

@section('topscript')
<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5pYCoWnluxbeBgj6r9-evOPE_WJflfl0&sensor=true">
</script>
	 <script type="text/javascript">
			function initialize() {
				var mapOptions = {
					center: new google.maps.LatLng(29.424122, -98.493628),
					zoom: 11
				};
				var map = new google.maps.Map(document.getElementById("map-canvas"),
					mapOptions);
				}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
<style type="text/css">
	html { height: 100% }
	body { height: 100%; margin: 0; padding: 0 }
	#map-canvas { height: 100% }
</style>
@section('content')

<div id="map-canvas"/>

@stop