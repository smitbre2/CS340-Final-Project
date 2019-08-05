<!DOCTYPE HTML>
<?php
	include 'header.php';
	include 'connectvars.php';
?>

<html>

/* INCLUDE SCRIPTS HERE */
   <link rel="stylesheet" href="main.css">

   <head>
	<title>Movies R Us</title>
   </head>

   <body>
	<div class = "navbar">
		<a class="active" href="#home">Home</a>
		<a href="#inventory">Inventory</a>
		<a href="#reviews">Reviews</a>
		<a href="#about">About</a>
	</div>

   </body>
</html>

<?php
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$conn) {
		die('Can not connect to server: ' . mysql_error());
	}
?>
