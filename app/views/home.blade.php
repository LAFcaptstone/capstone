@extends('layouts.master')

@section('topscript')

@stop

@section('content')
<section class="container-fluid" id="section1">
	<img src="/img/main2.png" class="center-block v-center">
	<p style="margin-top:10px;" class='text-center lead'>Our goal is to help people find things they've lost.</p>
	<br>
	<div class="row">
			<div class="col-sm-6">
					<div class="row">
						<a href="{{{action('LostItemsController@index')}}}" style='color:#F06161;'><div class="col-sm-10 col-sm-offset-2 text-center"><h1>Lost</h1><h3>Click here to view items people have lost.</h3><img src='img/dog.png'></div></a>
					</div>
			</div>
				<div class="col-sm-6">
					<div class="row">
						<a href="{{{action('FoundItemsController@index')}}}" style='color:#3d983d'><div class="col-sm-10 col-sm-offset-1 text-center"><h1>Found</h1><h3>Click here to view items people have found.</h3><img src='img/user.png'></div></a>
					</div>
			</div>
</section>

<section class="container-fluid" id="section2">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 text-center" style='margin-top:100px;'>
				<h1>Vind<small>/vīnd/</small></h1>
				<br>
		<p class="lead">To find a lost item using the power of crowd-sourcing and community outreach.</p>
				<br> 
				<p style="font-size:1.3em;">We set out to make an application which helps people find things they've lost,  based on the belief that there should be single place that people know to check if they've lost something important.
						Now, we realize this is a lofty goal&mdash;so we decided to make a basic open source application that can be easily customized for various markets.  If you think your small town, school, church, ect... could
						benefit from this app, simply pull down the code and customize the design to fit your needs.  Maybe you believe there should be one place people check nation wide for lost pets; the basic functionality you need exists within Vind iT.</p>
		</div>
	</div>
</section>

<section class="container-fluid" id="section3">
	<h1 class="text-center">Meet the Team</h1>
		 <div class="row"  style="margin-top:15px;">
			<div class="col-sm-4">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-2 text-center"><h4>Cecilia Munson</h4><img src="/img/cecilia.jpg" class="img-circle center-block" alt='CM'><p style="margin-top:15px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, a, magnam iure quia ratione illum eos reiciendis tenetur velit ut neque earum provident perspiciatis recusandae ex facere error illo inventore. </p></div>
					</div>
			</div>
				<div class="col-sm-4 text-center">
					
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 text-center"><h4>Steven Starnes</h4><img src="/img/steve.png" class="img-circle center-block" alt='SS'><p style="margin-top:15px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, accusamus, amet quisquam iure laboriosam reiciendis aspernatur ab corporis asperiores voluptates esse sed vel nisi quibusdam reprehenderit nulla voluptas saepe. Molestias. </p></div>
					</div>
			</div>
				<div class="col-sm-4 text-center">
					<div class="row">
						<div class="col-sm-10 text-center"><h4>Corey Kepple</h4><img src="/img/corey.jpg" class="img-circle center-block" alt='Ck'><p style="margin-top:15px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum neque quam provident! Blanditiis, quas soluta vel sequi odio porro error ullam dolorum qui ipsum dolore illum sapiente nobis architecto debitis. </p></div>
					</div>
			</div>
	</div>
</section>
							
@stop
