@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/index.css">
@stop

@section('content')
<section class="page container" id="section1">
    <h3 class="text-center v-center1">What's been lost...</h3>
    <hr>
    <div class="row">
    @foreach ($lostItems as $lostItem)
    	<div class="col-md-3 work text-center">
    	    @if (!is_null($lostItem->image_path))
    	    	<a href="{{{ action('LostItemsController@show', $lostItem->id) }}}"><img src="{{ $lostItem->image_path }}" alt="" style="width:200px;height:150px"></a>
    	    @else
    	    	<a href="{{{ action('LostItemsController@show', $lostItem->id) }}}"><img src="/img/vind.jpeg" alt="" style="width:200px;height:150px">
    	    @endif
    	    	<a href="{{{ action('LostItemsController@show', $lostItem->id) }}}"><h3 class="title">{{{ $lostItem->title }}}</h3></a>
    	        <h4><small style="font-family:courier,'new courier';" class="text-muted">{{{ $lostItem->created_at->format('D | M | j | y | h:i a') }}}</small></h4>
    	        <h4>
    	        	<span class="label label-default">Location: {{{ $lostItem->location }}}</span>
    	        	@if (!empty($lostItem->reward))
    	        		<span class="numberCircle">{{{ $lostItem->reward }}}</span>
    	        	@endif
    			</h4>
    	</div>
    @endforeach
    </div>

    {{ $lostItems->appends(array('search' => Input::get('search')))->links() }}
</section>


@stop

