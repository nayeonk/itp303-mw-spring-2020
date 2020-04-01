<?php

// Form was passed via POST method so can see all the values user filled out by dumping out $_POST
var_dump($_POST);


// Checking for required fields - another line of defense (JS should also be doing validation checks)
if ( !isset($_POST['track_name']) || 
	empty($_POST['track_name']) || 
	!isset($_POST['media_type']) || 
	empty($_POST['media_type']) || 
	!isset($_POST['genre']) || 
	empty($_POST['genre']) || 
	!isset($_POST['milliseconds']) || 
	empty($_POST['milliseconds']) || 
	!isset($_POST['price']) || 
	empty($_POST['price']) ) {

	$error = "Please fill out all required fields.";
}
else {
	$host = "303.itpwebdev.com";
	$user = "nayeon_db_user";
	$password = "uscItp2020";
	$db = "nayeon_song_db";

	$mysqli = new mysqli($host, $user, $password, $db);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	// Handle optional fields
	if( isset($_POST["composer"]) && !empty($_POST["composer"])) {
		$composer = "'" . $_POST["composer"] . "'";
	}
	else {
		$composer = "null";
	}

	// escape any special characters like quotes
	$track_name = $mysqli->real_escape_string($_POST["track_name"]);

	// THE SQL STATEMENT
	// Only added track name, media type, genre, and composer for simplicity sake
	$sql = "INSERT INTO tracks(name, media_type_id, genre_id, composer )

		VALUES('" . $track_name . "',"
		. $_POST["media_type"]
		. "," 
		. $_POST["genre"] 
		. "," 
		. $composer
		. ");";

	echo "<hr>" . $sql . "<hr>";

	$results = $mysqli->query($sql);
	if(!$results) {
		echo $mysqli->error;
		exit();
	}
	// affected_rows returns the num of rows inserted, updated, deleted by SQL statement
	echo "Inserted: " . $mysqli->affected_rows;

	if($mysqli->affected_rows == 1) {
		$isInserted = true;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Confirmation | Song Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="add_form.php">Add</a></li>
		<li class="breadcrumb-item active">Confirmation</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Add a Song</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">

				<?php if( isset($error) && !empty($error)) :?>

					<div class="text-danger">
						<?php echo $error; ?>
					</div>
				<?php endif; ?>

				<?php if($isInserted): ?>

				<div class="text-success">
					<span class="font-italic"><?php echo $_POST["track_name"]; ?></span> was successfully added.
				</div>

				<?php endif; ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="add_form.php" role="button" class="btn btn-primary">Back to Add Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>