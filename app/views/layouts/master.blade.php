
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
		<link href='/css/master.css' rel='stylesheet'>
		
		@yield('topscript')
	</head>	
	<body>
		<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
  			<div class="container">
    
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="{{{action('HomeController@showWelcome')}}}">Vind iT</a>
			    </div>
    
    			<div class="navbar-collapse collapse" id="navbar-collapsible">
				    <ul class="nav navbar-nav navbar-left">
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
					    <li>&nbsp;</li>
				    </ul>
   
			        <form class="navbar-form">
			          <div class="form-group" style="display:inline;">
			            <div class="input-group">
			              <div class="input-group-btn">
			                	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">View Posts</button>
			                	<ul class="dropdown-menu">
			          			<li class="found-items"><a href="{{{ action('HomeController@searchFoundItems') }}}">Found Items</a></li>
			          			<li class="lost-items"><a href="{{{ action('HomeController@searchLostItems') }}}">Lost Items</a></li>
			          		</ul>
			              </div>
			              <input type="text" name="search" id="searching" class="form-control" placeholder="What are searching for?" {{ Request::is('searchFoundItems') || Request::is('searchLostItems') ? '' : "disabled" }}>
			          	<span class="input-group-addon"><button type='submit'><span class="glyphicon glyphicon-search"></span></button></span>
			            </div>
			          </div>
			        </form>
    			</div>
 	 		</div>
		</nav>
		<div class="container">
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
