<?php
include_once 'dbconnect.php';

if (isset($_POST['demo'])) {  // if ANY of the options was checked
    $rating=$_POST['demo'];
    $restaurant_id= $_POST['restaurant_id'];
    $sql1 = "SELECT * FROM restaurant WHERE restaurant_id=$restaurant_id;";
    $rs2 = $conn->query($sql1);
    $data = mysqli_fetch_array($rs2);
    $old_review = $data['restaurant_review'];
    echo $old_review;
    echo $rating;
    $new_rating = ($old_review + $rating)/2;
    echo $new_rating;

    $sql4 = "UPDATE restaurant SET restaurant_review = $new_rating WHERE restaurant_id=$restaurant_id;";
    $rs4 = $conn->query($sql4);
    echo '<script>alert("Thank you for the feedback"); window.location.replace("instascan-master/docs")</script>';
} 
else
    echo "nothing was selected.";

?>