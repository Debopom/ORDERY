<?php


//$student_id= $_GET["ITEM_ID"];
$item_name = $_POST["ITEM_NAME"];
$desctiption = $_POST["DESCRIPTION"];
$price = $_POST["PRICE"];
$image = $_FILES['IMAGE']['name'];
echo 
$target = "images/".basename($image);
move_uploaded_file($_FILES['IMAGE']['tmp_name'], $target);

$availability = $_POST["AVAILABILITY"];


require_once('db_connect.php');

$connect = mysqli_connect(HOST, USER, PASS, DB)

    or die("Can not connect");
session_start();
$restaurant_id = (int) $_SESSION['restaurant_id'];


mysqli_query($connect, "INSERT INTO  menu (item_name,description,price,restaurant_id,availability,image) VALUES (

                         '$item_name',
                         '$desctiption',
                         '$price',
                         '$restaurant_id',
                         '$availability',
                         '$target')")

    or die("Can not execute query");



// echo " <h2 class='ui header' >Insertion Successful</h2>";

// echo "<p><br><a href=menu_read.php> <button class='ui primary button'>
//                             VIEW RECORD </button> </a></p>";



?>
