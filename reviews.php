<!DOCTYPE html>
<html>
	<head>
		<title>Reviews</title>
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

$query = "SELECT Movie.NAME, Reviews.USER_ID, Reviews.RATING, Reviews.REVIEW FROM Reviews LEFT JOIN Movie ON Movie.MOVIE_ID = Reviews.MOVIE_ID  ";

	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}

	if(mysqli_num_rows($result) > 0){
        echo "<h1>Reviews</h1>";
		echo "<table id='t01' border='1'>";
        echo "<thead>";
			echo "<tr>";
			echo "<th>NAME</th>";
			echo "<th>RATING</th>";
			echo "<th>REVIEW</th>";
			echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>" . $row['NAME'] . "</td>";
					echo "<td>" . $row['RATING'] . "</td>";
					echo "<td>" . $row['REVIEW'] . "</td>";
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
