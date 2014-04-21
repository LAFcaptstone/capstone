@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="/css/base.css">
@stop

@section('content')
<section class="container-fluid" id="section1">
    <div id="loginbox" style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Forgot your password?</div>
            </div>    

        	<div style="padding-top:15px" class="panel-body">
        		<p>Please enter your email address below</p> 
        		<p>Then, follow the instructions in the email you recieve from Vind it.</p>
                <form action="{{ action('RemindersController@postRemind') }}" method="POST">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="email" name="email" placeholder="Email address" class='form-control'>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    	<div class="col-sm-offset-4 col-sm-2">
    						<input type="submit" value="Reset Password" class='btn btn-primary'>
                        </div>
                    </div>
                </form>
        	</div>                    
        </div>  
    </div>
</section>

@stop