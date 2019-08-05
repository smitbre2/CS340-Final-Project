<!DOCTYPE html>
<?php
	include "connectvars.php";
?>

<html>

	<h3>Inventory</h3>
	<link rel="stylesheet" href="main.css">
</html>


<?php
	//Create connect token for database
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$conn) {
		die('Could not connect: ' . msql_error());
	}

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

	}
?>
