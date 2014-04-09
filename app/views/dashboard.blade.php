@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>Dashboard</h2>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<h3>Found Items Posts</h3>
	</div>
</div>

<div class="row">
	<table class="table table-responsive">
		<thead>
            <tr>
               	<th>Id</th>
               	<th>Title</th>
               	<th>Location</th>
               	<th>Email</th>
               	<th>Image</th>
               	<th>Date Created</th>
				<th>Date Updated</th>
            </tr>
        </thead>
  
	@foreach ($foundItems as $foundItem) 
		<tbody>
       	    <tr>
				<td>{{{ $foundItem->id }}}</td>
				<td>{{{ $foundItem->title }}}</td>
				<td>{{{ $foundItem->location }}}</td>
				<td>{{{ $foundItem->email }}}</td>
				<td>{{{ $foundItem->image_path }}}</td>
				<td>{{{ $foundItem->created_at->format('l, F jS Y') }}}</td>
				<td>{{{ $foundItem->updated_at->format('l, F jS Y') }}}</td>
				<!-- <td><a href="{{{ action('FoundItemsController@edit', $foundItem->id) }}}">Edit</a> | -->
				<!-- <td><a href="{{{ action('FoundItemsController@destroy', $foundItem->id) }}}" id="btnDeletePost">Delete</a></td> -->
			</tr>
		</tbody>
		
	@endforeach

	</table>
</div>

@stop