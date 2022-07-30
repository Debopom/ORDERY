<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php 
    include 'navbar.html';
    include_once 'dbconnect.php';
    $email = $_POST["email"];
    $sql = "SELECT * FROM customer WHERE customer_email = '$email' ";
    $rs = $conn-> query($sql);
    $data = mysqli_fetch_array($rs);
    $rowcount=mysqli_num_rows($rs);
    session_start();
    $customer_name = $_SESSION["customer_name"];
    $table_id =  $_SESSION["table_id"];
    $customer_id = $data["customer_id"];
    if($rowcount==0){
        echo '<script>alert("Invalid email or user doesnot exist"); window.location.replace("instascan-master/docs")</script>'; 
    }
    else{
        $sql1 = "INSERT INTO `share` (`customer_id`, `email`, `table_id`, `invite_from`) VALUES ($customer_id, '$email', $table_id, '$customer_name');";
        $rs1 = $conn-> query($sql1);
        if($rs){
            echo '<script>alert("invite sent successfully"); window.location.replace("restaurants.php")</script>'; 
        }
    }
    
    ?>
    
</body>
</html>