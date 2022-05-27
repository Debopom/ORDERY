<html>

<head>
    <title> CREATE Menu</title>

    <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

</head>

<body>

<?php 
    include 'navbar.html';
    include_once 'test.php';
    $restaurant_id = $_GET['restaurant_id'];
    
    ?>

    <br></br>

    <form method="POST" class="ui form" style="max-width: 700px; margin:0 auto;" action="coupon_insert.php" >

        <h4 class="ui dividing header">ADD COUPON</h4>

        <input type="hidden" name="restaurant_id" value ="<?php echo $restaurant_id;?>">
        

        <div class="field">
            <label></label>
            <input type=text name="coupon" placeholder="Coupon value">
        </div>

        <div class="field">
            <label></label>
            <input type=text name="price" placeholder="Percentage of deduction">
        </div>

        <button class="ui primary button" type="submit">Add</button>
    </form>

  	


     <!-- MDB -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

</body>

</html>