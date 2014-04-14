@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    
    <div class="col-md-12"> 
      
      <div class="panel">
        <div class="panel-body">
          
          
          <h3 style='margin-bottom:25px; margin-top:10px;'>Whats been found...</h3>
          <!--/stories-->
          @foreach ($foundItems as $foundItem)
          <div class="row">    
            <br>
            <div class="col-md-2 col-sm-3 text-center">
            @if (!is_null($foundItem->image_path)) 
              <a class="story-title" href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><img alt="Post specific image" src="{{ $foundItem->image_path }}" style="width:100px;height:100px" class="img-circle"></a>
            @endif
            </div>
            <div class="col-md-10 col-sm-9">
              <a href="{{{ action('FoundItemsController@show', $foundItem->id) }}}"><h3>{{{ $foundItem->title }}}</h3></a>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default">Location: {{{ $foundItem->location }}}</span></h4><h4>
                  <small style="font-family:courier,'new courier';" class="text-muted">Posted at: {{{ $foundItem->created_at }}}</small>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
              <br><br>
            </div>
          </div>
          <hr>
          @endforeach
          <!--/stories-->
          
          
          {{ $foundItems->appends(array('search' => Input::get('search')))->links() }}
        
          
        </div>
      </div>
                                                                                       
                                                    
                                                      
    </div><!--/col-12-->
  </div>
</div>

@stop