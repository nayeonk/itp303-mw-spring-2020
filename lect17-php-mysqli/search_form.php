<?php

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


// ---- STEP 2: Generate & Submit SQL Query

// Generate a SQL query
$sql = "SELECT * FROM genres;";
$sql_media = "SELECT * FROM genres;";
echo "<hr>" . $sql . "<hr>";

// Submit SQL query by calling query method, pass in the $sql string
// Returns the results and store it in a variable called $results
$results = $mysqli->query($sql);
//var_dump($results);

// Error checking - check for any SQL/result errors
// query() will return FALSE if there were any errors with the query
if(!$results) {
	echo $mysqli->error;
	// Terminate the program. No subsequent code gets run.
	exit();
} 

// ---- STEP 3: Display Results
var_dump($results);
echo "<hr>";
echo "Number of results: " . $results->num_rows;

// Show the ACTUAL results
echo "<hr>";
// fetch_assoc() fetches one result row as an associatve array
// could create another array to store the results
// $resultsArray = [];
// while ($row = $results->fetch_assoc()) {
// 	var_dump($row["name"]);
// 	echo "<hr>";
// }
echo "run again?";
// can't run through results again
// while ($row = $results->fetch_assoc()) {
// 	var_dump($row["name"]);
// 	echo "<hr>";
// }


// ---- STEP 4: Close the connection

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

	<?php
		// while($row = $results->fetch_assoc()) {
		// 	echo "<option value='" . $row["genre_id"] . "'>" . $row["name"] . "</option>";
		// }
	?>
	<!-- Alternative syntax to separate out PHP vs HTML -->
	<?php while( $row = $results->fetch_assoc()) :?>

		<option value='<?php echo $row['genre_id']; ?>'>
			<?php echo $row["name"]; ?>	
		</option>

	<?php endwhile; ?>



	<!-- <option value='1'>Rock</option>
	<option value='2'>Jazz</option>
	<option value='3'>Metal</option>
	<option value='4'>Alternative & Punk</option>
	<option value='5'>Rock And Roll</option> -->

</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="media-type-id" class="col-sm-3 col-form-label text-sm-right">Media Type:</label>
				<div class="col-sm-9">
					<select name="media_type" id="media-type-id" class="form-control">
						<option value="" selected>-- All --</option>

						<option value='1'>MPEG audio file</option>
						<option value='2'>Protected AAC audio file</option>

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