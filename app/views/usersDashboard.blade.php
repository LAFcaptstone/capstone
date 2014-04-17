@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        	<ul class="nav nav-sidebar">
        	 	<li class="active"><a href="{{{action('HomeController@showFoundItemsDashboard') }}}">Found Items</a></li>
        	 	<li><a href="{{{action('HomeController@showLostItemsDashboard') }}}">Lost Items</a></li>
        	 	<li><a href="{{{action('HomeController@showUsersDashboard') }}}">Users</a></li>
        		<li><a href="{{{action('HomeController@showMessagesDashboard') }}}">Messages</a></li>
        	</ul>
        	<ul class="nav nav-sidebar">
        		<li><a href="">Nav item</a></li>
        		<li><a href="">Nav item again</a></li>
        		<li><a href="">One more nav</a></li>
        		<li><a href="">Another nav item</a></li>
        		<li><a href="">More navigation</a></li>
        	</ul>
        	<ul class="nav nav-sidebar">
        		<li><a href="">Nav item again</a></li>
        		<li><a href="">One more nav</a></li>
        		<li><a href="{{{ action('HomeController@logout') }}}">Logout</a></li>
        	</ul>
		</div>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Dashboard</h1>

			<h3 class="sub-header">users</h3>
			<table class="table table-responsive">
				<thead>
        		    <tr>
        		       	<th>Id</th>
        		       	<th>First Name</th>
        		       	<th>Last Name</th>
        		       	<th>Email</th>
        		       	<th>Password</th>
        		       	<th>Date Created</th>
						<th>Date Updated</th>
        		    </tr>
        		</thead>
  		
				<tbody>
				@foreach ($users as $user)
       			    <tr>
						<td>{{{ $user->id }}}</td>
						<td>{{{ $user->first_name }}}</td>
						<td>{{{ $user->last_name }}}</td>
						<td>{{{ $user->email }}}</td>
						<td>{{{ $user->password }}}</td>
						<td>{{{ $user->created_at->format('l, F jS Y @ h:i:s A') }}}</td>
						<td>{{{ $user->updated_at->format('l, F jS Y @ h:i:s A') }}}</td>
						<!-- <td><a href="{{{ action('UserController@edit', $user->id) }}}">Edit</a> -->
						<td>
							{{ Form::open(array('action' => array('UserController@destroy', $user->id), 'method' => 'delete')) }}
							{{ Form::submit('Delete', array('class' => 'btnDelete')) }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


@stop

@section('bottomscript')	

<script>

 
	$('.btnDelete').on('click', function (e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this user?')) {
			$(this).parent('form').submit();
		}
	});

</script>

@stop