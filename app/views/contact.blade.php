@extends('layouts.master')

@section('content')

<section class="container-fluid" id="section1">
	<div class='container'>
	  <h1 class="text-center">Send us a Message</h1>
	  <div class="row">
	    	<div class='col-md-10 col-md-offset-1' id='style'>
			{{ Form::open(array('action' => 'MessagesController@store', 'role' =>'form')) }}
			<div class='form-group'>
				{{Form::label('email', 'Your E-mail Address')}}
				<input type="email" class="form-control" id="email" name='email'>
			</div>
			<div class='form-group'>
				{{ Form::label('title', 'Title', array('style' => 'display:block')) }}
				<input type="text" class="form-control" id="title" name='title'>
				{{ $errors->first('title', '<span class="help-block danger" style="color:red;">:message</span>') }}
			</div>
			<div class='form-group'>
				{{ Form::label('body', 'Body', array('style' => 'display:block')) }}
				{{ Form::textarea('body', null, array('class' => 'form-control'))}}
				{{ $errors->first('body', '<span class="help-block" style="color:red;">:message</span>') }}
			</div>
			<button  class="btn btn-success" type="submit" value="submit" title='Submit Post'><p> Submit </p></button>
			{{ Form::close() }}
			</div>
	  </div>
	</div>
</section>
@stop