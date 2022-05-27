<html>

<head>
    <title>Menu </title>


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
        text-align: center;
    }
</style>

<body>

    <?php include 'navbar.html' ?>

    <br></br>

    <?php

    session_start();
    $restaurant_id = (int) $_SESSION['restaurant_id'];

    require_once('db_connect.php');
    $connect = mysqli_connect(HOST, USER, PASS, DB)
        or die("Can not connect");


    $results = mysqli_query($connect, "SELECT * FROM menu WHERE restaurant_id =$restaurant_id")
        or die("Can not execute query");




    echo "<table class='ui unstackable collapsing table' style='margin:0 auto;'> \n";

    echo
    "<thead><tr><th>ID</th>
          <th>Item Name</th>
          <th>Description</th>
          <th>Price</th>
		
                

          <th>Delete</th> 
          <th>Update</th>
          <th>Edit Adds-On</th>
          </tr></thead> <tbody>\n";



    while ($rows = mysqli_fetch_array($results)) {
        extract($rows);
        echo "<tr>";
        echo "<td> $id </td>";
        echo "<td> $item_name </td>";
        echo "<td> $description</td>";
        echo "<td> $price </td>";
        // echo "<td> $RESTAURANT_ID </td>";
        // echo "<td> $AVAILABILITY </td>";


        echo "<td> <a href = 'menu_delete.php?id=$id'> Delete </a> </td>";
        echo "<td> <a href = 'menu_update_input.php?id=$id
		                                            &item_name=$item_name
													&description=$description
													&price=$price
                                                    &image=$image'>
													Update </a> </td>";
        echo "<td> <a href = 'adds_on.php?id=$id'>
													Update Adds-On </a> </td>";
        echo "</tr> \n";
    }

    echo "</tbody></table> \n";

    echo "<p style='text-align: center;'><br><a href=menu_create.php>
	<button class='ui primary button' style='margin 0 auto;'>
	             Add New Item
			  </button></a></p>";
    
    ?>
    <p style='text-align: center;'><br><a href=coupon_create.php?restaurant_id=<?php echo $restaurant_id ?>>
        <button class='ui primary button' style='margin 0 auto;'>
                           Add a counpon
                        </button></a></p>";


 <!-- MDB -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>

</html>