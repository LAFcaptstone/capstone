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
        	 	<li class="active"><a href="{{{action('HomeController@showLostItemsDashboard') }}}">Lost Items</a></li>
        	 	<li><a href="{{{action('HomeController@showUsersDashboard') }}}">Users</a></li>
        		<li><a href="{{{action('HomeController@showMessagesDashboard') }}}">Messages</a></li>
        		<li><a href="{{{ action('HomeController@logout') }}}">Logout</a></li>
        	</ul>
		</div> <!-- sidebar -->

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Dashboard</h1>

			<h3>Lost Items Posts</h3>
			<table class="table table-responsive">
				<thead>
	    	        <tr>
	    	        	<th>Flag Count</th>
	    	           	<th>Id</th>
	    	           	<th>Title</th>
	    	           	<th>Location</th>
	    	           	<th>Email</th>
	    	           	<th>Image</th>
	    	           	<th>Reward</th>
	    	           	<th>Date Created</th>
						<th>Date Updated</th>
	    	        </tr>
	    	    </thead>
	  	
				<tbody>
				@foreach ($lostItems as $lostItem) 
	    	   	    <tr>
	    	   	    	@if ($lostItem->flag_count > 0)
	  	    	   			<td class="flag" style="color:#F00"><span class="glyphicon glyphicon-flag"></span>  {{{ $lostItem->flag_count }}}</td>
						@else
							<td class="flag"><span class="glyphicon glyphicon-flag"></span>  {{{ $lostItem->flag_count }}}</td>
						@endif
						<td>{{{ $lostItem->id }}}</td>
						<td>{{{ $lostItem->title }}}</td>
						<td>{{{ $lostItem->location }}}</td>
						<td>{{{ $lostItem->email }}}</td>
						<td>{{{ $lostItem->image_path }}}</td>
						<td>{{{ $lostItem->reward }}}</td>
						<td>{{{ $lostItem->created_at->format('l, F jS Y @ h:i:s A') }}}</td>
						<td>{{{ $lostItem->updated_at->format('l, F jS Y @ h:i:s A') }}}</td>
						<td><a href="{{{ action('LostItemsController@edit', $lostItem->id) }}}">Edit</a>
						<td>
							{{ Form::open(array('action' => array('LostItemsController@destroy', $lostItem->id), 'method' => 'delete')) }}
							{{ Form::submit('Delete', array('class' => 'btnDelete')) }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{ $lostItems->links() }}
		</div>
	</div><!-- row -->
</div>


@stop

@section('bottomscript')	

<script>

 
	$('.btnDelete').on('click', function (e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this post?')) {
			$(this).parent('form').submit();
		}
	});

</script>

@stop