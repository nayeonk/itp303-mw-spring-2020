<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title') | ITP</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<style>
		#footer {
			font-size: 0.8em;
			height: 50px;
			line-height: 50px;
		}
	</style>
</head>
<body>
	
	<div class="navbar navbar-light bg-light">
		<span class="navbar-brand mb-0 h1">Information Technology Program</span>
	</div>

	
	@yield('content')
	

	<div id="footer" class="text-center bg-light">
		University of Southern California &copy; 2020
	</div>

</body>
</html>