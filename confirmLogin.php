<?php
	include('config.php');	
	session_start();

    // 86400 = 1 päev (86400*30 = 1 kuu)
    $expiry = time() + (86400 * 30);
    $error = "";
	$email=$_POST['email'];
	$password=$_POST['password'];
    $remember = $_POST['remember'];
    // siin hash-itakse: 
    $hashedPassword = hash('sha1', $password);
	$q=mysqli_query($conn,"SELECT * FROM `user` where `email`='$email' AND
        `password`='$hashedPassword' ") or die(mysqli_error());

	$user=mysqli_fetch_array($q);
	$no=mysqli_num_rows($q);

	if($no == 1){
    	if($user['email'] == $email AND $user['password'] == $hashedPassword){
            if($remember == 'true'){
                // cookie variable
                $plainPassword=$_POST['password'];
                setcookie('user_name', $email, $expiry);
                setcookie('user_pass', $plainPassword, $expiry);
            }

            $_SESSION['user']= $user['email'];
            header("location: welcome.php");   
     	}else{
            header("location: errors/error.php");
            // $error = "wrong username and/or password!";
            // print_r("wrong username and/or password!");
            // echo "wrong username and/or password!";
     	}
    }else{
        header("location: errors/error.php");	
        // $error = "wrong username and/or password!";
        // print_r("wrong username and/or password!");
        // echo "wrong username and/or password!";
    }
?>