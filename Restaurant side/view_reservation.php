<?php
session_start();
    include_once('test.php');
	$restaurant_id = $_SESSION['restaurant_id'];
  
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>View Reservation</title> 
		  <!-- Font Awesome -->
		  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
	</head> 
	<body> 
	<?php include 'navbar.html' ?>
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>View the reservations</h2></th> 
		</tr> 
			  <th> Date</th> 
			  <th> Time </th> 
			  <th> Number of People </th>
			  <th >Reservation status</th>  
			  <th >Assign Table no</th> 
                   
		</tr> 
       
		
		<?php
            $sql = "SELECT * FROM reservation WHERE restaurant_id = $restaurant_id";
            $rs = $conn-> query($sql); 
         while($rows=mysqli_fetch_array($rs)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['res_date']; ?></td> 
		<td><?php echo $rows['res_time']; ?></td> 
		<td><?php echo $rows['res_people']; ?></td> 
		<td><?php echo $rows['res_status']; ?></td> 

        <td>	
			<form name="form" action="reservation-confirm.php" method="post">
				<input type="hidden" name="res_id" value='<?php echo $rows['res_id']; ?>'>
				<input type="hidden" name="res_date" value='<?php echo $rows['res_date']; ?>'>
				<input type="hidden" name="restaurant_id" value='<?php echo $restaurant_id; ?>'>
				<input type="submit" name="submit" value="Take action">
			</form>
                
              </td>
            
		</tr> 
        
		<?php } ?>
           

	</table> 
	</body> 
	</html>



 