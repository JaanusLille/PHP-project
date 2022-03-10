<?php

//delete.php

include('database_connection.php');

$dataA =  $_POST['parent_category_2'];

$ourElement = "SELECT FROM tbl_category WHERE category_id = $dataA";

$ourElementsChildren = "SELECT FROM tbl_category WHERE parent_category_id = $dataA";


    $result =  $connect->query("SELECT * FROM tbl_category WHERE parent_category_id = $dataA");
    $row_count = $result->rowCount();

if ($row_count >= 1) {  // if category has subcategories
    echo 'Please delete all subcategories first  ';
    // echo $row_count;
}else{      // if category does not have subcategories
    $statement = $connect->prepare("DELETE FROM tbl_category WHERE category_id = $dataA");
    $statement->execute();
    echo 'Category Deleted';
    // echo $row_count;
}

?>