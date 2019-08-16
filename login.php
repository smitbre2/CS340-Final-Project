<?php
session_start();

include 'header.php';
include 'connectvars.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$conn) {
	die('Could not connect: ' . mysql_error());
}

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
	header("location: index.php");
	// exit;
}

$username = NULL;
$password = "";
$username_err = $password_err = "";

if($_POST) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = $_POST['password'];

	$sql = "SELECT USER_ID FROM User WHERE USER_ID = '$username' AND PASSWORD = '$password'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);

	if($count == 1){

		echo "<script type='text/javascript'>alert('==Logged In');</script>";
		$_SESSION['loggedin'] = true;
		$_SESSION['user'] = $username;

		header("location: index.php");
	}else{
		echo "<script type='text/javascript'>alert('Incorrect Name or Password');</script>";
	}
}
?>

<!DOCTYPE HTML>
<html>
	<link rel="stylesheet" href="main.css">
	<body>
		<h2>Login</h2>
		<p>Please fill in your account details.</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
				<label>Username</label>
				<input type = "number" name="username" value="<?php echo $username; ?>">
				<span><?php echo $username_err; ?></span>
			   </div>
			   <div class = "<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
				<label>Password</label>
				<input type = "password" name = "password">
				<span><?php echo $password_err; ?></span>
			   </div>
			   <div>
			   	<input type="submit" class="btn" value="Login">
			   </div>
			 </form>
		 </body>
</html>
