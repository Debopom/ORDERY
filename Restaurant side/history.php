<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <title>History</title>
</head>

<body>

    <?php include 'navbar.html' ?>

    <br></br>

    <?php
    include_once('test.php');
    session_start();
    if (isset($_POST['update'])) {
        $order_id = $_POST['order_id'];
        $status = $_POST['update'];
        $sql1 = "UPDATE orders SET order_status = '$status' WHERE order_id =$order_id";
        $rs1 = $conn->query($sql1);
        echo '<script>alert("Order has been updated..!")</script>';
    }

    $restaurant_id = $_SESSION['restaurant_id'];

    $sql = "SELECT * FROM orders As o JOIN customer AS c ON (o.customer_id = c.customer_id) WHERE restaurant_id =$restaurant_id";
    $rs = $conn->query($sql);
    ?>

    <!-- <table align="center" border="1px" style="width:600px; line-height:40px;">  -->
    <table class='ui unstackable collapsing table' style='margin:0 auto;'>
        <tr>
            <th colspan="4">
                <h2>View Past orders</h2>
            </th>
        </tr>
        <th>Order Details</th>
        <th>Order ID</th>
        <th>Total price</th>
        <th>Date and Time</th>
        

        </tr>
        <?php


        while ($rows = mysqli_fetch_array($rs)) {
        ?>
            <tr>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Order Details
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Customer name :  <?php echo $rows['customer_name'];?> <br>
                                    Table ID :  <?php echo $rows['table_id']; ?> <br>
                                    Items :  <?php echo $rows['details']; ?><br>
                                    Order Type :  <?php echo $rows['order_type']; ?>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td><?php echo $rows['order_id']; ?></td>
                <td><?php echo $rows['total_price']; ?></td>
                <td><?php echo $rows['order_date']; ?></td>
                <td></td>
                <td></td>

                <td>
                

                </td>

            </tr>

        <?php } ?>

        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
