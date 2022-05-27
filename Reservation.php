<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Reservation Request</title>
</head>
<body>
    <?php $restaurant_id = $_GET['restaurant_id'];
    echo $restaurant_id?>
    <div class="container" style="text-align: center;">
    <?php include 'navbar.html';
    session_start();
    
    $customer_id = $_SESSION['customer_id']; ?>
    
    <!--Form to add list starts here-->
    <br><br>
    
    <form class="ui form" style="max-width: 700px; margin:0 auto;" method = "post" action="reservation_confirm.php">

        <input type=hidden name=restaurant_id value='<?php echo $restaurant_id; ?>'>
        <input type=hidden name=customer_id value='<?php echo $customer_id; ?>'> <br>
        Reservation date <input type=date name=res_date value='Enter date'>
        <p>
            Time <input type=time name=res_time value='Enter time'>
        <p>
            Number of people <input type=text name=res_people placeholder='Enter number of people'>

    <br><br><button class="ui primary button" type="submit">Reservation Request</button><br></br>
    </form>
     
     <!--Form to add list ends here-->
     </div>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>
</html>





