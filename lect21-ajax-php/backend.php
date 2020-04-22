<?php
	$php_array = [
		"first_name" => "Tommy",
		"last_name" => "Trojan",
		"age" => 21,
		"phone" => [
			"cell" => "123-123-1234",

			"home" => "456-456-4567"
		],
	];

	//var_dump("Hello World!");
	// echo "Hello World!";

	// cannot echo out an associative array
	// Convert php array into something that JS can eventually read and parse
	// echo json_encode($php_array);

	// Information was sent to backend via GET so we can access its values using GET superglobal
	//$_GET["firstName"] // returns Tommy
	//$_GET["lastName"] // returns Trojan


	// Connect to the database to get search results
	$host = "303.itpwebdev.com";
	$user = "nayeon_db_user";
	$pass = "uscItp2020";
	$db = "nayeon_song_db";

	$mysqli = new mysqli($host, $user, $pass, $db);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	$sql = "SELECT * FROM tracks WHERE name LIKE '%" . $_GET["term"] ."%' LIMIT 10;";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();

	// Usually, we would run a while loop, use fetch_assoc()
	// But in this case, just need to send this data to the frontend.
	$results_array = [];

	// Run through results, add them into $results_array
	while($row = $results->fetch_assoc()) {
		// var_dump($row);
		// $row is an assoc array of each song record
		// $results_array is an array of assoc arrays
		array_push($results_array, $row);
	}

	// Convert the assoc array to json string
	echo json_encode($results_array);













?>