
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
		<meta charset="utf-8">
		<title>Vind iT!</title
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
		<link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x11png">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">
				
<style type="text/css">
html,body {
	height:100%;
}


.lead {
	color:#FFF;
	text-shadow: 0px 0px 5px #FFF;
	font-family: Arial,sans-serif;
	font-size:65px;
}


/* Custom container */
.container-full {
	margin: 0 auto;
	width: 100%;
	min-height:100%;
	background-color:#110022;
	color:#A0D5EE;
	overflow:hidden;
	background: #014464;
	background: -moz-linear-gradient(top, #0D658E, #0C577A 50%, #014D71 51%, #003E5C);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #0E658E), color-stop(.5, #0C577A), color-stop(.5, #014D71), to(#003E5C)); 
}

.container-full a {
	color:#efefef;
	text-decoration:none;
}

.v-center {
	margin-top:2%;
}

.btncolor{
	background: #014464;
	background: -moz-linear-gradient(top, #0D658E, #0C577A 50%, #014D71 51%, #003E5C);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #0E658E), color-stop(.5, #0C577A), color-stop(.5, #014D71), to(#003E5C)); 
}

	.button {
	 width: 300px;
	 height: 100px;
	 line-height: 100px;
	 margin-top:33px;
	 color: white;
	 text-decoration: none;
	 font-size: 35px;
	 font-family: helvetica, arial;
	 font-weight: bold;
	 display: block;
	 text-align: center;
	 position: relative;

	 /* BACKGROUND GRADIENTS */
	 background: #014464;
	 background: -moz-linear-gradient(top, #0D658E, #0C577A 50%, #014D71 51%, #003E5C);
	 background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #0E658E), color-stop(.5, #0C577A), color-stop(.5, #014D71), to(#003E5C)); 


	 /* BORDER RADIUS */
	 -moz-border-radius: 10px;
	 -webkit-border-radius: 10px;
	 border-radius: 10px;

	 border: 1px solid #368DBE;
	 border-top: 1px solid #c3d6df;


	 /* TEXT SHADOW */

	 text-shadow: 1px 1px 1px black;

	 /* BOX SHADOW */
	 -moz-box-shadow: 0 0px 5px #FFF;
	 -webkit-box-shadow: 0 0px 5px #FFF;
	 box-shadow: 0 0px 5px #FFF;
	}
	
	/* WHILE HOVERED */
	.button:hover {
		background: #014464;
	 	background: -moz-linear-gradient(top, #0c5f85, #0b5273 50%, #024869 51%, #003853);
	 	background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #0c5f85), color-stop(.5, #0b5273), color-stop(.51, #024869), to(#003853));
	}
	
	/* WHILE BEING CLICKED */
	.button:active {
		-moz-box-shadow: 0 0px 25px #fff;
		-webkit-box-shadow: 0 0px 25px #fff;
	}
	
</style>
	</head>	
		
		<body>
				
				<div class="container-full">

			<div class="row">
			 
				<div class="col-lg-12 text-center v-center">
					
					<h1 class='lead'>Vind iT</h1>
					
					
					<br>
					
					<div class="col-lg-12">
						<a href="{{{ action('LostItemsController@index')}}}" class="button center-block">
							I Lost A...
						</a>
						<a href="{{{ action('FoundItemsController@index')}}}" class="button center-block">
							I Found A...
						</a>
					</div>
				</div>
				
			</div> <!-- /row -->

</div> <!-- /container full -->

<div class="container">
	
		<hr>
	
		<div class="row">
				<div class="col-md-4">
					<a href=''><button class="btn btncolor text-center" style='width:375px; color:#FFF;'>About Vind iT</button></a>
				</div>
				<div class="col-md-4">
					
					<a href=''><button class="btn btncolor text-center" style='width:375px; color:#FFF;'>Contact Us</button></a>
					
				</div>
				<div class="col-md-4">
					<a href="{{{ action('HomeController@showLogin')}}}"><button class="btn btncolor text-center" style='width:375px; color:#FFF;'>Admin</button></a>
				</div>
		</div>
		<br>
		<div class='row'>
			<div class='col-lg-12'>
				<h5 class='text-center'><small>Small Logo &copy;2014</small></h5>
<div style='margin-top:10px'/>
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
</body
</html>