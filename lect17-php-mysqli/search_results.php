<?php

var_dump($_GET);


// search_results.php is its own file so need to  go through the four steps again

// ---- STEP 1: Establish DB Connection
$host = "303.itpwebdev.com";
// User here is NOT cpanel user. This is the DB user.
$user = "nayeon_db_user";
$password = "uscItp2020";
$db = "nayeon_song_db";

// Create an instance of mysqli class 
// This attempts to make a connection with the DB
$mysqli = new mysqli($host, $user, $password, $db);
// Check for any DB connection errors
// connect_errno returns the error code
// connect_errno is a property of mysqli class
if( $mysqli->connect_errno ) {
	// connect_error returns a string message description of the error
	echo $mysqli->connect_error;
	// Terminate the program here. Subsequent code doe not get run.
	exit();
}

// Set the charset to have uniform charset
$mysqli->set_charset('utf8');

// ---- STEP 2: Generate & Submit SQL Query
$sql = "SELECT tracks.name AS track, genres.name AS genre, media_types.name AS media_type
FROM tracks
JOIN genres
	ON genres.genre_id = tracks.genre_id
JOIN media_types
	ON media_types.media_type_id = tracks.media_type_id
WHERE 1 = 1";

// $_GET tells us which values user passed in

var_dump($_GET["track_name"]);

if( isset($_GET["track_name"]) && !empty($_GET["track_name"])) {
	$sql = $sql . " AND tracks.name LIKE '%" . $_GET["track_name"] . "%'";
}
// Using primary key
if( isset($_GET["genre"]) && !empty($_GET["genre"])) {
	$sql = $sql . " AND tracks.genre_id = " . $_GET["genre"];
}
if( isset($_GET["media_type"]) && !empty($_GET["media_type"])) {
	$sql = $sql . " AND tracks.media_type_id = " . $_GET["media_type"];
}

// Append the semicolon at the end
$sql = $sql . ";";

// Echo out the statement to double check the sql statement
echo "<hr>" . $sql . "<hr>";

// Submit the query
$results = $mysqli->query($sql);
if(!$results) {
	echo $mysqli->error;
	exit();
}

$mysqli->close();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Song Search Results</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<h1 class="col-12 mt-4">Song Search Results</h1>
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
	<div class="container-fluid">
		<div class="row mb-4 mt-4">
			<div class="col-12">
				<a href="search_form.php" role="button" class="btn btn-primary">Back to Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row">
			<div class="col-12">

				Showing 2 result(s).

			</div> <!-- .col -->
			<div class="col-12">
				<table class="table table-hover table-responsive mt-4">
					<thead>
						<tr>
							<th>Track</th>
							<th>Genre</th>
							<th>Media Type</th>
						</tr>
					</thead>
<tbody>

	<?php while($row = $results->fetch_assoc()): ?>

		<tr>
			<td><?php echo $row["track"]; ?></td>
			<td><?php echo $row["genre"]; ?></td>
			<td><?php echo $row["media_type"]; ?></td>
		</tr>

	<?php endwhile; ?>

	<!-- <tr>
		<td>For Those About To Rock (We Salute You)</td>
		<td>Rock</td>
		<td>MPEG audio file</td>
	</tr>

	<tr>
		<td>Put The Finger On You</td>
		<td>Rock</td>
		<td>MPEG audio file</td>
	</tr> -->

</tbody>
				</table>
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="search_form.php" role="button" class="btn btn-primary">Back to Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</body>
</html>