<html>

<head>
    <title>Record Insert</title>

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
    /* .container{
        margin: 0;
        padding: 0;
    } */

    #laugh_icon{
        color: #FF8A33;
        /* height: 100px;
        width: 100px; */

    }
    h2 {
        text-align: left;
    }
</style>

<body>

    <?php include 'navbar.html' ?>
    <br><br>


    <?php


    //$student_id= $_GET["ITEM_ID"];
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];

    
    require_once('db_connect.php');
    $connect = mysqli_connect(HOST, USER, PASS, DB);
    


    mysqli_query($connect, "INSERT INTO adds_on(id,name,price) VALUES ($id,'$name',$price)")

        or die("Can not execute query");



    // echo " <h2 class='ui header' >Insertion Successful</h2>";

    // echo "<p><br><a href=menu_read.php> <button class='ui primary button'>
    //                             VIEW RECORD </button> </a></p>";



    ?>

<div class="container">
  <!-- Content here -->
  <div class="card text-center">
        <div class="card-header"></div>

        <div class="card-body">

            <i id="laugh_icon" class="fas fa-laugh"></i>
            <h1 class="card-title">Insertion Successful</h1>

            <a href="menu_read.php" class="btn btn-primary">VIEW RECORD</a>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
</div>
    

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>


</body>

</html>