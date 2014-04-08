@extends('layouts.master')

@section('content')
<div class="container">
	<h1 style="margin-left:120px;">Post Lost Item</h1>

	{{ Form::open(array('action' => 'LostItemsController@store', 'files' => true, 'class' => 'form-horizontal')) }}
		<div class="form-group">
		    {{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-10">
				{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
		    	{{ $errors->has('email') ? $errors->first('email', '<p><span class="help-block">:message</span></p>') : " " }}
		    </div>
		    {{ Form::label('location', 'Zip Code', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-10">
				{{ Form::text('location', null, array('class' => 'form-control', 'placeholder' => 'Zip Code')) }}
		    	{{ $errors->has('location') ? $errors->first('location', '<p><span class="help-block">:message</span></p>') : " " }}
		    </div>
		</div>
		<div class="form-group">
		  	{{ Form::label('title', 'Title', array('class' => 'col-sm-2 control-label')) }}
		  	<div class="col-sm-10">		
		  		{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) }}
		  		{{ $errors->has('title') ? $errors->first('title', '<p><span class="help-block">:message</span></p>') : " " }}
		  	</div>
		</div>
		<div class="form-group">
		  	{{ Form::label('body', 'Body', array('class' => 'col-sm-2 control-label')) }}
		  	<div class="col-sm-10">		{{ Form::textarea('body', null, array('class' => 'form-control', 'row' => '5')) }}
		    	{{ $errors->has('body') ? $errors->first('body', '<p><span class="help-block">:message</span></p>') : " " }}
		  	</div>
		</div>
		<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
    			{{ Form::file('image') }}
				<br>
		      	<button type="submit" class="btn btn-default">Submit</button>
		    </div>
		</div>
	{{ Form::close() }}
</div>
	
@stop