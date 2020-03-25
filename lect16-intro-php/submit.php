<?php
	// This is a PHP Block
	// Can write any PHP anywhere as long as in a php block
	// PHP always runs first since it's on the server side. 
	// HTML/CSS/JS is still executed by the browser
	echo "Hello World!";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Intro to PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Intro to PHP</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">
		<div class="row">

			<h2 class="col-12 mt-4 mb-3">PHP Output</h2>

<div class="col-12">
<!-- Display Test Output Here -->
<?php
	echo "Hello World Again!";
	// Can echo HTML 
	echo "<strong>Hello World</strong>";
	echo "<hr>";

	// Variables
	$name = "Tommy";
	$age = 18;
	echo $name;
	// Error checking using isset() and empty()
	if ( isset($name) && !empty($name)) {
		echo $name;
	}
	else {
		echo "No name";
	}
	echo "<hr>";

	// var_dump() is useful to dump out any variables. It tells you the data type and value.
	var_dump($age);
	echo "<hr>";

	// Concatenation - in JS we use + to add strings together. in PHP we use period (.)
	echo "My name is " . $name;
	echo "<hr>";

	// With double quotes, you can utilize vairable interpolation and do something like this:
	echo "My name is $name";
	echo "<hr>";

	// But this won't work with single quotes. Single quotes around a string turn off variable interpolation.
	echo 'My name is $name';
	echo "<hr>";

	// Double quotes can also escape sequences
	echo "Double quotes\"";
	echo "<hr>";

	// Date/time
	// Set the default timezone for server
	date_default_timezone_set("America/Los_Angeles");
	echo date("m-d-y H:i:s T");
	echo "<hr>";

	// Arrays in PHP
	$colors = ["red", "blue", "green"];
	for( $i = 0; $i < sizeof($colors); $i++) {
		echo $colors[$i] . ", ";
	}

	// PHP loves to use Associative Arrays
	// Assoc. arrays have STRING keys (not indexes)
	$courses = [
		"ITP 303" => "Full-Stack Web Development",
		"ITP 404" => "Advanced Front-End Web Development",
		"ITP 405" => "Advanced Back-End Web Development"
	];
	echo "<hr>";
	echo $courses["ITP 303"];
	echo "<hr>";
	// To loop through an associative array, use foreach loop
	foreach($courses as $courseNumber => $courseName  ) {
		echo $courseNumber . ": " . $courseName;
		echo "<br>";
	}

	echo "<hr>";
	// To print out just the VALUES - this is more common
	foreach($courses as $courseName  ) {
		echo $courseName;
		echo "<br>";
	}	
	echo "<hr>";
	// You can also just var_dump() to quickly view everything in an assoc array
	var_dump($courses);

	echo "<hr>";

	// SUPERGLOBALS 
	// Form was submitted by POST method so user input from the form.php is stored in a superglobal called $_POST (if form as submitted via GET method, the data would be stored in a supergbloal called $_GET)
	var_dump($_POST);
	echo "<hr>";
	// Can grab value out of POST using the key
	// The key btw is set by the form from form.php the NAME attribute in the <input> tag is the key. The value is whatever the user entered in the <input> tag
	echo $_POST["name"];

?>
</div>

		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">
		<div class="row">

			<h2 class="col-12 mt-4">Form Data</h2>

		</div> <!-- .row -->

		<div class="row mt-3">
			<div class="col-3 text-right">Name:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				<?php
					if( isset($_POST["name"]) && !empty($_POST["name"])) {
						echo $_POST["name"];
					}
					else {
						echo "<div class='text-danger'>Not provided.</div>";
					}
				?>

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Email:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				<?php
					if( isset($_POST["email"]) && !empty($_POST["email"])) {
						echo $_POST["email"];
					}
					else {
						echo "<div class='text-danger'>Not provided.</div>";
					}
				?>
			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Current Student:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				<?php
					if( isset($_POST["current-student"]) && !empty($_POST["current-student"])) {
						echo $_POST["current-student"];
					}
					else {
						echo "<div class='text-danger'>Not provided.</div>";
					}
				?>

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Subscribe:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->

				<!-- Note: Subscribe is a little different because it's a series of checkboxes. Meaning a user could check more than one box. Look at the var_dump($_POST). Only one value is shown even if user selected multiple checkboxes. Therefore, need to change the <input> from form a bit. See line 66 in form.php -->
				<?php

					if ( isset($_POST['subscribe']) && !empty($_POST['subscribe']) ) {
						// Can run a for loop like this to get the subscribe elements
						// for ($i = 0; $i < sizeof($_POST['subscribe']); $i++) { 
						// 	echo $_POST['subscribe'][$i] . ", ";
						// }

						// Or can use a foreach loops. Makes it a little easier
						foreach($_POST['subscribe'] as $subscribe) {
							echo $subscribe . ",";
						}
					} else {
						echo "<div class='text-danger'>Not provided.</div>";
					}

				?>

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Subject:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				<?php
					if( isset($_POST["subject"]) && !empty($_POST["subject"])) {
						echo $_POST["subject"];
					}
					else {
						echo "<div class='text-danger'>Not provided.</div>";
					}
				?>
			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Message:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				<?php
					if( isset($_POST["msg"]) && !empty($_POST["msg"])) {
						echo $_POST["msg"];
					}
					else {
						echo "<div class='text-danger'>Not provided.</div>";
					}
				?>
			</div>
		</div> <!-- .row -->

		<div class="row mt-4 mb-4">
			<a href="form.php" role="button" class="btn btn-primary">Back to Form</a>
		</div> <!-- .row -->

	</div> <!-- .container -->
	
</body>
</html>