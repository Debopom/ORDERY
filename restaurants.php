<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Restaurants</title>
</head>
<body>
            
        <?php
        include 'navbar.html';

        session_start();

        include_once 'dbconnect.php';
        $qr = $_POST['qr'];
        $_SESSION["table_id"] = $qr;
        
        $sql = "SELECT r.restaurant_review,r.restaurant_name,t.restaurant_id,r.restaurant_current_status ,r.logo FROM restaurant AS r JOIN tables AS t ON t.restaurant_id = r.restaurant_id WHERE t.table_id = $qr ";


        $rs = $conn-> query($sql);?>
        <main>
            <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
                <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        
        <?php

        while($data = mysqli_fetch_array($rs)){
            

            
            
            
            
            if($data['restaurant_current_status'] == 'open'){?>
                <tr>
                
                            <div class="col">
                                <div class="card h-100 shadow-sm"> <img src=<?php echo $data['logo'] ?> class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-primary"><?php echo $data['restaurant_name']?></span> </div>
                                        <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-primary"><?php echo $data['restaurant_review']?>/5</span> </div>
                                        <div class="text-center my-4"> <button class="btn-primary btn"><a href="menu.php?restaurant_id=<?php echo $data['restaurant_id']; ?>" class="text-white">Order</a> </button> </div>
                                    </div>
                                </div>
                            </div>


              
            <?php     
            }
            
            ?>
            
            
            <?php



        }


        ?>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>
<style>    
.card-img
{
  width:100%;
  height:80%;
  background-color:#eee;
}
h2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }</style>
    

    

