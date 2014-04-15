@extends('layouts.master')

@section('content')

<!-- NavBar -->
 <header class="navbar navbar-bright navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/" class="navbar-brand">Vind iT</a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
    {{ Form::open(array('action' => array('LostItemsController@index'), 'method' => 'GET', 'class' => 'navbar-form navbar-left')) }}
    <!-- <div class="form-group"> -->
        <!-- <input type="text" class="form-control" placeholder="Search"> -->
    <!-- </div> -->
    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
        {{ Form::text('search') }}
        {{ Form::submit('Search', array('class'=> 'btn btn-default')) }}
    {{ Form::close() }} 
      <ul class="nav navbar-right navbar-nav">
         <li>
          <a href="{{{ action('LostItemsController@create') }}}">Create New Post</a>
        </li>
        <li>
            @if(Auth::check())
            <a href="{{{ action('HomeController@logout') }}}">Log Out</a>
            @else
            <a href="{{{ action('HomeController@showLogin') }}}">Log In</a>
            @endif
        </li>
        <li>
          <a href="#">About Vind iT</a>
        </li>
        <li>
          <a href="#">Contact Us</a>
        </li>
      </ul>
    </nav>
  </div>
</header>
<!-- NavBar -->

<div class="portfolio container">
    <div class="portfolio-title">
        <h3>Whats been lost...</h3>
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

