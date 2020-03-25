<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Intro to PHP</title>
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
			<h1 class="col-12 mt-4">Contact Form</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<form action="submit.php" method="POST" class="mt-3">

			<div class="form-group row">
				<label for="name-id" class="col-sm-2 col-form-label text-sm-right">Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name-id" name="name" placeholder="Tommy Trojan">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="email-id" class="col-sm-2 col-form-label text-sm-right">Email:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email-id" name="email" placeholder="ttrojan@usc.edu">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label class="col-sm-2 col-form-label text-sm-right">Current student?</label>
				<div class="col-sm-10">
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input type="radio" name="current-student" class="form-check-input" value="yes">
							Yes
						</label>
					</div> <!-- .form-check -->
					<div class="form-check form-check-inline">
						<label class="form-check-label ml-2">
							<input type="radio" name="current-student" class="form-check-input" value="no">
							No
						</label>
					</div> <!-- .form-check -->
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label class="col-sm-2 col-form-label text-sm-right">Subscribe:</label>
				<div class="col-sm-10">
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<!-- Note: added [] to name="subscribe" so that it returns an array of checkboxes that are checked -->
							<input type="checkbox" name="subscribe[]" class="form-check-input" value="newsletters">
							Newsletters
						</label>
					</div> <!-- .form-check -->
					<div class="form-check form-check-inline">
						<label class="form-check-label ml-2">
							<input type="checkbox" name="subscribe[]" class="form-check-input" value="events">
							Events
						</label>
					</div> <!-- .form-check -->
					<div class="form-check form-check-inline">
						<label class="form-check-label ml-2">
							<input type="checkbox" name="subscribe[]" class="form-check-input" value="marketing">
							Marketing
						</label>
					</div> <!-- .form-check -->
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="subject-id" class="col-sm-2 col-form-label text-sm-right">Subject</label>
				<div class="col-sm-10">
					<select name="subject" id="subject-id" class="form-control">
						<option value="" disabled selected>-- Select One --</option>
						<option value="admissions">Admissions</option>
						<option value="tech-support">Technical Support</option>
						<option value="other">Other</option>
					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="msg-id" class="col-sm-2 col-form-label text-sm-right">Message</label>
				<div class="col-sm-10">
					<textarea name="msg" id="msg-id" class="form-control" placeholder="Hello..."></textarea>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div> <!-- .form-group -->

		</form>
		
	</div> <!-- .container -->
</body>
</html>