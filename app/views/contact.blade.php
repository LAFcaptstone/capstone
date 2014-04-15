@extends('layouts.master')

@section('content')
<div class='container'>
		<div class="sect-border"></div>

       	<h3 class="subhead">Send us a Message</h3>
      	<div class='row'>
		<div class='col-md-10 col-md-offset-1' id='style'>
		{{ Form::open(array('action' => 'MessagesController@store', 'role' =>'form')) }}
		<div class='form-group'>
			{{Form::label('email', 'E-mail')}}
			<input type="email" class="form-control" id="email" name='email' placeholder="E-mail">
		</div>
		<div class='form-group'>
			{{ Form::label('title', 'Title', array('style' => 'display:block')) }}
			<input type="text" class="form-control" id="title" name='title' placeholder="Subject">
			{{ $errors->first('title', '<span class="help-block danger" style="color:red;">:message</span>') }}
		</div>
		<div class='form-group'>
			{{ Form::label('body', 'Body', array('style' => 'display:block')) }}
			{{ Form::textarea('body', null, array('class' => 'form-control'))}}
			{{ $errors->first('body', '<span class="help-block" style="color:red;">:message</span>') }}
		</div>
		<button style="display:block" class="btn btn-success" type="submit" value="submit" title='Submit Post'><span class='glyphicon glyphicon-pencil'></span>
		{{ Form::close() }}
		</div>
		</div>
		<div class="sect-border"></div>
</div>
@stop