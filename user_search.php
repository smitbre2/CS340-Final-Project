<!DOCTYPE HTML>
   <?php
	include 'connectvars.php';
	include 'header.php';
   ?>
<html>
	<head>
		<link href="main.css" rel="stylesheet" type="text/css">
	</head>
<body>

<?php
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$conn) {
		die('Could not connect: ' . msql_error());
	}

	$id = $_GET['id'];
	$query = "SELECT * FROM Movie WHERE MOVIE_ID = $id";
	$result = mysqli_query($conn, $query);

	if(!$result) {
		die("Query to show fields from table failed");
	}
	
	$movie = mysqli_fetch_array($result);
	echo "<div class='card'>";
	
	$img = file_get_contents('imgs/'. $movie["NAME"]);
	echo "<img src=$img";
	echo "style='width:25%'>";
	echo "<div class='container'>";
	echo "<h3><b>";
	echo $movie["NAME"];
	echo "</b></h3>";
	echo '<p>';
	echo $movie["DESCRIPTION"];
        echo '</p>';
	
	echo "<h3>Category: " . $movie["CATEGORY"] . "</h3>";
	echo "<h3>Rating: " . $movie["RATING"] . " / 5</h3>";
	echo "</div>";
	echo "</div>";

	mysqli_free_result($result);
?>

	<form  method="post">
	  <input type="submit" name="Rent" value = "rent"> 
	  <input type="submit" name="Cancel" value = "cancel">
	</form>


<!--Script below will check stock quantaties before allowing the user to rent--!>
<!--A DB trigger/proc will need to be called when stock needs to be updated--!>
<?php
	$stock_query = "SELECT STOCK FROM Inventory WHERE MOVIE_ID = $id";
	$result = mysqli_query($conn, $stock_query);

	if(!$result)
	   	die("Failed to query tables");

	if($_POST["Rent"]){
 	   $stock_count = mysqli_fetch_array($result);

	   if($stock_count[0] <= 0) {
		die("Movie is out of stock");
	   }else{
		echo "<p>Stock should be updated</p>";
	
	   }
	}else if($_POST["Cancel"]) {
		echo "<p>Rental cancelled</p>";
	}


?>
</body>

</html>
