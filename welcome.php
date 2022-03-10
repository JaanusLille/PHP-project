<?php 
include('config.php');
session_start();
    if(!isset($_SESSION['user'])){  
        header("Location:index.php");
    }else{
        $email=$_SESSION['user'];
        $query=mysqli_query($conn,"select * from user where email='$email'");
        $row=mysqli_fetch_array($query);
        if($_SESSION['user'] == $row['email']){

        }else{
            header("Location:index.php");
        }
    }
    // Will go to login part if not logged in
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
    <style>
    </style>
</head>
<body>
	<h1>Welcome <?php echo $email; ?></h1>
	<h1><a href="logout.php">Logout</a> or 
        <a href="treeView/index.php">Go to Tree menu</a></h1> 
</body>
</html>