@extends('layouts.master')

@section('content')
<h1>{{{ $post->title }}}</h1>
<p> {{ $post->body }}</p>
<p> {{ $post->location }}</p>
<img src="{{ $post->img }}">

<hr>
<p><a href="mailto:support@findit.us?Subject=Hello%20again" target="_top" id="btnNotify">Notify</a></p>		
<p><a href="{{{action('LostItemsController@index') }}}">Return to List</a></p>
    
@if (Auth::check())
@if (Auth::user()->is_admin || Auth::user()->id === $post->user_id)
<p><a href="" id="btnDeletePost">Delete Post</a></p>
<p><a href="{{{action('LostItemsController@edit', $post->id) }}}">Edit Post</a></p>
@endif
@endif
{{Form::open(array('action'=> array('PostsController@destroy', $post->id), 'method' => 'delete', 'id' => 'formDeletePost' )) }}
{{Form::close()}}

@stop

