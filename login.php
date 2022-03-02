<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<link rel="stylesheet" href="styling.css">
<script type="text/javascript"></script>
</head>
<body>

	<div id="box">
	<form action="confirmLogin.php" method="post">
		<h2><span></span> Login</h2>

		<div class="container">
			<label for="uname"><b>Username: </b></label><br><br>
			<input type="text" name="email" placeholder="username" required="" 
	  			value="<?php if(isset($_COOKIE["user_name"])) { echo $_COOKIE["user_name"]; } ?>" /><br><br>

			<label for="psw"><b>Password: </b></label><br><br>
			<input type="password" name="password" placeholder="password" required="" 
	  			value="<?php if(isset($_COOKIE["user_pass"])) { echo $_COOKIE["user_pass"]; } ?>"/><br><br>
				
			<input type="checkbox" name="remember" value="true"> <span>Remember me</span><br><br>
			<button type="submit" style="width:auto;">Login</button><br><br>
			<a href="signup.php" style="width:auto;">to Signup</a><br><br>
		</div>
		
	</form>
	</div>

</body>
</html>