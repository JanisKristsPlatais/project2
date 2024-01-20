@extends('layout')
@section('content')
	<h1>{{ $title }}</h1>
	 @if ($errors->any())
		 <div class="alert alert-danger">Please fix the errors! </div>
	 @endif
	 
	<form method="post" action="{{ $tag->exists ? '/tags/patch/' . $tag->id : '/tags/put' }}">
		@csrf
		
		<div class="mb-3">
			<label for="tag-name" class="form-label">Tag</label>
			<input
				type="text"
				class="form-control @error('name') is-invalid @enderror"
				id="tag-name"
				name="name"
				value="{{ old('name', $tag->name) }}">
				
			@error('name')
				<p class="invalid-feedback">{{ $errors->first('name') }}</p>
			@enderror
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
@endsection