@extends('layouts.master')

@section('content')
<div class='container-full'>
<div class="container"> 
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Edit Profile</div>
        </div>  
        <div class="panel-body" >
                
                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>
                {{ Form::open(array('action' => 'UserController@update', 'class' => 'form-horizontal', 'id' =>'signupform')) }}
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
                        
                        <span style="margin-left:8px; margin-right:8px;"></span>
                        <a href="{{action('UserController@update')}}">{{ Form::submit('Update Profile', array('id' => 'btn-fbsignup', 'type' => 'button', 'class' => 'btn btn-primary'))}}</a>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    </div>
</div>
</div>  

  {{ Form::close() }}
@stop