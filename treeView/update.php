<?php

//update.php

include('database_connection.php');

$category_id =  $_POST['parent_category_3'];
$newName =  $_POST['category_name_2'];


// $query = "UPDATE tbl_category SET category_name = $newName 
//     WHERE category_id = $category_id";


// $statement = $connect->prepare("UPDATE tbl_category SET category_name = $newName 
//     WHERE category_id = $category_id");

$statement = $connect->prepare("UPDATE tbl_category 
    SET category_name = '$newName'
    WHERE category_id = $category_id");

$statement->execute();
echo 'Category name changed ';


?>