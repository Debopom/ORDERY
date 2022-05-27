<?php
    session_start();
    $restaurant_id =$_SESSION['restaurant_id'];
    
    //get the values from the form ans save it in the variables
        $table_num = $_POST['table_num'];
      $table_code = $_POST['table_code'];
      $table_type = $_POST['table_type'];
      echo $table_type;
      //connect database
      $conn = mysqli_connect('localhost','root','') ;
      //Check database connected or not
      /*if($conn==true)
      {
          echo "Database connected";
      }
      */
      //Selectdatabase
      $db_select = mysqli_select_db($conn,'ordery');
      //check the db is connected or not
      /*if($db_select==true)
      {
          echo "DAtabase selected";
      }
      */
      //Sql Query to insert into thje db
      $sql = "INSERT INTO tables SET
      table_num = '$table_num',
      table_id = '$table_code',
      table_type = '$table_type',
      restaurant_id = $restaurant_id
      ";
      //Execute Query And insert into the db
      $res = mysqli_query($conn, $sql);
      //Query ok or not
      if($res==true)
      {
        echo '<script>alert("Table inserted"); window.location.replace("Add_table.php")</script>'; ;
      }
      else{
          echo "failed to insert";
      }
?>
