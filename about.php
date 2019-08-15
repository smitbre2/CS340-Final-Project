<!DOCTYPE html>
<html>
	<head>
		<title>About</title>
		<link rel="stylesheet" href="main.css">
	</head>
<body>

<?php
	include 'connectvars.php';
	include 'header.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

$query = "SELECT r.USER_ID, r.MOVIE_ID, m.NAME, r.DATE FROM Rented r LEFT JOIN Movie m ON m.MOVIE_ID = r.MOVIE_ID ";

	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}

	if(mysqli_num_rows($result) > 0){
        echo "<h1>About</h1>";
		echo "<table class='table' id='t01' border='1'>";
        echo "<thead>";
			echo "<tr>";
			echo "<th>USER</th>";
			echo "<th>MOVIE_ID</th>";
			echo "<th>NAME</th>";
			echo "<th>CURR_DATE</th>";
			echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>" . $row['USER_ID'] . "</td>";
					echo "<td>" . $row['MOVIE_ID'] . "</td>";
					echo "<td>" . $row['NAME'] . "</td>";
					echo "<td>" . $row['DATE'] . "</td>";
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
