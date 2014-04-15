@extends('layouts.master')

@section('topscript')
<link href='css/listview.css' rel='stylesheet'>
@stop


@section('content')




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