<html>

<head>
    <title>Update Form</title>

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

    <?php include 'navbar.html' ?>
    <br></br>

    <?php
    session_start();
    $restaurant_id = $_SESSION['restaurant_id'];
    

    // error_reporting(0);

    $item_id = $_GET["id"];
    $item_name = $_GET["item_name"];
    $description = $_GET["description"];
    $price = $_GET["price"];
    $image = $_GET["image"];
    // $restaurant_id = $_GET["restaurant_id"];
    // $availability = $_GET["availability"];

    ?>



<form method="POST" class="ui form" style="max-width: 700px; margin:0 auto;" action=menu_update_result.php enctype="multipart/form-data">

        <h4 class="ui dividing header">Edit Your Menu Here</h4>

        <input type=hidden name=item_id value='<?php echo $item_id; ?>'> <br>

        Item Name <input type=text name=item_name value='<?php echo $item_name; ?>'>
        <p>
            Description <input type=text name=description value='<?php echo $description; ?>'>
        <p>
            Price <input type=text name=price value='<?php echo $price; ?>'>

            <input type=hidden name=restaurant_id value='<?php echo $restaurant_id; ?>'>
            <input type=hidden name=availability value='<?php echo $availability; ?>'>
            
            <div>
                <img src="<?php echo $image;?>" alt="" srcset="">
                <input type="file" name="IMAGE">
            </div>



            <br><button class="ui primary button" type="submit">UPDATE</button><br></br>

    </form>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>

</html>