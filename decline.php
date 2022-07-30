<?php
$invite_id = $_POST['invite_id'];

include_once('dbconnect.php');
echo $invite_id;
 
 $sql = "DELETE FROM share WHERE invite_id = $invite_id";
 if(isset($_POST["decline"])){

    $rs = $conn-> query($sql); 
     if($rs){
        echo '<script>alert("invite has been declined"); window.location.replace("requests.php")</script>'; 
     }

 }
 




?>