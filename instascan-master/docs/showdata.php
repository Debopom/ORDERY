<?php


include_once 'dbconnect.php';
$sql = "SELECT * FROM dbchecc;";



$rs = $conn-> query($sql);

while($data = mysqli_fetch_array($rs)){
    if($data[0] == 23232323){
          echo 'got it';
    }
     



}
?>











