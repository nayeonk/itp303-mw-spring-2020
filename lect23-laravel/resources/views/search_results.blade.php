@extends('master')

@section('title', 'Song DB Search Results')

@section('content')
<div class="container-fluid">
	<div class="row">
		<h1 class="col-12 mt-4 mb-4">Song Search Results</h1>
	</div>

	<div class="row mb-4 mt-4">
		<div class="col-12">
			<a href="/" role="button" class="btn btn-primary">Back to Form</a>
		</div> <!-- .col -->
	</div> <!-- .row -->

	<div class="row">
		<div class="col-12">

			<table class="table table-hover table-responsive mt-4">
				<thead>
					<tr>
						<th>Track</th>
						<th>Composer</th>
						<th>Genre</th>
					</tr>
				</thead>
				<tbody>

					<!-- <tr>
						<td>For Those About To Rock (We Salute You)</td>
						<td>Angus Young, Malcolm Young, Brian Johnson</td>
						<td>Rock</td>
					</tr>

					<tr>
						<td>Put The Finger On You</td>
						<td>Angus Young, Malcolm Young, Brian Johnson</td>
						<td>Rock</td>
					</tr> -->

					@foreach ($tracks as $track)
						<tr>
							<td>{{ $track->track_name }}</td>
							<td>{{ $track->composer}}</td>
							<td>{{ $track->genre}}</td>
						</tr>
					@endforeach

				</tbody>
			</table>

		</div> <!-- .col -->
	</div> <!-- .row -->

	<div class="row mt-4 mb-4">
		<div class="col-12">
			<a href="/" role="button" class="btn btn-primary">Back to Form</a>
		</div> <!-- .col -->
	</div> <!-- .row -->
</div>
@endsection

</div> <!-- .container-fluid -->