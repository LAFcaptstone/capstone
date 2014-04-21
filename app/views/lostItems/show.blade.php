@extends('layouts.master')

@section('topscript')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">

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
				var address = '{{{$lostItem->location}}}'
				geocoder.geocode( { 'address': address}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
							map.setCenter(results[0].geometry.location);
						var marker = new google.maps.Marker({
									map: map,
									position: results[0].geometry.location
							});
					}else {
							alert('Geocode was not successful for the following reason: ' + status);
					}
				});
		}

	google.maps.event.addDomListener(window, 'load', initialize);
	window.onload = function(){
		codeAddress();
	};
</script>

  
        <!-- CSS code from Bootply.com editor -->
        
        <style type="text/css">

  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map-canvas { height: 300px; width:325px; margin: auto;}
  /*#panel {
        position: absolute;
        top: 5px;
        left: 40%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        margin-top: 10px;
      }*/
            /* bootstrap 3 helpers */


/* end */



/* added styling */
.showBoarder {
  margin-top: 60px;
  border-style:solid;
  border-width:1px;

}
.outerPadding{
  padding-bottom: 0px;
}

.image {
  margin-top: 18px;
  padding: 0px;

}

.space {
  height: 200px;
  width: 200px;
  margin: auto;
}


</style>
@stop

@section('content')  
        <!-- Begin Navbar -->


  

<!-- Begin Body -->
<div> 
  <section class="container-fluid outerPadding" id="section3">
    <div class="container showBoarder">
      <div class="row">
          <div class="col-sm-4 image">
                @if(!is_null($lostItem->image_path))
                	<img class="img-responsive center-block space" src="{{{ $lostItem->image_path }}}">
                @else
    					<img src="/img/default.png" alt="" class="img-responsive center-block space">
                @endif
          </div>      
          <!--mid column-->
        <div class="col-sm-4 text-center">
          <div class="row">
                  <h2>{{{ $lostItem->title }}}</h2>
                  <hr width="375px">
                  <p>{{{ $lostItem->body }}}</p>
                  <p>Reward: {{{ $lostItem->reward }}}</p>
                <div>       
                  <p class="badge">Location: {{{ $lostItem->location }}}</p>
                </div>
              <small style='margin-right:15px;'>Posted on: {{{ $lostItem->created_at }}}</small>
          </div>
        </div>
      <!-- right content column-->
        <div class="col-sm-4 center-block">
          <div class="row">
            <div id="map-canvas"/>
          </div><!--/panel-body-->
        </div>
      </div>
    </div>
  </div>
        <div class="container col-md-4 col-md-offset-4">
          <div class="btn-group">
            <div class="btn-group">
              {{ Form::open(array('action' => array('LostItemsController@flag', $lostItem->id))) }}
              {{ Form::submit('Flag Post', array('class' => 'btn btn-default show')) }}
              {{ Form::close() }}
            </div>
            <div class="btn-group">
              <button class="btn btn-default show"><a href="mailto:{{{ $lostItem->email }}}">Contact Post Creator</a></button>
            </div>  
            <div class="btn-group">
              <button class="btn btn-default show"><a href="{{{action('LostItemsController@index') }}}">Return to Lost Items</a></button>
            </div> 
            @if(Auth::check() && Auth::user()->is_admin == 1) 
            <div class="btn-group">
              <button class="btn btn-default show"><a href="{{{action('HomeController@showLostItemsDashboard') }}}">Return to Dashboard</a></button>
            </div>
            @endif   
          </div>
        </div>


@stop

