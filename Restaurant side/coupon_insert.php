<?php
    include 'navbar.html';
    include_once 'test.php';
        $restaurant_id = $_POST['restaurant_id'];
        $coupon = $_POST['coupon'];
        $price = $_POST['price'];

        $sql3 ="INSERT INTO coupon (restaurant_id,coupon,percent) VALUES ($restaurant_id,'$coupon',$price)";
        $rs3 = $conn-> query($sql3);
        
?>
<div class="container">
  <!-- Content here -->
  <div class="card text-center">
        <div class="card-header"></div>

        <div class="card-body">

            <i id="laugh_icon" class="fas fa-laugh"></i>
            <h1 class="card-title">Insertion Successful</h1>

            <a href="menu_read.php" class="btn btn-primary">VIEW RECORD</a>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
</div>
    
