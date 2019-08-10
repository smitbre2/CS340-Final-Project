<!DOCTYPE html>
<html>
	<head>
		<title>Inventory</title>
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

//Selects titles and stock quantaties. MOVIE_ID is chosen for search functionality
$query = "SELECT Movie.NAME, i.STOCK, i.STOCK_OUT, Movie.MOVIE_ID FROM Movie LEFT JOIN Inventory i on i.MOVIE_ID = Movie.MOVIE_ID ";

	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}

	if(mysqli_num_rows($result) > 0){
        echo "<h1>Inventory</h1>";
		echo "<table id='t01' border='1'>";
        echo "<thead>";
			echo "<tr>";
			echo "<th>NAME</th>";
			echo "<th>STOCK</th>";
			echo "<th>STOCK_OUT</th>";
			echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = mysqli_fetch_array($result)){
	   		echo "<tr>";
			echo "<td>" . '<a href = "user_search.php?id=' . $row['MOVIE_ID'] . '">'. $row['NAME'] . "</td>";	
			echo "<td>" . $row['STOCK'] . "</td>";
			echo "<td>" . $row['STOCK_OUT'] . "</td>";
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
