<?php


include_once 'dbconnect.php';
$qr = $_GET['qr'];
$sql = "SELECT * FROM dbchecc;";

$rs = $conn-> query($sql);


while($data = mysqli_fetch_array($rs)){
    if($data[0] == $qr){
          echo 'got it';
          return;
    }
    
     



}
echo 'no match'
?>
