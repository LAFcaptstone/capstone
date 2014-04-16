@extends('layouts.master')

@section('content')




<div class="portfolio container">
    <div class="portfolio-title">
        <h3>Whats been lost...</h3>
            <p><a href="{{{action('FoundItemsController@index')}}}" class="btn btn-success btn-md">What's been found...<span class="glyphicon glyphicon-circle-arrow-right"></span></a><a href="{{{action('LostItemsController@index')}}}" class="btn btn-danger btn-md">What's been lost...<span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>

    </div>
    <div class="row">
    @foreach ($foundItems as $foundItem)
        <div class="col-md-2 col-md-offset-1 work">
        	@if (!is_null($foundItem->image_path))
            	<a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><img src="{{ $foundItem->image_path }}" alt="" class="img-responsive"></a>
            @else
            	<a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><img src="/img/vind.jpeg" alt="" class="img-responsive"></a>
            @endif
            <a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><h3>{{{ $foundItem->title }}}</h3></a>
            <div class="icon-awesome">
                <h4><small style="font-family:courier,'new courier';" class="text-muted">{{{ $foundItem->created_at->format('l, F jS Y @ h:i:s A') }}}</small></h4>
                <h4><span class="label label-default">Location: {{{ $foundItem->location }}}</span></h4>
            </div>
        </div>
    @endforeach
    </div>

    {{ $foundItems->appends(array('search' => Input::get('search')))->links() }}
</div>


@stop

