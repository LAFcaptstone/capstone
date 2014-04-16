@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/index.css">
@stop

@section('content')

<div class="portfolio">
    <div class="portfolio-title">
        <h1>Whats been lost...</h1>
    </div>
    <div class="row">
    @foreach ($lostItems as $lostItem)
        <div class="col-md-3">
        @if (!is_null($lostItem->image_path))
            <a href="{{{ action('LostItemsController@show', $lostItem->id) }}}"><img src="{{ $lostItem->image_path }}" alt="" style="width:200px;height:150px"></a>
            @else
            <a href="{{{ action('LostItemsController@show', $lostItem->id) }}}"><img src="/img/vind.jpeg" alt="" style="width:200px;height:150px"></a>
            @endif
            <a href="{{{ action('LostItemsController@show', $lostItem->id) }}}"><h3>{{{ $lostItem->title }}}</h3></a>
            <div class="icon-awesome">
                <h4><small style="font-family:courier,'new courier';" class="text-muted">{{{ $lostItem->created_at->format('l, F jS Y @ h:i:s A') }}}</small></h4>
                <h4><span class="label label-default">Location: {{{ $lostItem->location }}}</span></h4>
            </div>
        </div>
    @endforeach
    </div>

    {{ $lostItems->appends(array('search' => Input::get('search')))->links() }}
</div>


@stop

