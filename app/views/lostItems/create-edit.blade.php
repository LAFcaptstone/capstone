@extends('layouts.master')

@section('content')

@if (empty($lostItems->id))

<div class="row">
    <div class="col-sm-12">
		<h1 style="margin-left:120px;">Post Lost Item</h1>
	</div>
</div>

	{{ Form::open(array('action' => 'LostItemsController@store', 'files' => true, 'class' => 'form-horizontal')) }}
		
@else

<div class="row">
    <div class="col-sm-12">
		<h1 class="blog-title">Edit Post</h1>
	</div>
</div>

	{{ Form::model($lostItems, array('action' => array('LostItemsController@update', $lostItems->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}

@endif
		<div class="form-group">
		    {{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-10">
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
		    <div class="col-sm-4">
				{{ Form::text('location', null, array('class' => 'form-control', 'placeholder' => 'Zip Code')) }}
		    	{{ $errors->has('location') ? $errors->first('location', '<p><span class="help-block">:message</span></p>') : " " }}
		    </div>
		    {{ Form::label('reward', 'Reward', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-4">
				{{ Form::text('reward', null, array('class' => 'form-control', 'placeholder' => 'Optional')) }}
		    	{{ $errors->has('reward') ? $errors->first('reward', '<p><span class="help-block">:message</span></p>') : " " }}
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
		    <div class="col-sm-offset-2 col-sm-2">
    			Upload Image: {{ Form::file('image') }}
				<br>
		      	<button type="submit" class="btn btn-success">Submit</button>
		      	{{ Form::close() }}
		      	@if(Auth::check() && Auth::user()->is_admin == 1)
		      	<a href="{{{ action('HomeController@showLostItemsDashboard') }}}" style='text-decoration:none;color:#FFF' class='btn btn-primary'>Cancel</a>
		      	@elseif(Auth::check() && Auth::user()->is_admin == 2)
		      	<a href="{{{ action('UserController@show', Auth::user()->id) }}}" style='text-decoration:none;color:#FFF' class='btn btn-primary'>Cancel</a>
		   		@else
		   		<a href="{{{action('LostItemsController@index') }}}" style='text-decoration:none;color:#FFF' class='btn btn-primary'>Cancel</a>
 				@endif
 			</div>	   
		    
		    @if (!empty($foundItems->id))
		    	<div class="col-sm-offset-2 col-sm-2">
		    		{{ Form::open(array('action' => array('LostItemsController@destroy', $lostItems->id), 'method' => 'delete')) }}
					{{ Form::submit('Delete', array('class' => 'btnDelete btn btn-danger')) }}
					{{ Form::close() }}
				</div>
			@endif
		</div>

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