@extends('layouts.master')

@section('content')

<div class='row'>
	<div class='col-sm-8 col-sm-offset-2'>
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
<p><a href="{{{action('FoundItemsController@index') }}}">Return to List</a></p>
    

@stop

