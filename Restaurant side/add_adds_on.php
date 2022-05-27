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

<?php include 'navbar.html';
    $id = $_GET['id'];
    ?>

    <br></br>

    <form method="POST" class="ui form" style="max-width: 700px; margin:0 auto;" action=adds_on_result.php enctype="multipart/form-data">

        <h4 class="ui dividing header">ADD NEW ITEM TO MENU</h4>

        <!-- ITEM_ID	ITEM_NAME	DESCRIPTION	PRICE	RESTAURANT_ID	AVAILABILITY	 -->
        <div class="field">
            <label></label>
            <input type=hidden name="id" value = "<?php echo $id;?>" placeholder="Not Required">
        </div>

        <div class="field">
            <label></label>
            <input type=text name="name" placeholder="Adds on name">
        </div>

        <div class="field">
            <label></label>
            <input type=text name="price" placeholder="Price">
        </div>

        


        <button class="ui primary button" type="submit">Submit</button>

  	


     <!-- MDB -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

</body>

</html>