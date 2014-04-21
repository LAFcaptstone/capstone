@extends('layouts.master')

@section('content')
<section class="container-fluid" id="section1">
    <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="{{{action('HomeController@showLogin')}}}">Login</a></div>
            </div>  
            <div class="panel-body" >
                {{ Form::open(array('action' => 'UserController@store', 'class' => 'form-horizontal', 'id' =>'signupform')) }}
                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>
                                   
                    <div class="form-group">
                        {{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-md-9">
                            {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                            {{ $errors->has('email') ? $errors->first('email', '<p><span class="help-block">:message</span></p>') : " " }}
                        </div>
                    </div>
                        
                    <div class="form-group">
                        {{ Form::label('first_name', 'First Name', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-md-9">
                            {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
                            {{ $errors->has('first_name') ? $errors->first('first_name', '<p><span class="help-block">:message</span></p>') : " " }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('last_name', 'Last Name', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-md-9">
                            {{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
                            {{ $errors->has('last_name') ? $errors->first('last_name', '<p><span class="help-block">:message</span></p>') : " " }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password"  placeholder="Password">
                            {{ $errors->has('password') ? $errors->first('password', '<p><span class="help-block">:message</span></p>') : " " }}
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <!-- Button -->                                        
                        <div class="col-md-offset-5 col-md-9" style='margin-top:25px;'>
                            {{ Form::submit('Sign Up', array('id' => 'btn-signup', 'type' => 'button', 'class' => 'btn btn-info', 'icon-hand-right'))}}
                        </div>
                    </div>
                {{ Form::close() }}
             </div>
        </div>
      </div>
</section>
  
@stop