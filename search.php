<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php 
    include_once 'dbconnect.php';
    include 'navbar.html';
    session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $search = "\""."%".$_POST['search']."%"."\"";
    }

      $sql = "SELECT * FROM restaurant WHERE restaurant_name LIKE $search ;";


      $rs = $conn-> query($sql);?>
      <?php 
      if (mysqli_num_rows($rs) > 0) {?>
     
        <h2>Available Restaurants</h2>
        <main>
                <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        
    <?php
     
        
            
      while($data = mysqli_fetch_array($rs)){?>  

            <tr>
            
                        <div class="col">
                            <div class="card h-100 shadow-sm"> 
                                <img src=<?php echo $data['logo'] ?> class="card-img" alt="...">
                                <div class="card-body">
                                    <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-primary"><?php echo $data['restaurant_name']?></span> </div>
                                    <div class="text-center my-4"> <button class="btn-primary btn"><a href="Reservation.php?restaurant_id=<?php echo $data['restaurant_id']; ?>" class="text-white">Request Reservation</a> </button> </div>
                                    <div class="text-center my-4"> <button class="btn-primary btn"><a href="menu.php?restaurant_id=<?php echo $data['restaurant_id']; ?>" class="text-white">Show Menu</a> </button> </div>
                                </div>
                            </div>
                        </div>
                        


          
        <?php     
        

   }
}?>
                </div>
            </div>
        </main>
        <?php
   

        $sql1 = "SELECT * FROM menu as m JOIN restaurant as r ON(m.restaurant_id=r.restaurant_id) WHERE item_name LIKE $search";
        $rs1 = $conn-> query($sql1);
        
        if (mysqli_num_rows($rs1) > 0) {?>

                
            <h2>Available Food Items</h2>

            <main>
            <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
                <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        
                <?php
                while($data = mysqli_fetch_array($rs1)){?>  

                        <tr>
                        
                                    <div class="col">
                                        <div class="card h-100 shadow-sm"> 
                                            <img src="<?php echo "Restaurant side/".$data['image'] ?>" class="card-img" alt="...">
                                            <div class="card-body">
                                                <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-primary"><?php echo $data['item_name']?></span> </div>
                                                <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-primary"><?php echo $data['restaurant_name']?></span> </div>
                                                <div class="text-center my-4"> <button class="btn-primary btn"><a href="menu.php?restaurant_id=<?php echo $data['restaurant_id']; ?>" class="text-white">Order</a> </button> </div>
                                            </div>
                                        </div>
                                    </div>
                                    


                    
                    <?php     
                    

            }?>
                            </div>
                        </div>
                    </main>
                    <?php
        }
        
        ?>
  




                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
        }

</style>

</body>

</html>
