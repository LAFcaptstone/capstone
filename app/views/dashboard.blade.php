@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
@stop

@section('content')

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
        	<a class="navbar-brand" href="#">Project name</a>
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

			<h3 class="sub-header">Found Items Posts</h3>
			<table class="table table-responsive">
				<thead>
        		    <tr>
        		       	<th>Flag</th>
        		       	<th>Id</th>
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
       			    	<td style="color:red;" id="flag"><span class="glyphicon glyphicon-flag"></span></td>
						<td>{{{ $foundItem->id }}}</td>
						<td>{{{ $foundItem->title }}}</td>
						<td>{{{ $foundItem->location }}}</td>
						<td>{{{ $foundItem->email }}}</td>
						<td>{{{ $foundItem->image_path }}}</td>
						<td>{{{ $foundItem->created_at->format('l, F jS Y') }}}</td>
						<td>{{{ $foundItem->updated_at->format('l, F jS Y') }}}</td>
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
		</div>
	</div>
</div>


@stop

@section('bottomscript')	

<script>
	// $('document').ready(function() {
		// $('#flag').hide();
        // $('#flagPost').click(function() {
            // $('#flag').hide();
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