@extends('layouts.master')

@section('content')

    {{ Form::open(array('action' => 'HomeController@doSignup', 'class' => 'form-signup')) }}
    <div class="form-group">
		    {{ Form::label('first_name', 'First Name', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-10">
				{{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
		    	{{ $errors->has('first_name') ? $errors->first('first_name', '<p><span class="help-block">:message</span></p>') : " " }}
		    </div>
		</div>

		<div class="form-group">
		    {{ Form::label('last_name', 'Last Name', array('class' => 'col-sm-2 control-label')) }}
		    <div class="col-sm-10">
				{{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
		    	{{ $errors->has('last_name') ? $errors->first('last_name', '<p><span class="help-block">:message</span></p>') : " " }}
		    </div>
		</div>

		<div class="form-group">
		  	{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
		  	<div class="col-sm-10">		
		  		{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
		  		{{ $errors->has('email') ? $errors->first('email', '<p><span class="help-block">:message</span></p>') : " " }}
		  	</div>
		</div>

		<div class="form-group">
		  	{{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) }}
		  	<div class="col-sm-10">		
		  		{{ Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'Password')) }}
		    	{{ $errors->has('password') ? $errors->first('password', '<p><span class="help-block">:message</span></p>') : " " }}
		  	</div>
		</div>
		
		<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
				<br>
		      	<button type="submit" class="btn btn-default">Submit</button>
		      	<!-- <a href="{{{action('HomeController@doSignup') }}}">Cancel</a> -->
		    </div>
		</div>

	{{ Form::close() }}