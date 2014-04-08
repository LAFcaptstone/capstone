@extends('layouts.master')

@section('content')

<div class="container">
    	<h1>Lost items</h1>
    <div class="row">
        <div>
        	<div>
          		<hr>
          		{{ Form::open(array('action' => array('LostItemsController@index'), 'method' => 'GET')) }}
          		{{ Form::close() }}

        		@foreach ($lostItems as $lostItem)
        		  <h2><a href="{{{ action('LostItemsController@show', $lostItem->id) }}}">{{{ $lostItem->title }}}</a></h2>
                  <p><img src="{{{ $lostItem->image_path }}}"></p>
        		  <p>{{{ $lostItem->created_at->format('l, F jS Y') }}}</p>
        		  <br>
        		  <hr>
        		
        		@endforeach
		  		
        		<p>
        		  <a href="{{{ action('LostItemsController@create') }}}">Post Lost Item</a>
        		</p>
          </div>
        </div>
    </div><!-- /.row -->
@stop