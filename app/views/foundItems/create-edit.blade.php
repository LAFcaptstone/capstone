@extends('layouts.master')

@section('content')

@if (empty($foundItem->id))

<div class="row">
    <div class="col-sm-12">
		<h1 style="margin-left:120px;">Post Found Item</h1>
	</div>
</div>

	{{ Form::open(array('action' => 'FoundItemsController@store', 'files' => true, 'class' => 'form-horizontal')) }}
		
@else

<div class="row">
    <div class="col-sm-12">
		<h1 class="blog-title">Edit Post</h1>
	</div>
</div>

	{{ Form::model($foundItem, array('action' => array('FoundItemsController@update', $foundItem->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}

@endif
		<div class="form-group">
		    {{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-10">
		    	@if (Auth::check())
		    	<span class='form-control'> {{{ Auth::user()->email }}}</span>
		    	@else
				{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
		    	{{ $errors->has('email') ? $errors->first('email', '<p><span class="help-block">:message</span></p>') : " " }}
				@endif		    
		    </div>
		</div>

		<div class="form-group">
		    {{ Form::label('location', 'Location', array('class' => 'col-sm-2 control-label')) }}
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
		      	<button type="submit" class="btn btn-success">Submit</button>
		      	{{ Form::close() }}
		      	@if(Auth::check() && Auth::user()->is_admin == 1)
		      	<a href="{{{ action('UserController@show', Auth::user()->id) }}}" style='text-decoration:none;color:#FFF'><button class='btn btn-primary'>Cancel</a>
		      	@elseif(Auth::check() && Auth::user()->is_admin == 2)
		      	<a href="{{{ action('UserController@show', Auth::user()->id) }}}" style='text-decoration:none;color:#FFF'><button class='btn btn-primary'>Cancel</a>
		   		@else
		   		<a href="{{{action('FoundItemsController@index') }}}" style='text-decoration:none;color:#FFF'><button class='btn btn-primary'>Cancel</a>
 				@endif	
		    </div>
 			<div class="col-sm-offset-2 col-sm-10">
 				{{ Form::open(array('action' => array('FoundItemsController@destroy', $foundItem->id), 'method' => 'delete')) }}
				{{ Form::submit('Delete', array('class' => 'btnDelete btn btn-danger')) }}
				{{ Form::close() }} 
			</div> 
		</div>

	{{ Form::close() }}
	
@stop

@section('bottomscript')	

<script>
 
	$('.btnDelete').on('click', function (e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this post?')) {
			$(this).parent('form').submit();
		}
	});

</script>

@stop