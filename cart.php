<!DOCTYPE html>
<?php
	include 'connectvars.php';
	include 'header.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	if(isset($_POST['saveRent'])){

    $movie_id = trim($_POST["movie_id"]);
    if(empty($movie_id)){
        $movie_id_err = "Please enter movie_id.";
    } elseif(!ctype_digit($movie_id)){
        $movie_id_err = "Please enter a positive integer value of id.";
    }


    $user_id = trim($_POST["user_id"]);
    if(empty($user_id)){
        $user_id_err = "Please enter user_id.";
    } elseif(!ctype_digit($user_id)){
        $user_id_err = "Please enter a positive integer value of id.";
			}

		if(empty($user_id__err) && empty($movie_id_err)){

	        $sql = "INSERT INTO Rented (USER_ID, MOVIE_ID, CURR_DATE) VALUES('$user_id', '$movie_id', default)";

	        if($stmt = mysqli_prepare($conn, $sql)){
	            mysqli_stmt_bind_param($stmt, "isdi", $param_user_id, $param_movie_id);

	            // Set parameters
				      $param_user_id = $user_id;
	            $param_movie_id = $movie_id;

	            if(mysqli_stmt_execute($stmt)){
	                header("location: index.php");
	                exit();
	            } else{
	                echo "Duplicate record";
						}
					}
		}
	}

	if(isset($_POST['saveReturn'])){

    $movie_id = trim($_POST["movie_id"]);
    if(empty($movie_id)){
        $movie_id_err = "Please enter movie_id.";
    } elseif(!ctype_digit($movie_id)){
        $movie_id_err = "Please enter a positive integer value of id.";
    }


    $user_id = trim($_POST["user_id"]);
    if(empty($user_id)){
        $user_id_err = "Please enter user_id.";
    } elseif(!ctype_digit($user_id)){
        $user_id_err = "Please enter a positive integer value of id.";
    }

		if(empty($user_id__err) && empty($movie_id_err)){

	        $sql = "DELETE FROM Rented WHERE USER_ID = '$user_id' AND MOVIE_ID = '$movie_id'";

					if($stmt = mysqli_prepare($conn, $sql)){

							mysqli_stmt_bind_param($stmt, "i", $param_user_id, $param_movie_id);

				      $param_user_id = trim($_POST["USER_ID"]);
	            $param_movie_id = trim($_POST["MOVIE_ID"]);

							if(mysqli_stmt_execute($stmt)){
									header("location: index.php");
									exit();
							} else{

									echo "Error deleting the Rent";
							}
					}
		}
	}

	mysqli_close($conn);

?>

<html>
	<head>
		<title>Checkout</title>
		<link rel="stylesheet" href="main.css">
	</head>
<body>
	<p>RENT</p>
		<form action="" method="POST">
			<div>
				<label>user_id</label>
				<input type="text" name="user_id" value = "">
			</div>
			<div>
				<label>movie_id</label>
				<input type="text" name="movie_id" value="">
			</div>
			<button type="submit" name = "saveRent">Rent!</button>
		</form>
	<p>RETURN</p>
		<form action="" method="POST">
			<div>
				<label>user_id</label>
				<input type="text" name="user_id" value = "">
			</div>
			<div>
				<label>movie_id</label>
				<input type="text" name="movie_id" value="">
			</div>
			<button type="submit" name = "saveReturn">Return!</button>
		</form>



</body>

</html>
