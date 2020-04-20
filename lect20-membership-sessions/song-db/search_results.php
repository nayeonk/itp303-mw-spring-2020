<?php
$page_url = preg_replace('/&page=\d*/', '', $_SERVER['REQUEST_URI']);

require '../config/config.php';

$results_per_page = 10;

// DB Connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$mysqli->set_charset('utf8');

$sql = "SELECT tracks.name AS track, genres.name AS genre, media_types.name AS media_type, track_id
				FROM tracks
				LEFT JOIN genres
					ON genres.genre_id = tracks.genre_id
				LEFT JOIN media_types
					ON media_types.media_type_id = tracks.media_type_id
				WHERE 1 = 1";

if ( isset($_GET['track_name']) && !empty($_GET['track_name']) ) {
	$sql = $sql . " AND tracks.name LIKE '%" . $_GET['track_name'] . "%'";
}

if ( isset($_GET['genre']) && !empty($_GET['genre']) ) {
	$sql = $sql . " AND tracks.genre_id = " . $_GET['genre'];
}

if ( isset($_GET['media_type']) && !empty($_GET['media_type']) ) {
	$sql = $sql . " AND tracks.media_type_id = " . $_GET['media_type'];
}

$sql = $sql . ";";

$results = $mysqli->query($sql);

if ( $results == false ) {
	echo $mysqli->error;
	exit();
}

// Define First & Last Pages.
$num_results = $results->num_rows;
$first_page = 1;
$last_page = ceil($num_results / $results_per_page);

// Determine current page number.
if ( isset($_GET['page']) && !empty($_GET['page']) ) {
	$current_page = $_GET['page'];
} else {
	$current_page = $first_page;
}

// Check to make sure page is within bounds.
if ( $current_page < $first_page ) {
	$current_page = $first_page;
} elseif ( $current_page > $last_page ) {
	$current_page = $last_page;
}

$start_index = ($current_page - 1) * $results_per_page;

// echo "<hr>" . $sql . "<hr>";

// Remove semi-colon from SQL statement.
$sql = str_replace(';', '', $sql);

$sql = $sql . " LIMIT " . $start_index . ", " . $results_per_page . ";";

// echo "<hr>" . $sql . "<hr>";


$results = $mysqli->query($sql);

if ( $results == false ) {
	echo $mysqli->error;
	exit();
}


// Close DB Connection.
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Song Search Results</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		th, td {
			vertical-align: middle !important;
		}
	</style>
</head>
<body>
	<?php include 'nav.php'; ?>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="search_form.php">Search</a></li>
		<li class="breadcrumb-item active">Results</li>
	</ol>
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
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item">
							<a class="page-link" href="<?php echo $page_url . "&page=1"; ?>">First</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="<?php echo $page_url . "&page=" . ($current_page-1); ?>">Previous</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href=""><?php echo $current_page; ?></a>
						</li>
						<li class="page-item">
							<a class="page-link" href="<?php echo $page_url . "&page=" . ($current_page+1); ?>">Next</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="<?php echo $page_url . "&page=" . $last_page; ?>">Last</a>
						</li>
					</ul>
				</nav>
			</div> <!-- .col -->

			<div class="col-12">

				Showing
				<?php echo ($start_index + 1); ?>
				-
				<?php echo ($start_index + $results->num_rows); ?>
				of
				<?php echo $num_results; ?>
				result(s).

			</div> <!-- .col -->
			<div class="col-12">
				<table class="table table-hover table-responsive mt-4">
					<thead>
						<tr>
							<?php if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ) : ?>
								<th></th>
							<?php endif; ?>
							<th>Track</th>
							<th>Genre</th>
							<th>Media Type</th>
						</tr>
					</thead>
					<tbody>

<?php while ( $row = $results->fetch_assoc() ) : ?>
	<tr>
			<?php if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ) : ?>
			<td>
				<a href="delete.php?track_id=<?php echo $row['track_id']; ?>&track_name=<?php echo $row['track']; ?>" class="btn btn-outline-danger" onclick="return confirm('You are about to delete <?php echo $row['track']; ?>.');">
					Delete
				</a>
			</td>
		<?php endif; ?>
		<td>
			<a href="details.php?track_id=<?php echo $row['track_id']; ?>">
				<?php echo $row['track']; ?>
			</a>
		</td>
		<td><?php echo $row['genre']; ?></td>
		<td><?php echo $row['media_type']; ?></td>
	</tr>
<?php endwhile; ?>

					</tbody>
				</table>
			</div> <!-- .col -->

			<div class="col-12">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item">
							<a class="page-link" href="<?php echo $page_url . "&page=1"; ?>">First</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="<?php echo $page_url . "&page=" . ($current_page-1); ?>">Previous</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href=""><?php echo $current_page; ?></a>
						</li>
						<li class="page-item">
							<a class="page-link" href="<?php echo $page_url . "&page=" . ($current_page+1); ?>">Next</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="<?php echo $page_url . "&page=" . $last_page; ?>">Last</a>
						</li>
					</ul>
				</nav>
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