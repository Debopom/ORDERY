<?php
include_once 'dbconnect.php';

if (isset($_POST['demo'])) {  // if ANY of the options was checked
    $rating=$_POST['demo'];
    $customer_id= $_POST['customer_id'];
    $sql1 = "SELECT * FROM customer WHERE customer_id=$customer_id;";
    $rs2 = $conn->query($sql1);
    $data = mysqli_fetch_array($rs2);
    $old_review = $data['customer_review'];
    echo $old_review;
    echo $rating;
    $new_rating = ($old_review + $rating)/2;
    echo $new_rating;

    $sql4 = "UPDATE customer SET customer_review = $new_rating WHERE customer_id=$customer_id";
    $rs4 = $conn->query($sql4);
    echo '<script>alert("Thank you for the feedback"); window.location.replace("order_request.php")</script>';
} 
else
    echo "nothing was selected.";

?>