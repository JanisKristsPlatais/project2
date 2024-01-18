
@extends('layout')
@section('content')
	<h1>{{ $title }}</h1>
	@if (count($items) > 0)
		<table class="table table-striped table-hover table-sm">
			<thead class="thead-light">
				<tr>
					<th>ID</td>
					<th>Name</td>
					<th>Author</td>
					<th>Year</td>
					<th>Price</td>
					<th>Published</td>
					<th>&nbsp;</td>
				</tr>
			</thead>
			<tbody>
			
			@foreach($items as $manhwa)
			<tr>
				<td>{{ $manhwa->id }}</td>
				<td>{{ $manhwa->name }}</td>
				<td>{{ $manhwa->author->name }}</td>
				<td>{{ $manhwa->year }}</td>
				<td>&euro; {{ number_format($manhwa->price, 2, '.') }}</td>
				<td>{!! $manhwa->display ? '&#x2714;' : '&#x274C;' !!}</td>
				<td> 
					<a href="/manhwas/update/{{ $manhwa->id }}" class="btn btn-outline-primary btn-sm">Edit</a> / 
					<form action="/manhwas/delete/{{ $manhwa->id }}" method="post" class="deletion-form d-inline">
						@csrf
							<button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		
		<a href="/manhwas/create" class="btn btn-primary">Add new manhwa</a>

@endsection