<!DOCTYPE HTML>
<?php
	include 'header.php';
	include 'connectvars.php';
?>

<html>

<!--INCLUDE SCRIPTS HERE-->

   <link rel="stylesheet" href="main.css">

   <head>
	<title>Movies R Us</title>
   </head>

   <body>
	<div class = "navbar">
		<a class="active" href="index.php">Home</a>
		<a href="inventory.php">Inventory</a>
		<a href="reviews.php">Reviews</a>
		<a href="about.php">About</a>
	</div>

   </body>
</html>

<?php
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$conn) {
		die('Can not connect to server: ' . mysql_error());
	}
?>
