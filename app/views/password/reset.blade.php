@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="/css/base.css">
@stop

@section('content')
<section class="container-fluid" id="section1">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Reset password</div>
            </div> 

        <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form action="{{ action('RemindersController@postReset') }}" method="POST" class='form-horizontal'>  
                    <input type="hidden" name="token" value="{{ $token }}">
    				<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="email" name="email" id="email" placeholder="Confirm Email" class="form-control">                                        
                    </div>

                  	<div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="password" id="password" placeholder="New Password" class="form-control">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control">
                    </div>

                    <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    	<div class="col-sm-12 controls">
                        	<input type="submit" value="Reset Password" class="btn btn-success">
                    	</div>
                 	</div>
				</form>

				<div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                        	</div>
                        </div>
                    </div> 
        		</div>
        	</div>
    	</div>
</section>

@stop