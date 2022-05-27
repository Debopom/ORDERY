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
    <title>Order Request</title>
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
                <h2>View the orders</h2>
            </th>
        </tr>
        <th>Customer Info</th>
        <th>Table ID</th>
        <th>Details</th>
        <th>Total price</th>
        <th>Order type</th>
        <th>Current Status</th>
        <th>Update Order Status</th>

        </tr>
        <?php


        while ($rows = mysqli_fetch_array($rs)) {
        ?>
            <tr>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Customer Details
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
                                    Customer Name : <?php echo $rows['customer_name']; ?><br>
                                    Customer Review : <?php echo $rows['customer_review']; ?>/5

                                    <form method="post" action="rating.php">
                                        <fieldset class="rating">
                                            <input id="demo-1" type="radio" name="demo" value="1">
                                            <label for="demo-1">1 star</label>
                                            <input id="demo-2" type="radio" name="demo" value="2">
                                            <label for="demo-2">2 stars</label>
                                            <input id="demo-3" type="radio" name="demo" value="3">
                                            <label for="demo-3">3 stars</label>
                                            <input id="demo-4" type="radio" name="demo" value="4">
                                            <label for="demo-4">4 stars</label>
                                            <input id="demo-5" type="radio" name="demo" value="5">
                                            <label for="demo-5">5 stars</label>

                                            <div class="stars">
                                                <label for="demo-1" aria-label="1 star" title="1 star"></label>
                                                <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
                                                <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
                                                <label for="demo-4" aria-label="4 stars" title="4 stars"></label>
                                                <label for="demo-5" aria-label="5 stars" title="5 stars"></label>
                                            </div>
                                            <input type="hidden" name="customer_id" value="<?php echo $rows['customer_id'];?>">
                                            <input type="submit" value="Submit">
                                        </fieldset>

                                        <script>
                                            (function() {
                                                var rating = document.querySelector('.rating');
                                                var handle = document.getElementById('toggle-rating');
                                                handle.onchange = function(event) {
                                                    rating.classList.toggle('rating', handle.checked);
                                                };
                                            }());
                                        </script>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td><?php echo $rows['table_id']; ?></td>
                <td><?php echo $rows['details']; ?></td>
                <td><?php echo $rows['total_price']; ?></td>
                <td><?php echo $rows['order_type']; ?></td>
                <td><?php echo $rows['order_status']; ?></td>

                <td>
                    <form name="update" action="order_request.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $rows['order_id']; ?>">
                        <select name="update" class="form-select">
                            <option selected>Open this select menu</option>
                            <option value="accepted">Accept</option>
                            <option value="declined">Decline</option>
                            <option value="preparing">Prepare</option>
                            <option value="ready">Ready to deliver</option>
                            <option value="delivered">delivered</option>

                        </select>
                        <div class="text-center my-4"> <input type="submit" value="Submit"> </div>
                    </form>

                </td>

            </tr>

        <?php } ?>

        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<style>.rating input[type="radio"]:not(:nth-of-type(0)) {
        /* hide visually */    
        border: 0;
        clip: rect(0 0 0 0);
        height: 5px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .rating [type="radio"]:not(:nth-of-type(0)) + label {
        display: none;
    }
    
    label[for]:hover {
        cursor: pointer;
    }
    
    .rating .stars label:before {
        content: "★";
    }
    
    .stars label {
        color: lightgray;
    }
    
    .stars label:hover {
        text-shadow: 0 0 1px #000;
    }
    
    .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
    .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
    .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
    .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
    .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
        color: orange;
    }
    
    .rating [type="radio"]:nth-of-type(1):focus ~ .stars label:nth-of-type(1),
    .rating [type="radio"]:nth-of-type(2):focus ~ .stars label:nth-of-type(2),
    .rating [type="radio"]:nth-of-type(3):focus ~ .stars label:nth-of-type(3),
    .rating [type="radio"]:nth-of-type(4):focus ~ .stars label:nth-of-type(4),
    .rating [type="radio"]:nth-of-type(5):focus ~ .stars label:nth-of-type(5) {
        color: darkorange;
    }</style>