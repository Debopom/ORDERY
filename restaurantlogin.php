<?php
   include_once 'dbconnect.php';
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = (int)$_POST['username'];
      $password =$_POST['pass'];

      echo $username.$password;
      
      $sql = "SELECT restaurant_id,restaurant_name FROM restaurant WHERE restaurant_id = '$username' and restaurant_password = '$password'";
      $rs = $conn-> query($sql);
      $data = mysqli_fetch_array($rs);
      
      $count = mysqli_num_rows($rs);
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['restaurant_name'] = $data[1];
         $_SESSION['restaurant_id'] = $data[0];
         
        header("Location: Restaurant side\index.php");
        exit();

         
      }else {
         echo '<script>alert("Your email or password is invalid!"); window.location.replace("restaurant-login")</script>'; 
      }
   }
?>