@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="/css/index.css">
@stop

@section('content')

@if (empty($foundItems->id))

<section class="page container" id="section1">
	<div class="row">
	    <div class="col-sm-12">
			<h1 class="blog-title">Post Found Item</h1>
		</div>
	</div>
	
		{{ Form::open(array('action' => 'FoundItemsController@store', 'files' => true, 'class' => 'form-horizontal')) }}
			
	@else
	
<section class="page container" id="section1">
	<div class="row">
	    <div class="col-sm-12">
			<h1 class="blog-title">Edit Post</h1>
		</div>
	</div>
	
		{{ Form::model($foundItems, array('action' => array('FoundItemsController@update', $foundItems->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}
	
	@endif
		<div class="form-group">
		    {{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-3">
		    	@if (Auth::check())
		    	{{ Form::email('email', Auth::user()->email, array('class' => 'form-control')) }}
		    	@else
				{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
		    	{{ $errors->has('email') ? $errors->first('email', '<p><span class="help-block">:message</span></p>') : " " }}
				@endif		    
		    </div>
		</div>

		<div class="form-group">
		    {{ Form::label('location', 'Zip Code', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-3">
				{{ Form::text('location', null, array('class' => 'form-control', 'placeholder' => 'Zip Code')) }}
		    	{{ $errors->has('location') ? $errors->first('location', '<p><span class="help-block">:message</span></p>') : " " }}
		    </div>
		</div>

		<div class="form-group">
		  	{{ Form::label('title', 'Title', array('class' => 'col-sm-2 control-label')) }}
		  	<div class="col-sm-7">		
		  		{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) }}
		  		{{ $errors->has('title') ? $errors->first('title', '<p><span class="help-block">:message</span></p>') : " " }}
		  	</div>
		</div>

		<div class="form-group">
		  	{{ Form::label('body', 'Body', array('class' => 'col-sm-2 control-label')) }}
		  	<div class="col-sm-7">		{{ Form::textarea('body', null, array('class' => 'form-control', 'row' => '5')) }}
		    	{{ $errors->has('body') ? $errors->first('body', '<p><span class="help-block">:message</span></p>') : " " }}
		  	</div>
		</div>
		
		<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-3">
	    		Upload Image: {{ Form::file('image') }}
				<br>
				<div class="col-sm-3">
		    	  	<button type="submit" class="btn btn-success">Submit</button>
		    	  	{{ Form::close() }}
		    	</div>
		    	<div class="col-sm-offset-1 col-sm-3">
		    	  	@if(Auth::check() && Auth::user()->is_admin == 1)
		    	  		<a href="{{{ action('HomeController@showFoundItemsDashboard') }}}" style='text-decoration:none;color:#FFF' class='btn btn-primary'>Cancel</a>
		    	  	@elseif(Auth::check() && Auth::user()->is_admin == 2)
		    	  		<a href="{{{ action('UserController@show', Auth::user()->id) }}}" style='text-decoration:none;color:#FFF' class='btn btn-primary'>Cancel</a>
		   			@else
		   				<a href="{{{action('FoundItemsController@index') }}}" style='text-decoration:none;color:#FFF' class='btn btn-primary'>Cancel</a>
	 				@endif	
	 			</div>
		    	<div class="col-sm-offset-1 col-sm-3">
		    		@if (!empty($foundItems->id))
	 					{{ Form::open(array('action' => array('FoundItemsController@destroy', $foundItems->id), 'method' => 'delete')) }}
						{{ Form::submit('Delete', array('class' => 'btnDelete btn btn-danger')) }}
						{{ Form::close() }} 			
					@endif
				</div>
			</div>
		</div>
</section>
		
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