
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
				<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" rel="home" href="{{{action('HomeController@showWelcome')}}}">Vind iT</a>
					</div>
					
					<div class="collapse navbar-collapse">
						
						<ul class="nav navbar-nav">
							@if(Auth::check() && Auth::user()->is_admin == 1)
							<li><a href="{{{ action('HomeController@showFoundItemsDashboard') }}}" >Welcome ({{{Auth::user()->first_name}}})</a></li>
							@elseif(Auth::check() && Auth::user()->is_admin == 2)
							<li><a href="{{{ action('UserController@show', Auth::user()->id) }}}" >Welcome ({{{Auth::user()->first_name}}})</a></li>
							@else
							<li><a href="{{{ action('HomeController@showLogin') }}}" >Login</a></li>
							@endif
							<li><a href="{{{ action('HomeController@showContact') }}}">Contact Us</a></li>
							<li><a href="{{{ action('FoundItemsController@create') }}}" style='color:green;'>New Found Post</a></li>
							<li><a href="{{{ action('LostItemsController@create') }}}" style='color:#F00;'>New Lost Post</a></li>
						</ul>
						<div class="col-sm-4 col-md-4 pull-right">
						{{ Form::open(array('action' => array('HomeController@search'), 'method' => 'GET', 'class' => 'navbar-form')) }}
						{{ Form::text('search') }}
       					{{ Form::submit('Search', array('class'=> 'btn btn-default')) }}
						{{ Form::close() }} 
						</div>
						
					</div>
				</div>
				    
				@if (Session::has('successMessage'))
					<div class="alert alert-success" style='margin-top:50px;'>{{{ Session::get('successMessage') }}}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
				@endif
				@if (Session::has('errorMessage'))
					<div class="alert alert-danger" style='margin-top:50px;'>{{{ Session::get('errorMessage') }}}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
				@endif
			</div>
	   		<!-- yeilding content from blades -->
			@yield('content')

		
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
@yield('bottomscript')
</html>
