@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        		<h2 class="text-center"><a href="{{{ action('HomeController@logout') }}}">Logout</a></h2>
        

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Dashboard</h1>

			<div class="panel panel-primary filterable">
            	<div class="panel-heading">
            	    <h1 class="panel-title">Users</h1>
            	    <div class="pull-right">
            	        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
            	    </div>
            	</div>
				<table class="table table-responsive">
					<thead>
        			    <tr class="filters">
        			       	<th><input type="text" class="form-control" placeholder="Id" disabled></th>
        			       	<th><input type="text" class="form-control" placeholder="First Name" disabled></th>
        			       	<th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
        			       	<th><input type="text" class="form-control" placeholder="Email" disabled></th>
        			       	<th><input type="text" class="form-control" placeholder="Date Created" disabled></th>
							<th><input type="text" class="form-control" placeholder="Date Updated" disabled></th>
        			    </tr>
        			</thead>
  			
					<tbody>
					@foreach ($users as $user)
       				    <tr>
							<td>{{{ $user->id }}}</td>
							<td>{{{ $user->first_name }}}</td>
							<td>{{{ $user->last_name }}}</td>
							<td>{{{ $user->email }}}</td>
							<td>{{{ $user->created_at->format('l, F jS Y @ h:i:s A') }}}</td>
							<td>{{{ $user->updated_at->format('l, F jS Y @ h:i:s A') }}}</td>
							<!-- <td><a href="{{{ action('UserController@edit', $user->id) }}}">Edit</a> -->
							<td>
								{{ Form::open(array('action' => array('UserController@destroy', $user->id), 'method' => 'delete')) }}
								{{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('class' => 'btnDelete')) }}
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				{{ $users->links() }}
			</div>
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

	// Filter pluggin
	$(document).ready(function(){
    	$('.filterable .btn-filter').click(function(){
    	    var $panel = $(this).parents('.filterable'),
    	    $filters = $panel.find('.filters input'),
    	    $tbody = $panel.find('.table tbody');
    	    if ($filters.prop('disabled') == true) {
    	        $filters.prop('disabled', false);
    	        $filters.first().focus();
    	    } else {
    	        $filters.val('').prop('disabled', true);
    	        $tbody.find('.no-result').remove();
    	        $tbody.find('tr').show();
    	    }
    	});
	
    	$('.filterable .filters input').keyup(function(e){
    	    /* Ignore tab key */
    	    var code = e.keyCode || e.which;
    	    if (code == '9') return;
    	    /* Useful DOM data and selectors */
    	    var $input = $(this),
    	    inputContent = $input.val().toLowerCase(),
    	    $panel = $input.parents('.filterable'),
    	    column = $panel.find('.filters th').index($input.parents('th')),
    	    $table = $panel.find('.table'),
    	    $rows = $table.find('tbody tr');
    	    /* Dirtiest filter function ever ;) */
    	    var $filteredRows = $rows.filter(function(){
    	        var value = $(this).find('td').eq(column).text().toLowerCase();
    	        return value.indexOf(inputContent) === -1;
    	    });
    	    /* Clean previous no-result if exist */
    	    $table.find('tbody .no-result').remove();
    	    /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
    	    $rows.show();
    	    $filteredRows.hide();
    	    /* Prepend no-result row if all rows are filtered */
    	    if ($filteredRows.length === $rows.length) {
    	        $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
    	    }
    	});
	});

</script>

@stop