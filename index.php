<!DOCTYPE HTML>
<?php
	include 'header.php';
	include 'connectvars.php';
?>
<html>
	<title>Movies R Us</title>
	<h3>Home</h3>
</html>
<?php
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$conn) {
		die('Can not connect to server: ' . mysql_error());
	}
?>
