
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
		<meta charset="utf-8">
		<title>Vind iT</title
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
		<link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x11png">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">
		<link href='/css/base.css' rel='stylesheet'>
		@yield('topscript')
	</head>	
		<body>	
			<div class="container">
				@if (Session::has('successMessage'))
					<div class="alert alert-success">{{{ Session::get('successMessage') }}}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
				@endif
				@if (Session::has('errorMessage'))
					<div class="alert alert-danger">{{{ Session::get('errorMessage') }}}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
				@endif
			</div>
	   
	   		<!-- yeilding content from blades -->
			@yield('content')
		
			<footer>
				<br>
				<div class='row'>
					<div class='col-lg-12'>
						<h5 class='text-center'><small>Small Logo &copy;2014</small></h5>
					</div>
				</div>
				<div style='margin-top:10px'/>
			</footer>

	</div>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
@yield('bottomscript')
</html>
