<?php
    include_once 'dbconnect.php';

   
    //get the values from the form ans save it in the variables
      $res_date = $_POST['res_date'];
      $res_time = $_POST['res_time'];
      $res_people = $_POST['res_people'];
      $restaurant_id = $_POST['restaurant_id'];
      $customer_id = $_POST['customer_id'];
       echo $res_date;
       echo $res_time;
       echo $res_people;
      //connect databa
      
      
     

      //Check database connected or not
      //check the db is connected or not
      /*if($db_select==true)
      {
          echo "DAtabase selected";
      }
      */
      //Sql Query to insert into thje db
      $sql = "INSERT INTO reservation (restaurant_id,customer_id,res_date, res_time, res_people, res_status)VALUES ($restaurant_id,$customer_id,'$res_date', '$res_time', $res_people,'pending')";

      //Execute Query And insert into the db
      $rs = $conn-> query($sql);
      //Query ok or not

      if($rs){
        echo '<script>alert("Reservation requested"); window.location.replace("restaurant_search.php")</script>'; 
    }
    
?>