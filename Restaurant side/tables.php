<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <!-- Font Awesome -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
	<title>View Reservation</title>
</head>
<body>

<?php include 'navbar.html' ?>

<br></br>

<?php
session_start();
    include_once('test.php');
	$restaurant_id = $_SESSION['restaurant_id'];
	header("Refresh:2");
	
  
?>

<table class='ui unstackable collapsing table' style='margin:0 auto;'> 
	<tr> 
		<th colspan="4"><h2>Table Status</h2></th> 
		</tr> 
			  <th> Table number</th> 
			  <th> Table id </th> 
			  <th> Table type </th> 
			  <th> Status </th>
			   
                   
		</tr> 
       
		
		<?php
            $sql = "SELECT * FROM tables WHERE restaurant_id = $restaurant_id";
            $rs = $conn-> query($sql); 
         while($rows=mysqli_fetch_array($rs)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['table_num']; ?></td> 
		<td><?php echo $rows['table_id'];?></td> 
		<td><?php echo $rows['table_type'];?></td> 
		<td><?php echo $rows['status'];?></td> 

        <td>	
			<form name="form" action="respond.php" method="post">
				<input type="hidden" name="table_id" value="<?php echo $rows['table_id'];?>">
				<input type="submit" name="respond" value="renspond">
			</form>
                
              </td>
            
		</tr>

		
        
		<?php } ?>
           

	</table> 
	<p style='text-align: center;'><br><a href=Add_table.php>
	<button class='ui primary button' style='margin 0 auto;'>
	             Add New table
			  </button></a></p>";

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>
</html>


