<head>
    <title>Update Form</title>

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
    
    <?php include 'navbar.html';
   require_once('db_connect.php');
   $item_id = $_GET["id"];
   $connect = mysqli_connect(HOST, USER, PASS, DB)
       or die("Can not connect");


   $results = mysqli_query($connect, "SELECT * FROM adds_on WHERE id =$item_id")
       or die("Can not execute query");




   echo "<table class='ui unstackable collapsing table' style='margin:0 auto;'> \n";

   echo
   "<thead><tr><th>ID</th>
         <th>Name</th>
         <th>Price</th>

         <th>Delete</th> 
          </tr></thead> <tbody>\n";
         



   while ($rows = mysqli_fetch_array($results)) {
       extract($rows);
       echo "<tr>";
       echo "<td> $id </td>";
       echo "<td> $name</td>";
       echo "<td> $price </td>";

       echo "<td> <a href = 'delete_adds_on.php?id=$id&name=$name'>
                                                   Delete</a> </td>";
       echo "</tr> \n";
   }

   echo "</tbody></table> \n";

   echo "<p style='text-align: center;'><br><a href=add_adds_on.php?id=$item_id>
   <button class='ui primary button' style='margin 0 auto;'>
                Add New Item
             </button></a></p>";
            
             ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>

</html>