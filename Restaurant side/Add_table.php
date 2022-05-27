<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Table</title>
</head>
<body>
    
    <!--Form to add list starts here-->
    <?php include 'navbar.html' ?>
    <br></br>
    <form method = "POST" class="ui form" style="max-width: 700px; margin:0 auto;" action="add_table_result.php">
        <table>
            <tr>
                <td>Table Number</td>
                <td><input type="number" name="table_num" id="table_num" name="table_num" required placeholder="Please Enter the Table Number"/> </td>
            </tr>
            <tr>
                <td>Table code </td>
                <td><input type="number" id="table_code" name = "table_code" placeholder="Please Enter the table code"></textarea></td>
            </tr>
            <tr>
                <td>Table type </td>
                <td>
                <select name="table_type" id="table_type">
                    <option value="Dine in">Dine in</option>
                    <option value="Take away">Take away</option>
                </select></td>
            </tr>
            <tr>
                <td> <br><button class="ui primary button" type="submit">Add Table</button><br></br></td>
            </tr>
        </table>
    </form>
     <!--Form to add list ends here-->
</body>
</html>
<?php
    session_start();
    $restaurant_id =$_SESSION['restaurant_id'];
    if(isset($_POST['submit']))
    {
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
          echo "data inserted";
      }
      else{
          echo "failed to insert";
      }
    }
?>

