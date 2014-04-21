@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/index.css">
@stop

@section('content')
<<<<<<< HEAD
<section class="page container" id="section1">
=======
<section class="page container1" id="section1">
>>>>>>> FETCH_HEAD
    <h3 class="text-center v-center1">What's been found...</h3>
    <hr>
    <div class="row">
    @foreach ($foundItems as $foundItem)
        <div class="col-md-3 work text-center">
            @if (!is_null($foundItem->image_path))
            	<a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><img src="{{ $foundItem->image_path }}" alt="" style="width:150px;height:150px; margin-top:15px;"></a>
            @else
            	<a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><img src="/img/default.png" alt="" style="width:150px;height:150px; margin-top:15px;"></a>
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

