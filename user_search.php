<!DOCTYPE HTML>
<?php
	session_start();
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
  echo "Movie ID: " . $movie["MOVIE_ID"];
        echo '</p>';

	echo "<h3>Category: " . $movie["CATEGORY"] . "</h3>";
	echo "<h3>Rating: " . $movie["RATING"] . " / 5</h3>";
	echo "</div>";
	echo "</div>";

	mysqli_free_result($result);
?>

	<form  method="post">
	  <input type="submit" name="rent" value = "Rent"> 
	</form>

	<form method = "post">
	  <h3>Review this movie.</h3>
	  <div> 
		
	      <select name = "dropdown">
		<option value = "1" selected>1</option>
		<option value = "2">2</option>
		<option value = "3">3</option>
		<option value = "4">4</option>
		<option value = "5">5</option>
	      </select>
	      <textarea rows = "5" cols = "50" name = "review">
		Enter review here.
	      </textarea>
	      <input type="submit" name="submit_review" value="Submit Review">
	  </div>
	</form>


<!--Script below will check stock quantaties before allowing the user to rent-->
<!--A DB trigger/proc will need to be called when stock needs to be updated-->
<?php
	session_start();
	$stock_query = "SELECT STOCK FROM Inventory WHERE MOVIE_ID = $id";
	$result = mysqli_query($conn, $stock_query);

	if(!$result)
	   	die("Failed to query tables");

	//Process rent order
	if($_POST["Rent"]){
 	   $stock_count = mysqli_fetch_array($result);

	   if($stock_count[0] <= 0) {
		die("Movie is out of stock");
	   }else{
		echo "<p>Stock should be updated</p>";

	   }
	}

	//Proccess Review
	
	if($_POST['submit_review']){
	   //Check if logged in
	   if(!isset($_SESSION['user']))
	      die('Please log in first.');  

	   //if movie hasn't been reviewed proceed
	   $query = "SELECT USER_ID FROM Reviews WHERE MOVIE_ID = '" .$id .  "';";
	   $posts = mysqli_query($conn, $query);
	   $post_count = mysqli_num_rows($posts);

	   echo $post_count;

	   if($post_count < 1){
	  	 echo $post_count;
	$sql = "INSERT INTO Reviews (USER_ID, MOVIE_ID, RATING, REVIEW) VALUES ('" . $_SESSION['user'] . "' ,'$id', '" . $_POST['dropdown'] . "', '" . $_POST['review'] . "')";
	$rev=mysqli_query($conn, $sql);
        if(!$rev)
		 die('Failed to post review');
        else
		 echo "<script type='text/javascript'>alert('==Review Posted');</script>";
	   
	  }else{
		echo "<script type='text/javascript'>alert('You have already reviewed this film');</script>)";
	  }
}


?>
</body>

</html>
