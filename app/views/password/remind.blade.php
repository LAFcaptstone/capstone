@extends('layouts.master')

@section('topscript')
<div class="container-fluid">
    <div class="row">
		<h2> Forgot your password?</h2>
		<br>
		<p>Please enter your email address below and follow the instructions on the email we will send you shortly.</p>
	</div>

	<div class="row">	
		<form action="{{ action('RemindersController@postRemind') }}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    <input type="email" name="email" placeholder="Email address">
		    <input type="submit" value="Reset Password">
		</form>
		<br>
	</div>

@stop