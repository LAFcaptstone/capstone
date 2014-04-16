@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        	<ul class="nav nav-sidebar">
        	 	<li><a href="{{{action('HomeController@showFoundItemsDashboard') }}}">Found Items</a></li>
        	 	<li><a href="{{{action('HomeController@showLostItemsDashboard') }}}">Lost Items</a></li>
        	 	<li><a href="{{{action('HomeController@showUsersDashboard') }}}">Users</a></li>
        		<li class="active"><a href="{{{action('HomeController@showMessagesDashboard') }}}">Messages</a></li>
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
        		<li><a href="">Another nav item</a></li>
        	</ul>
		</div> <!-- sidebar -->

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Dashboard</h1>

			<h3>Messages</h3>
			<table class="table table-responsive">
				<thead>
	    	        <tr>
	    	           	<th>Id</th>
	    	           	<th>Title</th>
	    	           	<th>Body</th>
	    	           	<th>Email</th>
	    	           	<th>Date Created</th>
						<th>Date Updated</th>
	    	        </tr>
	    	    </thead>
	  	
				<tbody>
				@foreach ($messages as $message) 
	    	   	    <tr>
						<td>{{{ $message->id }}}</td>
						<td>{{{ $message->title }}}</td>
						<td>{{{ $message->body }}}</td>
						<td>{{{ $message->email }}}</td>
						<td>{{{ $message->created_at->format('l, F jS Y @ h:i:s A') }}}</td>
						<td>{{{ $message->updated_at->format('l, F jS Y @ h:i:s A') }}}</td>
						<!-- <td> -->
							<!-- {{ Form::open(array('action' => array('MessagesController@destroy', $message->id), 'method' => 'delete')) }} -->
							<!-- {{ Form::submit('Delete', array('class' => 'btnDelete')) }} -->
							<!-- {{ Form::close() }} -->
						<!-- </td> -->
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div><!-- row -->
</div>


@stop

@section('bottomscript')	

<script>

 
	// $('.btnDelete').on('click', function (e) {
		// e.preventDefault();
		// if (confirm('Are you sure you want to delete this post?')) {
			// $(this).parent('form').submit();
		// }
	// });

</script>

@stop