@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="/css/base.css">
@stop

@section('content')
<div class="container">
    <div class="row">
		<h2> Forgot your password?</h2>
		<br>
		<h4>Please enter your email address below and follow the instructions on the email we will send you shortly.</h4>
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