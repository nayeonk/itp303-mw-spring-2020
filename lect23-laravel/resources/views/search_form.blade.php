@extends('master')

@section('title', 'Song DB Search')

@section('content')
<div class="container">
	<div class="row">
		<h1 class="col-12 mt-4 mb-4">
			Song Search Form {{ $username }}
		</h1>
	</div>

	<form action="/search-results" method="GET">
		<div class="form-group row">
			<label for="name-id" class="col-sm-3 col-form-label text-sm-right">Track Name:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="name-id" name="track_name">
			</div>
		</div> <!-- .form-group -->

		<div class="form-group row">
			<label for="genre-id" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
			<div class="col-sm-9">
				<select name="genre" id="genre-id" class="form-control">
					<option value="" selected>-- All --</option>

					<!-- <option value='1'>Rock</option>
					<option value='2'>Jazz</option>
					<option value='3'>Metal</option>
					<option value='4'>Alternative & Punk</option>
					<option value='5'>Rock And Roll</option> -->

					@foreach($genres as $genre)

					<option value='{{$genre->genre_id}}'>{{ $genre->name }}</option>

					@endforeach

				</select>
			</div>
		</div> <!-- .form-group -->

		<div class="form-group row">
			<div class="col-sm-3"></div>
			<div class="col-sm-9 mt-2">
				<button type="submit" class="btn btn-primary">Search</button>
				<button type="reset" class="btn btn-light">Reset</button>
			</div>
		</div> <!-- .form-group -->

	</form>
</div> <!-- .container -->
@endsection



