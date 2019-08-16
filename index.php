<!DOCTYPE html>
<html>
	<head>
		<title>Inventory</title>
		<link rel="stylesheet" href="main.css">
		<body>
			<?php
				include 'connectvars.php';
				include 'header.php';
			?>
			<div class="photo-card">
				<a href="default.asp">
 					<img src="https://en.wikipedia.org/wiki/Princess_Leia#/media/File:Princess_Leia's_characteristic_hairstyle.jpg">
				</a>
			</div>

			<div class="container-main">
			<?php

				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if (!$conn) {
					die('Could not connect: ' . mysql_error());
				}

			$query = "SELECT Movie.NAME, Movie.CATEGORY FROM Movie ORDER BY CATEGORY ";

				$result = mysqli_query($conn, $query);
				if (!$result) {
					die("Query to show fields from table failed");
				}

				if(mysqli_num_rows($result) > 0){
					  echo "<h1>Movies</h1>";
				echo "<div style='overflow-x:auto';>";
				echo "<table class='table' id='t01' border='1'>";
			        echo "<thead>";
						echo "<tr>";
						echo "<th>NAME</th>";
						echo "<th>CATEGORY</th>";
						echo "</tr>";
			        echo "</thead>";
			        echo "<tbody>";

			        while($row = mysqli_fetch_array($result)){
				   		echo "<tr>";
						echo "<td>" . $row['NAME'] . "</td>";
						echo "<td>" . $row['CATEGORY'] . "</td>";
						echo "</tr>";
			        }
			        echo "</tbody>";
				echo "</table>";
				echo "</div>";


			        mysqli_free_result($result);
			    } else{
					echo "<p class='lead'><em>No records were found.</em></p>";
			    }
				mysqli_close($conn);
			?>
		</div>

			<div class="container-main">

			<?php
				include 'connectvars.php';

				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if (!$conn) {
					die('Could not connect: ' . mysql_error());
				}

			$query = "SELECT * FROM Categories ";

				$result = mysqli_query($conn, $query);
				if (!$result) {
					die("Query to show fields from table failed");
				}

				if(mysqli_num_rows($result) > 0){
					  echo "<h1>Categories</h1>";
				echo "<div style='overflow-x:auto';>";
				echo "<table class='table' id='t01' border='1'>";
			        echo "<thead>";
						echo "<tr>";
						echo "<th>CATEGORY</th>";
						echo "<th>MOVIES IN CATEGORY</th>";
						echo "</tr>";
			        echo "</thead>";
			        echo "<tbody>";

			        while($row = mysqli_fetch_array($result)){
				   		echo "<tr>";
						echo "<td>" . $row['CATEGORY'] . "</td>";
						echo "<td>" . $row['MOVIES_IN_CAT'] . "</td>";
						echo "</tr>";
			        }
			        echo "</tbody>";
				echo "</table>";
				echo "</div>";


			        mysqli_free_result($result);
			    } else{
					echo "<p class='lead'><em>No records were found.</em></p>";
			    }
				mysqli_close($conn);
			?>

		</div>
		</body>
	</head>
</html>
