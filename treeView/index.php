<?php 
include('../config.php');
session_start();
    if(!isset($_SESSION['user'])){  
        header("Location:../index.php");
    }else{
        $email=$_SESSION['user'];
        $query=mysqli_query($conn,"select * from user where email='$email'");
        $row=mysqli_fetch_array($query);
        if($_SESSION['user'] == $row['email']){

        }else{
            header("Location:../index.php");
        }
    }
    // Will go to login part if not logged in
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Tree Menu</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
    <style>
    </style>
    </head>
    <body>
    <br /><br />
    <div class="container" style="width:900px;">
    <h2 align="center">Here you can add items to menu, 
        <a href="../welcome.php">Go back</a>
        or 
        <a href="../logout.php">Log out</a>!</h2>
    <br /><br />
    <div class="row">
    <div class="col-md-6">
        <h3 align="center"><u>Add New Category</u></h3>
        <br />

        <form method="post" id="treeview_form">
            <div class="form-group">
                <label>Select Parent Category</label>
                <select name="parent_category" id="parent_category" class="form-control"></select>
            </div>
            <div class="form-group">
                <label>Enter Category Name</label>
                <input type="text" name="category_name" id="category_name" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
            </div>
        </form>

        <form method="post" id="treeview_form_2">
            <div class="form-group">
                <label>Delete Category</label>
                <select name="parent_category_2" id="parent_category_2" class="form-control"></select>
            </div>
            <div class="form-group">
                <input type="submit" name="action" id="action" value="Delete" class="btn btn-info" />
            </div>
        </form>

        <form method="post" id="treeview_form_3">
            <div class="form-group">
                <label>Select Old Category Name</label>
                <select name="parent_category_3" id="parent_category_3" class="form-control"></select>
            </div>
            <div class="form-group">
                <label>Enter New Category Name</label>
                <input type="text" name="category_name_2" id="category_name_2" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="action" id="action" value="Update" class="btn btn-info" />
            </div>
        </form>

    </div>
    <div class="col-md-6">
        <h3 align="center"><u>Category Tree</u></h3>
        <br />
        <div id="treeview"></div>
    </div>
    </div>
    </div>
    </body>
</html>
<script>

$(document).ready(function(){

    fill_parent_category();
    fill_parent_category_2();
    fill_parent_category_3();
    fill_treeview();

    function fill_treeview(){
        $.ajax({
            url:"fetch.php",
            dataType:"json",
            success:function(data){
                $('#treeview').treeview({
                    data:data
                });
            }
        })
    }

    function fill_parent_category(){
        $.ajax({
            url:'fill_parent_category.php',
            success:function(data){
                $('#parent_category').html(data);
            }
        });
    }

    function fill_parent_category_2(){
        $.ajax({
            url:'fill_parent_category.php',
            success:function(data){
                $('#parent_category_2').html(data);
            }
        });
    }
    function fill_parent_category_3(){
        $.ajax({
            url:'fill_parent_category.php',
            success:function(data){
                $('#parent_category_3').html(data);
            }
        });
    }

    $('#treeview_form').on('submit', function(event){
        event.preventDefault();
        console.log( $( this ).serialize() );
        $.ajax({
            url:"add.php",
            method:"POST",
            data:$(this).serialize(),
            success:function(data){
                fill_treeview();
                fill_parent_category();
                fill_parent_category_2();
                fill_parent_category_3();
                $('#treeview_form')[0].reset();
                alert(data);
            }
        })
    });

    $('#treeview_form_2').on('submit', function(event){
        // gives out category_id
        event.preventDefault();
        console.log( $( this ).serialize() );
        $.ajax({
            url: 'delete.php',
            method:"POST",
            data:$(this).serialize(),
            success:function(data){
                fill_treeview();
                fill_parent_category();
                fill_parent_category_2();
                fill_parent_category_3();
                $('#treeview_form_2')[0].reset();
                alert(data);
            }
        })
    });

    $('#treeview_form_3').on('submit', function(event){
        // gives out category_id
        event.preventDefault();
        console.log( $( this ).serialize() );
        $.ajax({
            url: 'update.php',
            method:"POST",
            data:$(this).serialize(),
            success:function(data){
                fill_treeview();
                fill_parent_category();
                fill_parent_category_2();
                fill_parent_category_3();
                $('#treeview_form_3')[0].reset();
                alert(data);
            }
        })
    });

});
</script>