@extends('layouts.master')

@section('topscript')
<link href='css/listview.css' rel='stylesheet'>
@stop


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
    {{ Form::open(array('action' => array('FoundItemsController@index'), 'method' => 'GET', 'class' => 'navbar-form navbar-left')) }}
    <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
    </div>
        <button type="submit" class="btn btn-default">Submit</button>
    {{ Form::close() }} 
      <ul class="nav navbar-right navbar-nav">
        <li>
          <a href="{{{ action('FoundItemsController@create') }}}">Create New Post</a>
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


<div class="container">
  <div class="row">
    
    <div class="col-md-12"> 
      
      <div class="panel">
        <div class="panel-body">
          
          
          <h1 style='margin-bottom:75px; margin-top:30px;'>Whats been lost...</h1>
          <!--/stories-->
          @foreach ($lostItems as $lostItem)
          <div class="row">    
            <br>
            <div class="col-md-2 col-sm-3 text-center">
            @if (!is_null($lostItem->image_path)) 
              <a class="story-title" href="{{{ action('LostItemsController@show', $lostItem->id) }}}"><img alt="Post specific image" src="{{ $lostItem->image_path }}" style="width:100px;height:100px" class="img-circle"></a>
            @endif
            </div>
            <div class="col-md-10 col-sm-9">
              <a href="{{{ action('LostItemsController@show', $lostItem->id) }}}"><h3>{{{ $lostItem->title }}}</h3></a>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default">Location: {{{ $lostItem->location }}}</span></h4><h4>
                  <small style="font-family:courier,'new courier';" class="text-muted">Posted at: {{{ $lostItem->created_at }}}</small>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
              <br><br>
            </div>
          </div>
          <hr>
          <hr>
          @endforeach
          <!--/stories-->
          
          
          {{ $lostItems->appends(array('search' => Input::get('search')))->links() }}
        
          
        </div>
      </div>
                                                                                       
                                                    
                                                      
    </div><!--/col-12-->
  </div>
</div>

@stop