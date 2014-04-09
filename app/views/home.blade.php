@extends('layouts.master')

@section('content')
	{{{var_dump($_POST)}}}
		<div class="row ">
			<a href="{{{ action('FoundItemsController@create')}}}"><div class=" col-md-6 col-md-offset-5 bttn1">
				<p class="text1">FOUND IT!</p>
			</div></a>
		</div>
		<div class="row">
			<a href="{{{ action('LostItemsController@create')}}}"><div class="col-md-6 col-md-offset-5 bttn2">
				 <p class="text1">LOST IT!</p>
			</div></a>
		</div>
		<div class="row">
			<a href="#" id='lookup'><div class="col-md-6 col-md-offset-5 bttn3">
				 <p class="text2">BROWSE!</p>
			</div></a>
		</div>
		<div class="row" id='browse' name='browse' style='display:none;'>
			<div class="col-md-6 col-md-offset-5 bttn4">
				{{ Form::open(array('action' => 'HomeController@showIndex')) }}
				{{ Form::select('dataset', array('F' => 'Found Items', 'L' => 'Lost Items'), 'F', array('class' => 'form-control')) }}
				{{ Form::submit('Click Me!', array('class' => 'form-control')) }}
				{{ Form::close() }}
			</div>
		</div>
  </body>

@stop

@section('bottomscript')
  <script>
  $('#lookup').click(function (e){
	e.preventDefault();
	$('#browse').show();
  });
  </script>
@stop
