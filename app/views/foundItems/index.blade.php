@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/index.css">
@stop

@section('content')
<section class="page container" id="section1">
    <h3 class="text-center v-center1">What's been found...</h3>
    <hr>
    <div class="row">
    @foreach ($foundItems as $foundItem)
        <div class="col-md-3 work text-center">
            @if (!is_null($foundItem->image_path))
            	<a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><img src="{{ $foundItem->image_path }}" alt="" style="width:200px;height:150px"></a>
            @else
            	<a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><img src="/img/vind.jpeg" alt="" style="width:200px;height:150px"></a>
            @endif
                <a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><h3 class="title">{{{ $foundItem->title }}}</h3></a>
                <h4><small style="font-family:courier,'new courier';" class="text-muted">{{{ $foundItem->created_at->format('D | M | j | y | h:i a') }}}</small></h4>
                <h4><span class="label label-default">Location: {{{ $foundItem->location }}}</span></h4>
        </div>
    @endforeach
    </div>

    {{ $foundItems->appends(array('search' => Input::get('search')))->links() }}
</section>


@stop

