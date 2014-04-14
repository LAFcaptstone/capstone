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
            var address = '{{{$foundItem->location}}}'
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
  #map-canvas { height: 400px; width:450px; margin-left: 10px;}
  #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
            /* bootstrap 3 helpers */

.navbar-form input, .form-inline input {
  width:auto;
}

/* end */

/* custom theme + Bootstrap resets */
@import url('http://fonts.googleapis.com/css?family=Open+Sans:300,400');

header {
  min-height:180px;
    margin-bottom:5px;
}

/* only apply sticky columns on wider screens */
@media (min-width: 1200px) {
  #sidebar {
  margin-left:15px;
  }

  #content {
  padding-right:15px;
  }

  #sidebar.affix-top {
      position: static;
  }
  
  #sidebar.affix {
      position: fixed !important;
      top: 20px;
      width:200px;
  }

  #midCol.affix-top {
      position: static;
  }

  #midCol.affix-bottom {
      padding-top:0;
  }
  
  #midCol.affix {
      position:fixed !important;
      top: 20px;
      width:292px;
  }
}

.affix {
      position:static;
}

body {
  font-family: 'Open Sans',Arial,Helvetica,Sans-Serif;
  font-weight:300;
  color:#676767;
  background-color:#efefef;
}

a,a:hover {
  color:#77CCDD;
    text-decoration:none;
}

.highlight-bk {
  background-color:#77CCDD;
    padding:1px;
    width:100%;
}

.highlight {
  color:#77CCDD;
}
  
h3.highlight  {
  padding-top:13px;
    padding-bottom:14px;
    border-bottom:2px solid #77CCDD;
}

.navbar {
  background-color:#77CCDD;
    color:#ffffff;
    border-radius:0;
}
.navbar-nav > li > a {
    color:#fff;
    padding-left:20px;
    padding-right:20px;
    border-left:1px solid #66BBCC;
}
.navbar-nav > li:last-child > a {
    border-right:1px solid #66BBCC;
}

.navbar-nav li a:hover {
    background-color:#66BBCC;
}

.navbar-nav > .open > a, .navbar-nav > .open > a:hover, .navbar-nav > .open > a:focus {
  color: #000;
    opacity:.9;
}

.navbar-brand {
  color:#fff;
}

.accordion-group {
  border-width:0;
}

.dropdown-menu {
  min-width: 250px;
}

.caret {
  color:#fff;
}

.navbar-toggle {
  color:#fff;
    border-width:0;
}
  
.navbar-toggle:hover {
  background-color:#fff;
}

.panel,.panel-heading {
    border-radius:0;
    border-width:0;
    -webkit-box-shadow: 0 3px 3px rgba(0, 0, 0, 0.09);
  box-shadow: 0 3px 3px  rgba(0, 0, 0, 0.09);
}

.thumbnail {
  margin-bottom:8px;
  border-radius:0;
}

.well {
    border-radius:0;
}

.accordion-heading .accordion-toggle, .accordion-inner, .nav-stacked li > a {
  padding-left:1px;
}

footer {
  height:50px;
    background-color:#dfdfdf;
    color:#888;
    margin-top:20px;
}

@media (min-width: 992px) {
  .no-gutter.row > div[class*='col-md'] {
    padding-left: 0;
    padding-right: 0;
  }
  .no-gutter.row > .col-md-12 {
    width: 99.99999999999999%;
    *width: 99.93055555555554%;
  }
  .no-gutter.row .col-md-11 {
    width: 91.66666666666666%;
    *width: 91.59722222222221%;
  }
  .no-gutter.row > .col-md-10 {
    width: 83.33333333333331%;
    *width: 83.26388888888887%;
  }
  .no-gutter.row > .col-md-9 {
    width: 74.99999999999999%;
    *width: 74.93055555555554%;
  }
  .no-gutter.row > .col-md-8 {
    width: 66.66666666666666%;
    *width: 66.59722222222221%;
  }
  .no-gutter.row > .col-md-7 {
    width: 58.33333333333333%;
    *width: 58.263888888888886%;
  }
  .no-gutter.row > .col-md-6 {
    width: 49.99999999999999%;
  }
  .no-gutter.row > .col-md-4 {
    width: 33.33333333333333%;
  }
  .no-gutter.row > .col-md-3 {
    width: 24.999999999999996%;
    *width: 24.930555555555554%;
  }
  .no-gutter.row > .col-md-2 {
    width: 16.666666666666664%;
    *width: 16.59722222222222%;
  }
  .no-gutter.row > .col-md-1 {
    width: 8.333333333333332%;
    *width: 8.263888888888888%;
  }
}

/* end custom theme */
        </style>
@stop

@section('content')  
        <!-- Begin Navbar -->
<div class="navbar navbar-static">
   <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{{action('HomeController@showWelcome')}}}" target="ext"><b>Vind iT!</b></a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Channels</a>
            <ul class="dropdown-menu">
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              
            </ul>
          </li>
        </ul>
        <ul class="nav pull-right navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
            <ul class="dropdown-menu" style="padding:12px;">
                <form class="form-inline">
     				<button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
                </form>
             </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="#">Login</a></li>
              <li><a href="#">Profile</a></li>
              <li class="divider"></li>
              <li><a href="#">About</a></li>
             </ul>
          </li>
        </ul>
      </div>
    </div>
</div><!-- /.navbar -->

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>{{{ $foundItem->title }}}</h1>
        <small style='margin-right:15px;'>Posted on: {{{ $foundItem->created_at }}}</small>
        <p class="badge">Location: {{{ $foundItem->location }}}</p>
      </div>
    </div>
  </div>

<!-- Begin Body -->
<div class="container">
	<div class="no-gutter row">
      		<!-- left side column -->
  			<div class="col-md-3">
              	<div class="panel panel-default" id="sidebar">
                <div class="panel-heading" style="background-color:#888;color:#fff;">Image</div> 
                <div class="panel-body">
                  <div style='height:300px;'>
                  @if(!is_null($foundItem->image_path))
                  <img class='img-responsive' src="{{{ $foundItem->image_path }}}">
                  @endif
                </div>
                  
                  <hr>

                <div class="col col-span-12">
                  <i class="icon-2x icon-facebook"></i>&nbsp;
                  <i class="icon-2x icon-twitter"></i>&nbsp;
                  <i class="icon-2x icon-linkedin"></i>&nbsp;
                  <i class="icon-2x icon-pinterest"></i>
                </div>
                
                </div><!--/panel body-->
              </div><!--/panel-->
      		</div><!--/end left column-->
      			
      		<!--mid column-->
      		<div class="col-md-4">
              <div class="panel" id="midCol">
                <div class="panel-heading" style="background-color:#555;color:#eee;">Post Description</div> 
                <div class="panel-body" style='height:300px;'>
                  <div class="well">
                          <h4>{{{ $foundItem->body }}}
                  </div>
                  
                  <hr>
                  <button class='btn btn-success center-block'>Contact Post Creator</button>
                  
               </div> 
               </div><!--/panel-->
      		</div><!--/end mid column-->
      		
      		<!-- right content column-->
      		<div class="col-md-5" id="content">
            	<div class="panel">
    			<div class="panel-heading" style="background-color:#111;color:#fff;">Map</div>   
              	<div class="panel-body">
                  <div class='row'>
                    <div id="map-canvas"/>
                  </div><!--/panel-body-->
                </div><!--/panel-->
              	<!--/end right column-->
      	</div> 
  	</div>
</div>
@stop