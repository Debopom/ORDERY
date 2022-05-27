<?php
   include_once 'dbconnect.php';
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = $_POST['username'];
      $password =$_POST['pass'];
      
      $sql = "SELECT customer_id ,customer_name FROM customer WHERE customer_email = '$username' and customer_password = '$password'";
      $rs = $conn-> query($sql);
      $data = mysqli_fetch_array($rs);
      
      $count = mysqli_num_rows($rs);
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['customer_id'] = $data[0];
         $_SESSION['customer_name'] = $data[1];
         
        header("Location: landing");
        exit();

         
      }else {
         
         echo '<script>alert("Your email or password is invalid!"); window.location.replace("user-login")</script>'; 
      }
   }
?>