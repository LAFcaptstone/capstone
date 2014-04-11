@extends('layouts.master')

@section('content')
<div class="container">
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="{{ action('HomeController@doLogin')}}">Sign In</a></div>
        </div>  
        <div class="panel-body" >
                
                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>
                {{ Form::open(array('action' => 'UserController@store', 'class' => 'form-horizontal', 'id' =>'signupform')) }}
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
                    {{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-md-9">
                        {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                        {{ $errors->has('email') ? $errors->first('email', '<p><span class="help-block">:message</span></p>') : " " }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-md-9">
                        {{ Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'Password')) }}
                        {{ $errors->has('password') ? $errors->first('password', '<p><span class="help-block">:message</span></p>') : " " }}
                    </div>
                </div>
                <div class="form-group">
                    <!-- Button -->                                        
                    <div class="col-md-offset-3 col-md-9">
                        {{ Form::submit('Sign Up', array('id' => 'btn-signup', 'type' => 'button', 'class' => 'btn btn-info', 'icon-hand-right'))}}
                        <span style="margin-left:8px; margin-right:8px;">or </span>
                        <a href="{{action('UserController@store')}}">{{ Form::submit('Sign Up with Facebook', array('id' => 'btn-fbsignup', 'type' => 'button', 'class' => 'btn btn-primary', 'icon-facebook'))}}</a>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    </div>

</div>  

  {{ Form::close() }}
@stop