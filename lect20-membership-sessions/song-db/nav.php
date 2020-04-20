<nav class="container-fluid bg-light p-2">
	<div class="row">
		<div class="col-12 d-flex justify-content-end">

	<?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) : ?>

			<a class="p-2 text-right" href="../login/login.php">Login</a>
			<a class="p-2 text-right" href="../login/register_form.php">Sign up</a>

	<?php else: ?>

			<div class="p-2">Hello <?php echo $_SESSION["username"]; ?>!</div>
			<a class="p-2" href="../login/logout.php">Logout</a>
			
	<?php endif; ?>

		</div>
	</div> <!-- .row -->
</nav>