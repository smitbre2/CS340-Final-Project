<!DOCTYPE html>
<?php
	include 'connectvars.php';
	include 'header.php';
?>

<html>
	<head>
		<title>Checkout</title>
		<link rel="stylesheet" href="main.css">
	</head>
<body>
		<form action="" method="POST">
			<label>user_id</label>
			<input type="text" name="user_id" value = "">
			<label>password</label>
			<input type="type2" name="password" value="">
			<button type="submit" name = "add">Add</button>
		</form>

<?php

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	if(isset($_POST['add'])){
		$user_id=$_POST['user_id'];
		$password=$_POST['password'];

		$mysqli_query->query("INSERT INTO User (USER_ID, PASSWORD) VALUES('$user_id', '$password')");

	}

	$query = "SELECT * FROM User ";

		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}

		if(mysqli_num_rows($result) > 0){
	        echo "<h1>User</h1>";
			echo "<table class = 'table' id='t01' border='1'>";
	        echo "<thead>";
				echo "<tr>";
				echo "<th>USER_ID</th>";
				echo "<th>PASSWORD</th>";
				echo "</tr>";
	        echo "</thead>";
	        echo "<tbody>";

	        while($row = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>" . $row['USER_ID'] . "</td>";
						echo "<td>" . $row['PASSWORD'] . "</td>";
						echo "</tr>";
	        }
	        echo "</tbody>";
	        echo "</table>";

	        mysqli_free_result($result);
	    } else{
			echo "<p class='lead'><em>No records were found.</em></p>";
	    }

	mysqli_close($conn);
?>
</body>

</html>
