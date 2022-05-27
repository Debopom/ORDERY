<?php
session_start();
    include_once('test.php');
	$restaurant_id = $_SESSION['restaurant_id'];
	if(isset($_POST['respond'])){
		$table_id = $_POST['table_id'];
		$sql1 = "UPDATE tables SET status = 'not-calling' WHERE table_id = $table_id AND restaurant_id = $restaurant_id;";
    	$rs = $conn-> query($sql1);
		echo '<script>alert("Your request has been placed. Restaurant will respond soon!")</script>'; 
		header("Location: tables.php");

	}
	
  
?>