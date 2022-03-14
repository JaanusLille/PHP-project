<?php
	// $servername = "localhost";
	// $username = "root";
	// $password = "";
	// $dbname = "login";

	// $servername = "localhost:3306";

	$servername = "localhost";
	$username = "id17948258_dbboss";
	$password = "REDACTED";
	$dbname = "id17948258_users";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if($conn->connect_error){
	    die("Connection failed: " . $conn->connect_error);
	}
?>

<!-- test-user data: 
username = "testuser1@test.ee"
password = "testuser1" -->