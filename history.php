<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'navbar.html';
    
    session_start();
    include_once('dbconnect.php');
    $customer_id = $_SESSION['customer_id']; ?>
    <br><br><br>
    <table align="center" border="1px" style="width:900px; line-height:40px;"> 
	<tr> 
		<th colspan="6"><h2>Past Orders</h2></th> 
		</tr> 
			  <th>Order ID </th> 
			  <th >Restaurant </th> 
              <th >Details </th> 
              <th >Price </th>
              <th >Order Type </th>
              <th >Order Status </th>
                   
		</tr> 
        
       
		
		<?php
            $sql = "SELECT * FROM orders AS o JOIN restaurant AS r ON(o.restaurant_id = r.restaurant_id) WHERE o.customer_id =  $customer_id";
            $rs = $conn-> query($sql); 
            
         while($rows=mysqli_fetch_array($rs)) 
		{ 
		?>
        <tr> 
		<td><?php echo $rows['order_id']; ?></td> 
		<td><?php echo $rows['restaurant_name']; ?></td> 
        <td><?php echo $rows['details']; ?></td> 
        <td><?php echo $rows['total_price']; ?></td> 
        <td><?php echo $rows['order_type']; ?></td> 
        <td><?php echo $rows['order_status']; ?></td> 
        <td><form action="order_track.php" method = "post">
            <input type="hidden" name="order_id" value = "<?php echo $rows['order_id']; ?>">
            <input type="submit" value="Track">
        </form>
        </tr>
        
        
    <?php
        }?>
    </table>
    <br><br><br>

    <table align="center" border="1px" style="width:900px; line-height:40px;"> 
	<tr> 
		<th colspan="6"><h2>Reservations</h2></th> 
		</tr> 
			  <th>ID</th> 
			  <th >Restaurant </th> 
              <th >Date </th> 
              <th >Time </th>
              <th >Status </th>
              <th >Assigned Table </th>
                   
		</tr> 
        
       <br><br><br>
		
		<?php
            $sql = "SELECT * FROM reservation AS re JOIN restaurant AS r ON(re.restaurant_id = r.restaurant_id)  WHERE re.customer_id =  $customer_id";
            $rs = $conn-> query($sql); 
            
         while($rows=mysqli_fetch_array($rs)) 
		{ 
		?>
        <tr> 
		<td><?php echo $rows['res_id']; ?></td> 
		<td><?php echo $rows['restaurant_name']; ?></td> 
        <td><?php echo $rows['res_date']; ?></td> 
        <td><?php echo $rows['res_time']; ?></td> 
        <td><?php echo $rows['res_status']; ?></td> 
        <td><?php echo $rows['res_table_no']; ?></td> 
        
            
        </tr>

    <?php
        }?>
    </table>

</body>
</html>