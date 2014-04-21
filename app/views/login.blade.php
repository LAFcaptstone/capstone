@extends('layouts.master')

@section('content')
<section class="container-fluid" id="section1">
    <div id="loginbox" style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Login</div>

                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ action('RemindersController@getRemind') }}">Forgot password?</a></div>

            </div>     

        <div style="padding-top:30px" class="panel-body">
                {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-horizontal', 'id' => 'loginform'))}}
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                        <!-- <input id="email" type="email" class="form-control" name="email"  placeholder="Email">                                         -->
                    </div>
                  	<div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    
                    <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    	<div class="col-sm-12 controls">
                            <input type="submit" value="Log in" class="btn btn-success">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account? 
                                <a href="{{action('UserController@create')}}">Sign Up Here</a>
                            </div>
                        </div>
                    </div>    
                {{ Form::close() }}
        	</div>                     
        </div>  
    </div>
</section>

@stop