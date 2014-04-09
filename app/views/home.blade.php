@extends('layouts.master')

@section('content')

		<div class="row ">
			<a href="{{{ action('LostItemsController@index')}}}"><div class=" col-md-6 col-md-offset-5 bttn1">
				<p class="text1">I FOUND IT!</p>
			</div></a>
		</div>
		<div class="row">
			<a href="{{{ action('FoundItemsController@index')}}}"><div class="col-md-6 col-md-offset-5 bttn2">
				 <p class="text1">I LOST IT!</p>
			</div></a>
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
