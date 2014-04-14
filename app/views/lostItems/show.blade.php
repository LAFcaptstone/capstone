@extends('layouts.master')

@section('content')

<h1>{{{ $lostItem->title }}}</h1>
<p> {{ $lostItem->body }}</p>
<p> {{ $lostItem->location }}</p>
@if (!is_null($lostItem->image_path))
	<img src="{{{ $lostItem->image_path }}}">
@endif

<hr>
<p><a href="mailto:support@findit.us?Subject=Hello%20again" target="_top" id="btnNotify">Notify</a></p>	
<p>	
	<a href="{{{action('LostItemsController@index') }}}">Return to Lost Items</a> |
	{{ Form::open(array('action' => array('LostItemsController@flag', $lostItem->id))) }}
	{{ Form::submit('Flag Post', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
</p>
<p>
	@if (Auth::check())
	@if (Auth::user()->is_admin || Auth::user()->id === $post->user_id)
	<a href="{{{ action('LostItemsController@edit', $lostItem->id) }}}">Edit Post</a> |
	<a href="{{{ action('LostItemsController@destroy', $lostItem->id) }}}" id="btnDeletePost">Delete Post</a>
	@endif
	@endif
</p>

{{ Form::open(array('action' => array('LostItemsController@destroy', $lostItem->id), 'method' => 'delete', 'id' => 'deleteFormPost')) }}
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
