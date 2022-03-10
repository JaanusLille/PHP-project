<?php 
    session_start();
    include('config.php');	

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		$email=$_POST['email'];
	    $password_1=$_POST['password'];

		$password = hash('sha1', $password_1);

		$existingE=mysqli_query($conn,"SELECT * FROM `user` where `email`='$email'");
		$existingP=mysqli_query($conn,"SELECT * FROM `user` where `password`='$password' ");

		$noE=mysqli_num_rows($existingE);
		$noP=mysqli_num_rows($existingP);

		if($noE > 0){
			header("Location: errors/emailError.php");
			die;
		}
		if($noP > 0){
			header("Location: errors/passwordError.php");
			die;
		}

		if(!empty($email) && !empty($password) && !is_numeric($email)){

			//save to database
			// $user_id = random_num(20);
			// $password = hash('sha1', $password_1);
			$query = "insert into user (email,password) values ('$email','$password')";

			mysqli_query($conn, $query);

			header("Location: index.php");
			die;
		}else{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
<link rel="stylesheet" href="styling.css">
</head>
<body>

	<style type="text/css">
	</style>

    <div id="box">
	<form method="post">
		<h2><span></span> Signup</h2>
		<div class="container">
			<label for="uname"><b>Username: </b></label><br><br>
			<input type="text" name="email" placeholder="username" required=""/><br><br>

			<label for="psw"><b>Password: </b></label><br><br>
			<input type="password" name="password" placeholder="password" required="" /><br><br>
				
			<button type="submit" style="width:auto;">Signup</button><br><br>
            <a href="index.php" style="width:auto;">to Login</a>
		</div>
	</form>
	</div>

</body>
</html>