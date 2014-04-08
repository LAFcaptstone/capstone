@extends('layouts.master')


@section('content')

<div>
	{{ Form::label('title', 'Title') }}
    {{ Form::text('title', null) }}
	{{$errors->has('title') ? $errors->first('title', '<p><span class="help-block">:message</span></p>') : '' }}
</div>
<div>
	{{ Form::label('body', 'Body') }}
    {{ Form::text('body', null) }}
	{{$errors->has('body') ? $errors->first('title', '<p><span class="help-block">:message</span></p>') : '' }}
</div>
<div>
	{{ Form::label('location', 'Loction') }}
    {{ Form::text('location', null) }}
	{{$errors->has('location') ? $errors->first('title', '<p><span class="help-block">:message</span></p>') : '' }}
</div>
<div>
	{{ Form::label('email', 'Email') }}
    {{ Form::text('email', null) }}
	{{$errors->has('email') ? $errors->first('title', '<p><span class="help-block">:message</span></p>') : '' }}
</div>
<div>
	{{ Form::label('Upload Image') }}
	{{ Form::open(array('url'=>'/public/upload','files'=> true))}}
	{{ Form::file('image') }}
</div>
{{ Form::submit('Save Post') }}