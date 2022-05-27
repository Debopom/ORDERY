<html>

<head>
    <title>Update Result</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

</head>

<style>
    h2 {
        text-align: left;
    }

     /* .container{
        margin: 0;
        padding: 0;
    } */

    #laugh_icon{
        color: #FF8A33;
        /* height: 100px;
        width: 100px; */

    }
</style>

<body>

<?php include 'navbar.html' ?>
    <br><br>

    <!-- <h2 class="ui header">RECORD UPDATED</h2> -->


    <?php


    $item_id = $_POST["item_id"];
    $item_name = $_POST["item_name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $restaurant_id = $_POST["restaurant_id"];
    
    $availability = $_POST["availability"];
    $image = $_FILES['IMAGE']['name'];
    $target = "images/".basename($image);
    move_uploaded_file($_FILES['IMAGE']['tmp_name'], $target);

    require_once('db_connect.php');

    $connect = mysqli_connect(HOST, USER, PASS, DB)

        or die("Can not connect");

    $query     = "UPDATE menu SET item_name='$item_name', 
                                  description ='$description',
                                  price='$price',
                                  restaurant_id=$restaurant_id,
                                  availability='$availability',
                                  image = '$target'


							WHERE id = $item_id";

    //echo $query;



    mysqli_query($connect, $query)

        or die("Can not execute query");


    // echo "<p>               <br> Item ID = $item_name 
    //                         <br> Description = $description 
    //                         <br> Price = $price  ";


    // echo "<p><a href=menu_read.php> <button class='ui primary button'>
    // READ ALL RECORDS </button> </a></p>";

    ?>


<div class="container">
  <!-- Content here -->
  <div class="card text-center">
        <div class="card-header"></div>

        <div class="card-body">

            <i id="laugh_icon" class="fas fa-laugh"></i>
            <h1 class="card-title">Successfully Updated</h1>

            <a href="menu_read.php" class="btn btn-primary">VIEW RECORD</a>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
</div>

</body>

</html>