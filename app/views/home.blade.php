@extends('layouts.master')

@section('content')
    
        <div class="row ">
            <a href="{{{ action('FoundItemsController@index')}}}"><div class=" col-md-6 col-md-offset-5 bttn1">
                <p class="text1">FOUND IT!</p>
            </div></a>
        </div>
        <div class="row">
            <a href="{{{ action('LostItemsController@index')}}}"><div class="col-md-6 col-md-offset-5 bttn2">
                 <p class="text1">LOST IT!</p>
            </div></a>
        </div>
        <div class="row">
            <a href="#"><div class="col-md-6 col-md-offset-5 bttn3">
                 <p class="text2">BROWSE!</p>
            </div></a>
        </div>
   


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>

@stop
@section('bottomscript')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
@stop
