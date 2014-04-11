@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <h1>Found items</h1>
    </div>
</div><!-- /.row -->

<div class="row">
 
    {{ Form::open(array('action' => array('FoundItemsController@index'), 'method' => 'GET')) }}
    {{ Form::label('search', 'Search Found Items') }}
    {{ Form::text('search') }}
    {{ Form::submit('Search', array('class'=> 'btn btn-default')) }}
    {{ Form::close() }}

    <a href="{{{ action('FoundItemsController@create') }}}">Post Found Item</a>
    <hr>
    
</div><!-- /.row -->

<div class="row">
    @foreach ($foundItems as $foundItem)

        <h2><a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}">{{{ $foundItem->title }}}</a></h2>
            
        @if (!is_null($foundItem->image_path)) 
            <p><img src="{{{ $foundItem->image_path }}}"></p>
        @endif

        <p>{{{ $foundItem->created_at->format('l, F jS Y @ h:i:s A') }}}</p>
        <br>
        <hr>

    @endforeach

    {{ $foundItems->appends(array('search' => Input::get('search')))->links() }}
		  
</div><!-- /.row -->

@stop