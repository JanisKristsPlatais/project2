
@extends('layout')
@section('content')
	<h1>{{ $title }}</h1>
	@if (count($items) > 0)
		<table class="table table-striped table-hover table-sm">
			<thead class="thead-light">
				<tr>
					<th>ID</td>
					<th>Name</td>
					<th>&nbsp;</td>
				</tr>
			</thead>
			<tbody>
			
			@foreach($items as $tag)
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
				<td> 
					<a href="/tags/update/{{ $tag->id }}" class="btn btn-outline-primary btn-sm">Edit</a> / 
					<form action="/tags/delete/{{ $tag->id }}" method="post" class="deletion-form d-inline">
						@csrf
							<button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		
		<a href="/tags/create" class="btn btn-primary">Add new</a>

		
	@else
		<p>No entries found in database</p>
	@endif
@endsection