@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <h1>Lost items</h1>
    </div>
</div><!-- /.row -->

<div class="row">
  
    {{ Form::open(array('action' => array('LostItemsController@index'), 'method' => 'GET')) }}
    {{ Form::label('search', 'Search Lost Items') }}
    {{ Form::text('search') }}
    {{ Form::submit('Search', array('class'=> 'btn btn-default')) }}
    {{ Form::close() }}

    <a href="{{{ action('LostItemsController@create') }}}">Post Lost Item</a>
    <hr>

</div><!-- /.row -->

<div class="row">
    @foreach ($lostItems as $lostItem)

        <h2><a href="{{{ action('LostItemsController@show', $lostItem->id) }}}">{{{ $lostItem->title }}}</h2>

        @if (!is_null($lostItem->image_path)) 
            <p><img src="{{{ $lostItem->image_path }}}"></p>
        @endif

        <p>{{{ $lostItem->created_at->format('l, F jS Y') }}}</p>
        <br>
        <hr>
      
    @endforeach

    {{ $lostItems->appends(array('search' => Input::get('search')))->links() }}
		  		
         
</div><!-- /.row -->

@stop