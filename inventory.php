<!DOCTYPE html>
<?php
	include "connectvars.php";
?>

<html>
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

	<h3>Inventory</h3>
   </body>
</html>


<?php
	//Create connect token for database
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$conn) {
		die('Could not connect: ' . msql_error());
	}
/* Here we will have to add in table specifics
	//Get table from database
	$query = "SELECT * FROM Inventory"
	$result = mysqli_query($conn, $query);
	if(!$result) {
		die("Query to table failed");
	}
	
	//Print Column Names
	$col_num = mysli_num_fields($result);
	echo "<h1>Inventory</h1>";
	echo "<table border ='1'><tr>";

	for($i=0; $i<$col_num; $i++) {
		//Get column names
		$field = mysqli_fetch_field($result);
		echo "<td><b>{$field->name}</b></td>";
	}

	//Print each individual row out
	echo "</tr>\n";
	while($row = msqli_fetch_row($result)) {

		echo "<tr>";
		foreach($row as $cell)
			echo "<td>$cell</td>";
		echo "</tr>\n";
	}
	*/
?>
