@extends('layouts.master')
@section('topscript')
<style>
.img-circle {
  margin-top:18px;
  height:150px;
  width:150x;
}
</style>
@stop
@section('content')

    <div id="top" class="jumbotron">
      <div class="container">
        <h1>Vind iT</h1>
        <h2>Our goal is to help people find things they've lost.</h2>
        <p><a href="{{{action('FoundItemsController@index')}}}" class="btn btn-success btn-md">What's been found...<span class="glyphicon glyphicon-circle-arrow-right"></span></a><a href="{{{action('LostItemsController@index')}}}" class="btn btn-danger btn-md">What's been lost...<span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
      </div> <!-- /.container -->
    </div> <!-- /.jumbotron -->

    <div class="container">

      <h3 id="benefits" class="subhead">Vind<small>/vīnd/</small></h3>
      <p class='benefit'><em>verb</em></p>
      <div class="row">
        <div class="col-md-12 col-sm-12 benefit">
          <h4>To find a lost item using the power of crowd-sourcing and community outreach.</h4>
        </div> <!-- /.benefit -->
      </div> <!-- /.row -->

      <div class="sect-border"></div>

      <h3 id="about" class="subhead">Our Mission</h3>
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.  Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.</p>
          <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
        </div> <!-- /.col-md-10 -->
      </div> <!-- /.row -->
	
      <div class="sect-border"></div>

      <h3 class="subhead">Meet the Team</h3>
         <div class="row">    
		      <div class="col-sm-4 text-center">
		        <h4>Cecilia Munson</h4>
		        <a href="#"><img src="/img/ted.jpg" class="img-circle center-block" alt='CM'></a>
		        </div>
		      <div class="col-sm-4 text-center">
		        <h4>Steven Starnes</h4>
		        <a href="#"><img src="/img/ted.jpg" class="img-circle center-block" alt='SS'></a>
		      </div>
		      <div class="col-sm-4 text-center">
		        <h4>Corey Kepple</h4>
		        <a href="#"><img src="/img/ted.jpg" class="img-circle center-block" alt='CK'></a>
		      </div>
		    </div>

		<div class="sect-border"></div>

       	<h3 class="subhead">Send us a Message</h3>
      	<div class='row'>
		<div class='col-md-10 col-md-offset-1' id='style'>
		{{ Form::open(array('action' => 'MessagesController@store', 'role' =>'form')) }}
		<div class='form-group'>
			{{Form::label('email', 'E-mail')}}
			<input type="email" class="form-control" id="email" name='email' placeholder="E-mail">
		</div>
		<div class='form-group'>
			{{ Form::label('title', 'Title', array('style' => 'display:block')) }}
			<input type="text" class="form-control" id="title" name='title' placeholder="Subject">
			{{ $errors->first('title', '<span class="help-block danger" style="color:red;">:message</span>') }}
		</div>
		<div class='form-group'>
			{{ Form::label('body', 'Body', array('style' => 'display:block')) }}
			{{ Form::textarea('body', null, array('class' => 'form-control'))}}
			{{ $errors->first('body', '<span class="help-block" style="color:red;">:message</span>') }}
		</div>
		<button style="display:block" class="btn btn-success" type="submit" value="submit" title='Submit Post'><span class='glyphicon glyphicon-pencil'></span>
		{{ Form::close() }}
		</div>
		</div>
</div>
        			
@stop
