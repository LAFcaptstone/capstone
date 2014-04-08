@extends('layouts.master')

@section('content')
<h1>{{{ $foundItem->title }}}</h1>
<p> {{ $foundItem->body }}</p>
<p> {{ $foundItem->location }}</p>
<img src="{{{ $foundItem->image_path }}}">

<hr>
<p><a href="mailto:support@findit.us?Subject=Hello%20again" target="_top" id="btnNotify">Notify</a></p>		
<p><a href="{{{action('FoundItemsController@index') }}}">Return to List</a></p>
    

@stop

