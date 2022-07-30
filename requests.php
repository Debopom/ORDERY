
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
rel="stylesheet"
/>
</head>
<body>
<?php include 'navbar.html'; ?>
<br><br>
<?php 
session_start();
include_once('dbconnect.php');
 $customer_id = $_SESSION['customer_id'];
 $sql = "SELECT * FROM share AS s WHERE s.customer_id =$customer_id";
 $rs = $conn-> query($sql); 

  ?> 
  <table align="center" border="1px" style="width:900px; line-height:40px;"> 
	<tr> 
		<th colspan="6"><h2>Invites</h2></th> 
		</tr> 
			  
                   
		</tr> 
        
       
		
		<?php
         while($rows=mysqli_fetch_array($rs)) 
		{ 
		?>
        <tr> 
		<td>Invite From :<?php echo $rows['invite_from']; ?></td> 
        <td><form action="restaurants.php" method = "post">
            <input type="hidden" name="qr" value = "<?php echo $rows['table_id']; ?>">
            <input type="hidden" name="invite_id" value = "<?php echo $rows['invite_id']; ?>">
            <input type="submit" value="accept" name="accept">
        </form></td>
        <td><form action="decline.php" method = "post">
            <input type="hidden" name="qr" value = "<?php echo $rows['table_id']; ?>">
            <input type="hidden" name="invite_id" value = "<?php echo $rows['invite_id']; ?>">
            <input type="submit" value="decline" name="decline">
        </form></td>
        </tr> 
        <?php
        }?>
    </table>
    <br><br><br>

</body>
</html>

