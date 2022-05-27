<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head><title>Statistics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

	</head>
<body>
<form form class="ui form" style="max-width: 700px; margin:0 auto;" action="availability.php" method="post">
<br></br>        
<h3 class="ui dividing header">Item Available or not</h3>        
        
<input type="text" name="description" required placeholder="Put Item id"><br><br>
            
            <input type ="submit" value="Submit" name="submit"><br><br>
            
        </form>
</body>
</html>

<?php
   
   if(isset($_POST['submit'])){
     
      $description=$_POST['description'];
      
      
	require_once('db_connect.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");

	$results = mysqli_query( $connect, "SELECT * FROM menu WHERE (AVAILABILITY  ='$description' or ITEM_NAME='$description')" )


		or die("Can not execute query");

	echo "<table class='ui unstackable collapsing table' style='margin:0 auto;'> \n";
    
	echo "<thead><tr><th>ITEM_ID</th>
          <th>ITEM_NAME</th>
          
          <th>PRICE</th>
          <th>AVAILABILITY</th></tr></thead> <tbody>\n";
		

	while( $rows = mysqli_fetch_array( $results ) ) {
		extract( $rows );
		echo "<tr>";
		echo "<td> $ITEM_ID </td>";
		echo "<td> $ITEM_NAME </td>";
		echo "<td> $PRICE </td>";
		echo "<td> $AVAILABILITY </td>";
		

		
		echo "</tr> \n";
	}

	echo "</tbody></table> \n";


   
   
    }
    echo "<p style='text-align: center;'><br><a href=menu_read.php>
	<button class='ui primary button' style='margin 0 auto;'>
	             Go Back to Menu
			  </button></a></p>";
   
   

?>

