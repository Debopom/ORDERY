

<body>
	
    <?php include 'navbar.html' ?>
        <br><br>
        
        <?php
    
        $id = $_GET["id"];
        $name = $_GET["name"];
    
    
        require_once('db_connect.php');
    
        $connect = mysqli_connect(HOST, USER, PASS, DB)
    
            or die("Can not connect");
    
    
        $sql = "DELETE FROM adds_on WHERE id=$id AND name = '$name'";
    
        mysqli_query($connect, $sql)
    
            or die("Can not execute query");
    
    
        // echo "<p style='text-align: center;'><br><a href=menu_read.php>
        // <button class='ui primary button' style='margin 0 auto;'>
        // View Full Menu
        // 			  </button></a></p>";
    
        ?>
    
    
    <div class="container">
      <!-- Content here -->
      <div class="card text-center">
            <div class="card-header"></div>
    
            <div class="card-body">
    
                <i id="laugh_icon" class="fas fa-laugh"></i>
                <h1 class="card-title">Successfully Deleted</h1>
    
                <a href="menu_read.php" class="btn btn-primary">VIEW RECORD</a>
            </div>
            <div class="card-footer text-muted"></div>
        </div>
    </div>
    
    
    
    </body>
    
    </html>