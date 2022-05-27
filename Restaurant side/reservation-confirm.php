<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $res_id = $_POST['res_id'];
    $res_date = $_POST['res_date'];
    $restaurant_id = $_POST['restaurant_id'];
    echo $res_id.$res_date.$restaurant_id;
    include 'navbar.html';
    include_once 'dbconnect.php'
    ?>
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>Reservations on <?php echo $res_date?></h2></th> 
		</tr> 
			  <th>Time </th> 
			  <th >Status </th> 
              <th >Assign Table no </th> 
                   
		</tr> 
       
		
		<?php
            $sql = "SELECT * FROM reservation WHERE restaurant_id = $restaurant_id AND res_date = '$res_date'";
            $rs = $conn-> query($sql); 
         while($rows=mysqli_fetch_array($rs)) 
		{ 
		?> 
		<td><?php echo $rows['res_time']; ?></td> 
		<td><?php echo $rows['res_status']; ?></td> 
        <td><?php echo $rows['res_table_no']; ?></td> 
            
		</tr> 
        
    <?php
        }?>
        </table>
        <br><br><br>
        <?php
        $sql1 = "SELECT * FROM tables WHERE restaurant_id = $restaurant_id";
            $rs1 = $conn-> query($sql1);
    ?>
    <table align="center"  style="width:600px; line-height:40px;"> 
    <th>
    <h2>For this reservation please assign a table</h2>
    <form name = "confirm" action="reservation_input.php" method="post">
            <input type="hidden" name="res_id" value="<?php echo $res_id?>">
            
            <select name="table">
            <option value="declined">Decline</option>
                <?php 
                    
                    while ($row2 = mysqli_fetch_array(
                            $rs1,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $row2['table_num'];
        
                    ?>">
                        <?php echo $row2['table_num'];
                        ?>
                    </option>
                <?php 
                    endwhile; 
                ?>
            </select>
        <input type="submit" name = "submit" value="Submit">
     </th>

    
    
</body>
</html>