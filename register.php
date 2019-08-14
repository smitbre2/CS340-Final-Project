<?php
	include "connectvars.php";
	include "header.php";

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if(!$conn) {
		die("Could not connect: " . mysql_error());
	}
	
	//Initialize values to be empty
	$username = NULL; 
	$password = "";
	$username_err = $password_err = "";
	if($_POST) {

		//check username for availability
	   	if(empty($_POST["username"])){
			$username_err = "Please enter a User ID.";
		}else{
			$username = $_POST["username"];
		}
		if(empty($_POST["password"])) {
			$password_err = "Please enter a password.";
		}else if(strlen(trim($_POST["password"])) < 5){
			$password_err = "Password must have at least 5 characters.";
		}else {
			$password = trim($_POST["password"]);
		}
		//Check DB for error before insert
		if(empty($username_err) && empty($password_err)){
		
		   $sql = "INSERT INTO User (ID, PASSWORD) VALUES ('$username', '$password')";
		   $result = mysqli_query($conn, $sql);

			if($result){
			   echo "<script type='text/javascript'>alert('IT WORKED');</script>";
			}else {
			   echo "<script type='text/javascript'>alert('Failed to register.');</script>";
			   mysqli_error($conn);	
			}
		}
		
	//close connection;
	mysqli_close($conn);
	}
?>
<!DOCTYPE HTML>
<head>
	<link rel="stylesheet" href = "main.css"
</head>
<body>

   <div class="wrapper">
	<h2>Sign Up</h2>
	<p>Fill out this form to register an account.</p>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class = "<?php echo(!empty($username_err)) ? 'has-error' : ''; ?>">
		   <label>Username</label>
		   <input type ="number" name="username" value="<?php echo $username;?>">
		   <span><?php echo $username_err; ?></span>
		</div>

		<div class = "<?php echo(!empty($password_err)) ? 'has-error' : ''; ?>">
		   <label>Password</label>
		   <input type="password" name = "password" value = "<?php echo $password; ?>">
		   <span><?php echo $password_err; ?></span>
	
		</div>
		<div>
		   <input type="submit" class="btn" value = "Submit">
		   <input type="reset" class = "btn" value = "Reset">
		</div>

		<p>Already have an account? <a href="login.php">Login here</a>.</p>
		
	</form>
   </div>

</body>
</html>
