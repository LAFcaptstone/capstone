@extends('layouts.master')

@section('content')

	<div class="container-full">
		<div class="row"> 
			<div class="col-lg-12 text-center v-center">
				<h2 class='lead'>Vind iT</h2>
				<br>
			</div>
			<div class="col-lg-12">
				<a href="{{{ action('LostItemsController@index')}}}" class="button center-block">
					I Lost A...
				</a>
				<a href="{{{ action('FoundItemsController@index')}}}" class="button center-block">
					I Found A...
				</a>
			</div>	
		</div> <!-- /row -->
		
		<br><br>

		<div class="row">
	        <div class="col-lg-12 text-center v-center" style="font-size:39pt;">
	          <a href="#"><i class="icon-facebook"></i></a>  
	          <a href="#"><i class="icon-twitter"></i></a> 
	          <a href="#"><i class="icon-github"></i></a>
	        </div>
      </div>
	</div> <!-- /container full -->

	<div class="container">
		<hr>
		<div class="row">
				<div class="col-md-4">
					<a href=''><button class="btn btncolor text-center" style='width:375px; color:#FFF;'>About Vind iT</button></a>
				</div>
				<!-- Login Button -->
				<div class="col-md-4">
					@if(Auth::check())
					<a href="{{{ action('HomeController@logout') }}}"><button class="btn btncolor text-center" style='width:375px; color:#FFF;'>Log Out</button></a>
					@else
					<a href="{{{ action('HomeController@showLogin') }}}"><button class="btn btncolor text-center" style='width:375px; color:#FFF;'>Log In</button></a>
					@endif
				</div>
				<div class="col-md-4">	
					<a href=''><button class="btn btncolor text-center" style='width:375px; color:#FFF;'>Contact Us</button></a>
				</div>
				
		</div>
        			
@stop
