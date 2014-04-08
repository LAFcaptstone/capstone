@extends('layouts.master')

@section('content')

<div class="container">
    	<h1>Found items</h1>
    <div class="row">
        <div>
        	<div>
          		<hr>
          		{{ Form::open(array('action' => array('FoundItemsController@index'), 'method' => 'GET')) }}
          		{{ Form::close() }}

        		@foreach ($foundItems as $foundItem)
        		  <h2><a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}">{{{ $foundItem->title }}}</a></h2>
                  <p><img src="{{{ $foundItem->image_path }}}"></p>
        		  <p>{{{ $foundItem->created_at->format('l, F jS Y') }}}</p>
        		  <br>
        		  <hr>
        		
        		@endforeach
		  		
        		<p>
        		  <a href="{{{ action('FoundItemsController@create') }}}">Post Found Item</a>
        		</p>
          </div>
        </div>
    </div><!-- /.row -->
@stop