<?php
if ( !isset($_GET['track_id']) || empty($_GET['track_id']) ) {
	$error = "Invalid Track ID.";
} else {

	require '../config/config.php';

	// DB Connection
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');


	$sql = "SELECT tracks.name AS track, composer, albums.title AS album, artists.name AS artist, media_types.name AS media_type, genres.name AS genre, milliseconds, bytes, unit_price
					FROM tracks
					LEFT JOIN albums
						ON albums.album_id = tracks.album_id
					LEFT JOIN artists
						ON artists.artist_id = albums.artist_id
					LEFT JOIN genres
						ON genres.genre_id = tracks.genre_id
					LEFT JOIN media_types
						ON media_types.media_type_id = tracks.media_type_id
					WHERE track_id = " . $_GET['track_id'] . ";";

	// echo "<hr>" . $sql . "<hr>";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}

	// Since we only get 1 result (searching by primary key), we don't need a loop.
	$row = $results->fetch_assoc();

	$mysqli->close();

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Song Details | Song Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="search_form.php">Search</a></li>
		<li class="breadcrumb-item"><a href="search_results.php?">Results</a></li>
		<li class="breadcrumb-item active">Details</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Song Details</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">

				<?php if ( isset($error) && !empty($error) ) : ?>

					<div class="text-danger">
						<?php echo $error; ?>
					</div>

				<?php else : ?>

					<table class="table table-responsive">
						<tr>
							<th class="text-right">Track Name:</th>
							<td><?php echo $row['track']; ?></td>
						</tr>
						<tr>
							<th class="text-right">Artist Name:</th>
							<td><?php echo $row['artist']; ?></td>
						</tr>
						<tr>
							<th class="text-right">Composer:</th>
							<td><?php echo $row['composer']; ?></td>
						</tr>
						<tr>
							<th class="text-right">Album:</th>
							<td><?php echo $row['album']; ?></td>
						</tr>
						<tr>
							<th class="text-right">Media Type:</th>
							<td><?php echo $row['media_type']; ?></td>
						</tr>
						<tr>
							<th class="text-right">Genre:</th>
							<td><?php echo $row['genre']; ?></td>
						</tr>
						<tr>
							<th class="text-right">Milliseconds:</th>
							<td><?php echo $row['milliseconds']; ?></td>
						</tr>
						<tr>
							<th class="text-right">Bytes:</th>
							<td><?php echo $row['bytes']; ?></td>
						</tr>
						<tr>
							<th class="text-right">Price:</th>
							<td><?php echo $row['unit_price']; ?></td>
						</tr>
					</table>

				<?php endif; ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-3 mb-4">
			<div class="col-12">
				<a href="search_results.php?" role="button" class="btn btn-primary">Back to Search Results</a>

				<a href="edit_form.php?track_id=<?php echo $_GET['track_id']; ?>" class="btn btn-warning">Edit This Track</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>