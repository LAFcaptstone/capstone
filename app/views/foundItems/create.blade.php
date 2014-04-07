@extends('layouts.master')

@section('content')
<div class="container">
	<h1 style="margin-left:120px;">Post Found Item</h1>

	{{ Form::open(array('action' => 'PostsController@store', 'class' => 'form-horizontal')) }}
	  <div class="form-group">
	    {{ Form::label('title', 'Title', array('class' => 'col-sm-2 control-label')) }}
	    <div class="col-sm-10">
			{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) }}
	    	{{ $errors->has('title') ? $errors->first('title', '<p><span class="help-block">:message</span></p>') : " " }}
	    </div>
	  </div>
	  <div class="form-group">
	    {{ Form::label('body', 'Body', array('class' => 'col-sm-2 control-label')) }}
	    <div class="col-sm-10">
			{{ Form::textarea('body', null, array('class' => 'form-control', 'row' => '5')) }}
	      	{{ $errors->has('body') ? $errors->first('body', '<p><span class="help-block">:message</span></p>') : " " }}
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Create New Post</button>
	    </div>
	  </div>
	{{ Form::close() }}
</div>
	
@stop