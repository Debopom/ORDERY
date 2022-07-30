<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirm</title>


    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

    <style>
        body {

            background-image: url('https://as1.ftcdn.net/v2/jpg/02/94/21/86/1000_F_294218689_yJZmTdwqM4Yez5bAPPGnXulyhlfTeaUT.jpg');
        }
    </style>
</head>

<body>


    <div class="container-fluid">
        



        <?php
        include_once 'dbconnect.php';
        include 'navbar.html';
        session_start();
        $table_id = $_GET["table_id"];
        $customer_id = $_GET['customer_id'];

        $restaurant_id = $_GET['restaurant_id'];
        $details = $_GET['details'];
        $total_price = $_GET['total_price'];
        $sql1 = "SELECT * FROM `tables` WHERE table_id=$table_id AND restaurant_id =$restaurant_id ";

        $rs1 = $conn-> query($sql1);
        $data1 =mysqli_fetch_array($rs1);
        $table_type =  $data1['table_type'];
        $today = date("Y-m-d H:i:s");

        $sql = "INSERT INTO orders (order_status,customer_id,details,restaurant_id,total_price , table_id,order_type,order_date) VALUES ('pending',$customer_id, '$details' , $restaurant_id , $total_price ,$table_id,'$table_type', '$today'); ";
        $rs = $conn->query($sql);
        if ($rs) {
        ?> <div class="text-center my-4">
                <h1>Order placed succesfully</h1>
            </div>
        <?php
            $last_id = (int)$conn->insert_id;
        }





        ?>
        <div class="text-center my-4">
            <h1>Click here to track your current order</h1>
        </div>
        <form name="update" action="order_track.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $last_id; ?>">

            </select>
            <!-- <div class="text-center my-4"> <input type="submit" value="Track"> </div> -->
            <input type="submit" class="btn btn-primary btn-rounded" style="margin-left: 720px;" value="Track Order">
        </form>

    </div>




    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js">
    </script>


</body>

</html>