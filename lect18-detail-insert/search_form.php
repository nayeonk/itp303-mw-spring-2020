<?php

$host = "303.itpwebdev.com";
$user = "nayeon_db_user";
$password = "uscItp2020";
$db = "nayeon_song_db";

// DB Connection
$mysqli = new mysqli($host, $user, $password, $db);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$mysqli->set_charset('utf8');

// Genres:
$sql = "SELECT * FROM genres;";
$results = $mysqli->query($sql);
if ( $results == false ) {
	echo $mysqli->error;
	exit();
}

// Media Types:
$sql_media_types = "SELECT * FROM media_types;";
$results_media_types = $mysqli->query($sql_media_types);
if ( $results_media_types == false ) {
	echo $mysqli->error;
	exit();
}

// Close DB Connection
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Song Search Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		.form-check-label {
			padding-top: calc(.5rem - 1px * 2);
			padding-bottom: calc(.5rem - 1px * 2);
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item active">Search</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">Song Search Form</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">

		<form action="search_results.php" method="GET">

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

						<?php while ( $row = $results->fetch_assoc() ) : ?>
							<option value="<?php echo $row['genre_id']; ?>">
								<?php echo $row['name']; ?>
							</option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="media-type-id" class="col-sm-3 col-form-label text-sm-right">Media Type:</label>
				<div class="col-sm-9">
					<select name="media_type" id="media-type-id" class="form-control">
						<option value="" selected>-- All --</option>

						<?php while ( $row = $results_media_types->fetch_assoc() ) : ?>
							<option value="<?php echo $row['media_type_id']; ?>">
								<?php echo $row['name']; ?>
							</option>
						<?php endwhile; ?>

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
</body>
</html>