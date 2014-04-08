@extends('layouts.master')

@section('content')
<h1>{{{ $lostItem->title }}}</h1>
<p> {{ $lostItem->body }}</p>
<p> {{ $lostItem->location }}</p>
<img src="{{{ $lostItem->image_path }}}">

<hr>
<p><a href="mailto:support@findit.us?Subject=Hello%20again" target="_top" id="btnNotify">Notify</a></p>		
<p><a href="{{{action('LostItemsController@index') }}}">Return to List</a></p>
    


@stop

