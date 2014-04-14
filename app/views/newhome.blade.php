@extends('layouts.master')

@section('topscript')
<style>

body {
  font-size: 14px;
}
body, h1, h2, h3, h4, h5, h6 {
  font-family: "gandhi sans", helvetica, sans-serif;
}
.btn {
  border-top: 1px solid rgba(255, 255, 255, 0.5);
  border-radius: 2px;
  margin-right: 5px;
}
.container {
  max-width: 920px;
}
.navbar {
  background: #8F9194;
  padding: 0.3em 0;
}
.navbar .navbar-brand {
  color: #fff;
  font-family: "gandhi serif", georgia, serif;
  font-weight: bold;
}
.navbar ul.nav li a {
  color: #fff;
  padding-left: 0;
  padding-right: 0;
  margin: 0 1.5em;
}
.navbar ul.nav li button {
  margin: 0.7em 0 0 1em;
}
.jumbotron {
  background: url(/img/greenBG.png);
  color: #fff;
  padding: 6.5em 0 6em;
  text-align: center;
}
.jumbotron h1 {
  font-family: "gandhi serif", georgia, serif;
  font-size: 3em;
  font-weight: bold;
  text-shadow: 1px 1px 3px #000;
}
.jumbotron h2 {
  font-size: 1.2em;
  font-style: italic;
  font-weight: normal;
  line-height: 1.4em;
  margin-bottom: 1.4em;
}
.jumbotron .btn {
  box-shadow: 1px 1px 3px #000;
  font-size: 1.2em;
  font-weight: bold;
  padding: 0.3em 2.5em 0.5em;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
}
.jumbotron .btn .glyphicon {
  margin-left: 0.2em;
  position: relative;
  top: 3px;
}
.sect-border {
  border-top: 1px dashed #d6d6d6;
  border-bottom: 1px dashed #f6f6f6;
  margin: 2em 8% 2.4em;
}
.subhead {
  color: #000;
  font-family: "gandhi serif", georgia, serif;
  font-size: 3em;
  font-weight: bold;
  text-align: center;
  margin: 0.3em 0;
}
.benefit {
  margin: 0.8em 0;
  text-align: center;
}
.benefit .benefit-ball {
  background: #428bca;
  border-radius: 50%;
  color: #fff;
  display: inline-block;
  line-height: 1em;
  padding: 3em;
}
.benefit .benefit-ball .glyphicon {
  font-size: 4em;
  position: relative;
  top: -3px;
  right: 1px;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
}
.benefit h3 {
  color: #000;
  font-family: "gandhi serif", georgia, serif;
  font-size: 2em;
  font-weight: bold;
}
#slideshow {
  margin: 0.5em 0 1.5em;
}
#slideshow .carousel-inner img {
  background: #000;
  height: 500px;
  width: 100%;
}
footer {
  background: #111;
  color: #fff;
  margin: 3.5em 0 0;
  padding: 1.5em 0 0.8em;
}
@media screen and (max-width: 768px) {
  .navbar ul.nav li {
    text-align: center;
  }
  .navbar ul.nav li button {
    margin: 1em 0;
  }
  .jumbotron {
    font-size: 14px;
    padding: 6em 0 4em;
  }
  .benefit {
    margin-bottom: 2em;
  }
}
@media screen and (max-width: 480px) {
  body {
    font-size: 12px;
  }
  .jumbotron {
    font-size: 12px;
  }
  footer .pull-right {
    display: none;
  }
}
</style>
@stop

@section('content')
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand nav-link" href="#top">Vind iT</a>
        </div> <!-- /.navbar-header -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
        	<ul class='nav navbar-nav'>
        		<li><button class="btn btn-success btn-sm navbar-btn">Found</button></li>
        		<li><button class="btn btn-danger btn-sm navbar-btn">Lost</button></li>
        	</ul>
        
          {{ Form::open(array('action' => array('FoundItemsController@index'), 'method' => 'GET', 'class' => 'navbar-form navbar-left')) }}
          <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
          </div>
              <button type="submit" class="btn btn-default">Submit</button>
          {{ Form::close() }} 

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#benefits" class="nav-link">Create Post</a></li>
            <li><button class="btn btn-default btn-sm navbar-btn">Login</button></li>
          </ul>
        </div> <!-- /.navbar-collapse -->
      </div> <!-- /.container -->
    </nav> <!-- /.navbar -->

    <div id="top" class="jumbotron">
      <div class="container">
        <h1>Vind iT</h1>
        <h2>Our services goal is to help people find things that they've lost.</h2>
        <p><a class="btn btn-success btn-md">People have found...<span class="glyphicon glyphicon-circle-arrow-right"></span></a><a class="btn btn-danger btn-md">People have lost...<span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
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

      <h3 id="tour" class="subhead">Meet the Team</h3>
      <div class="row">
        <div class="col-md-12">
          <div id="slideshow" class="carousel slide">
            <ol class="carousel-indicators">
              <li data-target="#slideshow" data-slide-to="0" class="active"></li>
              <li data-target="#slideshow" data-slide-to="1"></li>
              <li data-target="#slideshow" data-slide-to="2"></li>
              <li data-target="#slideshow" data-slide-to="3"></li>
              <li data-target="#slideshow" data-slide-to="4"></li>
            </ol>

            <div class="carousel-inner">
              <div class="item active">
                <img src="img/cecilia.jpg">
                <div class="carousel-caption">
                  Cecilia Munson <a href="#">ceciliasite.com</a>
                </div>
              </div>
               <div class="item">
                <img src="img/steves.jpg">
                <div class="carousel-caption">
                  Steven Starnes <a href="#">stevenstarnes.com</a>
                </div>
              </div>
              <div class="item">
                <img src="img/cck.jpg">
                <div class="carousel-caption">
                  Corey Kepple <a href="#">cctk.me</a>
                </div>
              </div>
            </div>

            <a class="left carousel-control" href="#slideshow" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#slideshow" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div> <!-- #slideshow -->
        </div> <!-- /.col-md-12 -->
      </div> <!-- /.row -->

      <div class="sect-border"></div>

      <h3 id="about" class="subhead">A Little More About Us</h3>
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.  Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.</p>
          <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
        </div> <!-- /.col-md-10 -->
      </div> <!-- /.row -->

    </div> <!-- /.container -->

@stop