@extends('layouts.master')

@section('content')

<div class='row'>
	<div class='col-sm-12'>
		<h1>{{{ $foundItem->title }}}</h1>
	</div>
</div>

	<div class='row'>
		<div class='col-sm-4'>
			<h4>Description:</h4>
			<p>{{ $foundItem->body }}</p>
		</div>
		<div class='col-sm-4'>
			@if(!is_null($foundItem->image_path))
			<h4>Image:</h4>
			<img class='img-responsive' src="{{{ $foundItem->image_path }}}">
			@endif
		</div>
		<div class='col-sm-4'>
			<h4>Map:</h4>
			<div id="map-canvas"/>
		</div>
	</div>

<hr>
<p><a href="mailto:support@findit.us?Subject=Hello%20again" target="_top" id="btnNotify">Notify</a></p>	
<p>	
	<a href="{{{action('FoundItemsController@index') }}}">Return to Found Items</a> |
	{{ Form::open(array('action' => array('FoundItemsController@flag', $foundItem->id))) }}
	{{ Form::submit('Flag Post', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
</p>
<p>
	@if (Auth::check())
	@if (Auth::user()->is_admin || Auth::user()->id === $post->user_id)
	<a href="{{{ action('FoundItemsController@edit', $foundItem->id) }}}">Edit Post</a> |
	<a href="{{{ action('FoundItemsController@destroy', $foundItem->id) }}}" id="btnDeletePost">Delete Post</a>
	@endif
	@endif
</p>

{{ Form::open(array('action' => array('FoundItemsController@destroy', $foundItem->id), 'method' => 'delete', 'id' => 'deleteFormPost')) }}
{{ Form::close() }}

@stop

@section('bottomscript')	
	<script>

	$('#btnDeletePost').on('click', function (e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this post?')) {
			$('#deleteFormPost').submit();
		}
	});

	</script>

@stop


