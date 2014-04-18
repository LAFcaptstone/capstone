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
  #map-canvas { height: 300px; width:325px; margin-left: 15px; margin-top: 15px;}
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
.space {
  margin-top: 100px;
  margin-left: 10%;
  
}

.box {
  width: 120%;
  margin: 0 auto;
  border-style:solid;
  border-width:1px;
}

.contact {
  margin: auto;
  margin-top: 40px;
}

.show {
  margin: 0px;
}



    /* end custom theme */
</style>
@stop

@section('content')  
                <!-- Begin Navbar -->


    

<!-- Begin Body -->
<div class="container space">
    <div class="no-gutter row box">
        <!-- left side column -->
                <div class="col-md-4">
                                
                                <!-- <div class="panel-heading" style="background-color:#888;color:#fff;">Image</div>  -->
                    <div class="panel-body">
                      <div style='height:300px; width:370px;'>
                      @if(!is_null($foundItem->image_path))
                        <img class="img-responsive" src="{{{ $foundItem->image_path }}}">
                      @else
                        <img src="/img/vind.jpeg" alt="" class="img-responsive">
                      @endif
                    </div>
                                    
                                
                                
                                </div><!--/panel body-->
                        
                    </div><!--/end left column-->
                        
                    <!--mid column-->
                    <div class="col-md-4">
                            
                                <!-- <div class="panel-heading" style="background-color:#555;color:#eee;">Post Description</div>  -->
                                <div class="panel-body" style='height:300px;'>
                                    <div>
                          <h2>{{{ $foundItem->title }}}</h2>
                          <hr>
                          <p>{{{ $foundItem->body }}}
                            <div class="col-md-12">
                           
                           <p class="badge">Location: {{{ $foundItem->location }}}</p>
                         </div>
                         <small style='margin-right:15px;'>Posted on: {{{ $foundItem->created_at }}}</small>
                                    </div>
                                    <div>
                                     
                                    </div class="contact">
                               </div> 
                            
                    </div><!--/end mid column-->
                    
                    <!-- right content column-->
                    <div class="col-md-4" id="content">
                            <!-- <div class="panel"> -->
                    <!-- <div class="panel-heading" style="background-color:#111;color:#fff;">Map</div>    -->
                                
                                    <div class='row'>
                                        <div id="map-canvas"/>
                                    </div><!--/panel-body-->
                                
                                <!--/end right column-->
                  </div> 
    </div>
</div>
        <div class="container col-md-4 col-md-offset-4">
          <div class="btn-group">
            <div class="btn-group">
              {{ Form::open(array('action' => array('FoundItemsController@flag', $foundItem->id))) }}
              {{ Form::submit('Flag Post', array('class' => 'btn btn-default show')) }}
              {{ Form::close() }}
            </div>
            <div class="btn-group">
              <button class="btn btn-default show"><a href="mailto:{{{ $foundItem->email }}}">Contact Post Creator</a></button>
            </div> 
            <div class="btn-group">
              <button class="btn btn-default show"><a href="{{{action('FoundItemsController@index') }}}">Return to Found Items</a></button>
            </div> 
            @if(Auth::check() && Auth::user()->is_admin == 1)  
            <div class="btn-group">
              <button class="btn btn-default show"><a href="{{{action('HomeController@showFoundItemsDashboard') }}}">Return to Dashboard</a></button>
            </div>
            @endif   
          </div>
        </div>


@stop

