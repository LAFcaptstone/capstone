@extends('layouts.master')

@section('topscript')

<link rel="stylesheet" type="text/css" href="/css/dashboard.css">


@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        	 	<h2 class="text-center"><a href="{{{ action('HomeController@logout') }}}">Logout</a></h2>

		<div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
        	<h1 class="page-header">Dashboard</h1>

        	<h3>User Name: {{{ Auth::user()->first_name }}}</h3>
			<table class="table table-responsive">
				<thead>
	    	        <tr>
	    	           	<th>First Name</th>
	    	           	<th>Last Name</th>
	    	           	<th>Email</th>
	    	        </tr>
	    	    </thead>
	  	


				<tbody>
				 
	    	   	    <tr>
	  	    	   		
						<td>{{{ $user->first_name }}}</td>
						<td>{{{ $user->last_name }}}</td>
						<td>{{{ $user->email }}}</td>
					</tr>
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
	
 
	$('.btnDelete').on('click', function (e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this post?')) {
			$(this).parent('form').submit();
		}
	});

</script>

@stop