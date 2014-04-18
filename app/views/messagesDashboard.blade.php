@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
@stop

@section('content')
<style type="text/css">

.modal-body {
	width: auto;
  	overflow-y: auto; 
}

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        	<ul class="nav nav-sidebar">
        	 	<li><a href="{{{action('HomeController@showFoundItemsDashboard') }}}">Found Items</a></li>
        	 	<li><a href="{{{action('HomeController@showLostItemsDashboard') }}}">Lost Items</a></li>
        	 	<li><a href="{{{action('HomeController@showUsersDashboard') }}}">Users</a></li>
        		<li class="active"><a href="{{{action('HomeController@showMessagesDashboard') }}}">Messages</a></li>
        		<li><a href="{{{ action('HomeController@logout') }}}">Logout</a></li>
        	</ul>
		</div> <!-- sidebar -->

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<h1 class="page-header">Dashboard</h1>

			<div class="panel panel-primary filterable">
            	<div class="panel-heading">
            	    <h1 class="panel-title">Messages</h1>
            	    <div class="pull-right">
            	        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
            	    </div>
            	</div>

				<table class="table table-responsive">
					<thead>
	    		        <tr class="filters">
	    		           	<th><input type="text" class="form-control" placeholder="Title" disabled></th>
	    		           	<th><input type="text" class="form-control" placeholder="Email" disabled></th>
	    		           	<th><input type="text" class="form-control" placeholder="Date" disabled></th>
	    		        </tr>
	    		    </thead>
	  		
					<tbody>
					@foreach ($messages as $message) 
	    		   	    <tr>
							<td><a href="#" data-toggle="modal" data-target="#myModal{{{ $message->id }}}">{{{ $message->title }}}</a></td>
							<td>{{{ $message->email }}}</td>
							<td>{{{ $message->created_at->format('l, F jS Y @ h:i:s A') }}}</td>
							<td>
								{{ Form::open(array('action' => array('MessagesController@destroy', $message->id), 'method' => 'delete')) }}
								{{ Form::submit('Delete', array('class' => 'btnDelete')) }}
								{{ Form::close() }}
							</td>
						</tr>
							<!-- Modal -->
							<div class="modal fade" id="myModal{{{ $message->id }}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h4 class="modal-title" id="myModalLabel">{{{ $message->title }}}</h4>
							      </div>
							      <div class="modal-body">
							        {{{ $message->body }}}
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>
							  </div>
							</div>
					@endforeach
					</tbody>
				</table>
				{{ $messages->links() }}
			</div>	
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