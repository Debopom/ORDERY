<?php

session_start();
$database_name = "ordery";
$con = mysqli_connect("localhost", "root", "", $database_name);
$discounted = 0;
$discount = 0;
$restaurant_id = $_GET['restaurant_id'];
$_SESSION['restaurant_id'] = $restaurant_id;
if (isset($_POST["coupon_sub"])) {
    $coupon = $_POST["coupon"];
    $query1 = " SELECT * FROM coupon WHERE coupon = '$coupon' AND restaurant_id = $restaurant_id";
    $result1 = mysqli_query($con, $query1);
    if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_array($result1);
        $discount = $row1['percent'] / 100;
        echo '<script>alert("coupon accepted")</script>';
        
    }
}

if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $adds_on_total = 0;
            $item_w_add = "";
            if(isset($_POST['adds_on'])){
                $adds_on = $_POST['adds_on'];
                
                foreach ( $adds_on as $selected){
                    $explode = explode(',', $selected);
                    $adds_on_total = $explode[0]+$adds_on_total;
                    $item_w_add .=$explode[1]."&";

                }
                if(isset($item_w_add)){
                    $item_w_add =""." With extra ".$item_w_add;
                }
                $item_w_add = substr_replace($item_w_add, "", -1);
            }
                
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"].$item_w_add,
                'product_price' => $_POST["hidden_price"]+$adds_on_total,
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            //echo '<script>window.location="menu.php"</script>';
        } else {
            //echo '<script>alert("Product is already Added to Cart")</script>';
            //echo '<script>window.location="menu.php?restaurant_id=432342"</script>';
        }
    } else {
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $value) {
            if ($value["product_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                //echo '<script>alert("Product has been Removed...!")</script>';
                //echo '<script>window.location="menu.php"</script>';
            }
        }
    }
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <title>Menu</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"referrerpolicy="no-referrer" />

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        * {
            font-family: 'Titillium Web', sans-serif;
        }

        .product {
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }

        table,
        th,
        tr {
            text-align: center;
        }

        .title2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        h2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        table th {
            background-color: #efefef;
        }
        .dropdown-toggle{
            max-width: 150px;
        }
    </style>
</head>

<body>

    <?php include 'navbar.html' ?>



    <div class="container" style="width: 65%">
        <h2>Menu</h2>
        <?php

        $query = "SELECT * FROM menu WHERE restaurant_id = $restaurant_id";
        $result = mysqli_query($con, $query);
        
        //$query1 = "SELECT restaurant_id FROM menu WHERE id = $restaurant_id";
        //$result1 = mysqli_query($con,$query1);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

        ?>
                <div class="col-md-3">

                    <form method="post" action="menu.php?restaurant_id=<?php echo $restaurant_id ?>&action=add&id=<?php echo $row["id"]; ?>">

                        <div class="product">
                            <img src="<?php echo "Restaurant side/".$row["image"]; ?>" class="img-responsive">
                            <h5 class="text-info"><?php echo $row["item_name"]; ?></h5>
                            <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                            <input type="text" name="quantity" class="form-control" value="1">
                            <?php 
                            $id = $row["id"];
                            $query3 = "SELECT * FROM adds_on WHERE id = $id;";
                            $result3 = mysqli_query($con, $query3);?>
                            <div class="h4"> Please select available adds on</div>
                            <div class = "select">
                                <select id = "adds_on" name="adds_on[]" class="selectpicker" multiple aria-label="size 3 select example">
                                <?php 
                                    
                                        while ($row3 = mysqli_fetch_array(
                                                $result3,MYSQLI_ASSOC)):; 
                                    ?>
                                        <option value="<?php echo $row3["price"];?>,<?php echo $row3["name"];?> ">
                                            <?php echo $row3["name"]." X ".$row3["price"] ;
                                            ?>
                                        </option>
                                    <?php 
                                        endwhile; 
                                    ?>
                            </select></div>
                            
                            <input type="hidden" name="hidden_name" value="<?php echo $row["item_name"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                           

                            <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                        </div>
                    </form>
                </div>
        <?php
            }
        }
        ?>

        <div style="clear: both"></div>
        <h3 class="title2">Order Cart Details</h3>
        <div class="table-responsive">
            <!-- <table class="table table-bordered"> -->
            <table class='ui unstackable collapsing table' style='margin:0 auto;'>
                <tr>
                    <th width="30%">Food</th>
                    <th width="10%">Quantity</th>
                    <th width="13%">Price Details</th>
                    <th width="10%">Total Price</th>
                    <th width="17%">Remove Item</th>
                </tr>

                <?php
                $item_names = "";


                if (!empty($_SESSION["cart"])) {
                    $subtotal = 0;
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                ?>
                        <tr>
                            <td><?php $item_names .= $value["item_name"] . "X" . $value["item_quantity"] . "\n";
                                echo $value["item_name"] ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="menu.php?action=delete&id=<?php echo $value["product_id"] ?>&restaurant_id=<?php echo $restaurant_id ?>"><span class="text-danger">Remove Item</span></a></td>

                        </tr>
                    <?php
                        $subtotal = $subtotal + ($value["item_quantity"] * $value["product_price"]);
                    }
                    $discounted = ($discount * $subtotal);
                    $total = $subtotal - $discounted;
                    // echo $subtotal.$total.$discounted;
                    ?>


                    <tr>
                        <td colspan="3" align="right">Subtotal</td>
                        <th align="right">$ <?php echo number_format($subtotal, 2); ?></th>
                        <td></td>
                    </tr>


                    <?php
                    if ($discounted > 0) { ?>
                        <tr>
                            <td colspan="3" align="right">Discount</td>
                            <th align="right">$ <?php echo number_format($discounted, 2); ?></th>
                            <td></td>
                        </tr>
                    <?php
                    }
                    if ($discounted > 0) { ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
            <form method="post" action="menu.php?restaurant_id=<?php echo $restaurant_id ?>">

                <div class="product">
                    <input type="text" name="coupon" placeholder="Enter Coupon">
                    <input type="submit" name="coupon_sub" style="margin-top: 5px;" class="btn btn-success" value="add">
                </div>
            </form>
            <?php
            $table_id = $_SESSION["table_id"];
            $customer_id = $_SESSION['customer_id'];?>


            <div class="text-center my-4"> <button class="btn-primary btn"><a href="order.php?details=<?php echo $item_names ?>&restaurant_id=<?php echo $restaurant_id ?>&total_price=<?php echo $total ?>&table_id=<?php echo $table_id ?>&customer_id=<?php echo $customer_id ?>" class="text-white">Cash Payment</a> </button> </div>
            <div class="text-center my-4"> <button class="btn-primary btn"><a href="checkout.php?details=<?php echo $item_names ?>&restaurant_id=<?php echo $restaurant_id ?>&total_price=<?php echo $total ?>&table_id=<?php echo $table_id ?>&customer_id=<?php echo $customer_id ?> " class="text-white">Complete Payment </a> </button> </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>

