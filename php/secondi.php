<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once('partials/favicon.php') ?>
	<!-- ...and meta tags -->

	<link rel="stylesheet" href="../css/styles.css" />
	<link rel="stylesheet" href="../css/footer.css" />
	<link rel="stylesheet" href="../css/navbar.css" />

	<script defer src="../app.js"></script>

	<title>Secondi</title>
</head>

<body>
	<header>
		<h1 class="logo"><a href="#">Secondi</a></h1>
		<input type="checkbox" class="nav-toggle" id="nav-toggle" />
		<nav>
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="bevande.php">Bevande</a></li>
				<li><a href="primi.php">Primi</a></li>
				<li><a href="secondi.php" class="current-page">Secondi</a></li>
				<li><a href="dessert.php">Dessert</a></li>
				<li>
					<form action="formAction.php" method="post">
						<input type="hidden" name="pagina" value="summary">
						<button type="submit">Summary</button>
					</form>
				</li>
			</ul>
		</nav>
		<label for="nav-toggle" class="nav-toggle-label">
			<span></span>
		</label>
	</header>

	<main>
		<a href="primi.php" class="betweenPages torna-home">torna ai primi</a>

		<?php

		$page = 'secondi';
		include_once('partials/menuForm.php');

		?>

	</main>

	<?php include_once('partials/footer.php'); ?>

</body>

</html>