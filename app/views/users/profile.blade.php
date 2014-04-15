@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
@stop

@section('content')

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
        	<a class="navbar-brand" href="#">VindiT</a>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        	<ul class="nav nav-sidebar">
        	 	<li class="active"><a href="#">Overview</a></li>
        	 	<li><a href="#">Reports</a></li>
        	 	<li><a href="#">Analytics</a></li>
        		<li><a href="#">Export</a></li>
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
		</div>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Dashboard</h1>

        	<h3>User Name: {{{('')}}}</h3>
			<table class="table table-responsive">
				<thead>
	    	        <tr>
	    	           	<th>First Name</th>
	    	           	<th>Last Name</th>
	    	           	<th>Email</th>
	    	        </tr>
	    	    </thead>
	  	
				<tbody>
				@foreach ($lostItems as $lostItem) 
	    	   	    <tr>
	  	    	   		<td style="color:red;" class="flag"><span class="glyphicon glyphicon-flag"></span>  {{{ $lostItem->flag_count }}}</td>
						<td>{{{ $user->first_name }}}</td>
						<td>{{{ $user->last_name }}}</td>
						<td>{{{ $user->email }}}</td>
						<td><a href="{{{ action('UserController@edit', $user->id) }}}">Edit</a>
						<td>
							{{ Form::open(array('action' => array('UserController@destroy', $user->id), 'method' => 'delete')) }}
							{{ Form::submit('Delete', array('class' => 'btnDelete')) }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

			<h3 class="sub-header">Found Items Posts</h3>
			<table class="table table-responsive">
				<thead>
        		    <tr>
        		    	
        		       	<th>Title</th>
        		       	<th>Location</th>
        		       	<th>Email</th>
        		       	<th>Image</th>
        		       	<th>Date Created</th>
						<th>Date Updated</th>
        		    </tr>
        		</thead>
  		
				<tbody>
				
				@foreach ($foundItems as $foundItem)
       			    <tr>
       			    	<td style="color:red;" class="flag"><span class="glyphicon glyphicon-flag"></span>  {{{ $foundItem->flag_count }}}</td>
       			    	<td>{{{ $foundItem->title }}}</td>
						<td>{{{ $foundItem->location }}}</td>
						<td>{{{ $foundItem->email }}}</td>
						<td>{{{ $foundItem->image_path }}}</td>
						<td>{{{ $foundItem->created_at->format('l, F jS Y @ h:i:s A') }}}</td>
						<td>{{{ $foundItem->updated_at->format('l, F jS Y @ h:i:s A') }}}</td>
						<td><a href="{{{ action('FoundItemsController@edit', $foundItem->id) }}}">Edit</a>
						<td>
							{{ Form::open(array('action' => array('FoundItemsController@destroy', $foundItem->id), 'method' => 'delete')) }}
							{{ Form::submit('Delete', array('class' => 'btnDelete')) }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

			<h3>Lost Items Posts</h3>
			<table class="table table-responsive">
				<thead>
	    	        <tr>
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
	  	    	   		<td style="color:red;" class="flag"><span class="glyphicon glyphicon-flag"></span>  {{{ $lostItem->flag_count }}}</td>
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
		</div>
	</div>
</div>


@stop

@section('bottomscript')	

<script>
	// $('document').ready(function() {
		// $('.flag').hide();
      	// $('#flagPost').click(function() {
      		// $('.flag').show();
      	// });
    // });
 
	$('.btnDelete').on('click', function (e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this post?')) {
			$(this).parent('form').submit();
		}
	});

</script>

@stop