

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
  rel="stylesheet"
/>

    <title>Document</title>

    <style>
      
    </style>
</head>
<body>
    

<?php
include_once 'dbconnect.php';


    session_start();
    $order_id = $_POST['order_id'];
    $table_id = $_SESSION ['table_id'];
    $restaurant_id = $_SESSION['restaurant_id'];
    if(isset($_POST['call'])){
        $sql2 = "UPDATE tables SET status = 'calling' WHERE table_id = $table_id AND restaurant_id = $restaurant_id;";
        $rs = $conn-> query($sql2); 
        if($rs){
            echo '<script>alert("Your request has been placed. Restaurant will respond soon!")</script>';
        }
    
    }
	

    $sql1 ="SELECT order_status FROM orders WHERE order_id=$order_id;";
        $rs2 = $conn-> query($sql1);
        $data = mysqli_fetch_array($rs2);
        $status = $data['order_status'];
        echo $status;

        
?>
<div class="container-fluid">
<div class="card text-center">
  <div class="card-header"></div>
  <div class="card-body">
  <form name="form" action="order_track.php" method="post">
        <input type="hidden" name="order_id" value= <?php echo $order_id ?>>
		<!-- <input type="submit" name="call" value="Call Waiter"> -->
        <button class="ui primary button" type="submit">Call Waiter</button>
</form>
  </div>
  <div class="card-footer text-muted"></div>
</div>
</div>



</body>
</html>





