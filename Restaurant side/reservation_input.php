<?php 
    include_once('test.php');
				  
                 $res_table_id = $_POST['table'];
                 echo $res_table_id;
                 $res_id = $_POST['res_id'];
                 if($res_table_id == "declined"){

                    $sql1 = "UPDATE reservation SET res_status='Declined' WHERE res_id= $res_id"; 
                    $rs1 = $conn-> query($sql1);
                    if($rs1){
                        echo '<script>alert("Reservation has been updated!"); window.location.replace("view_reservation.php")</script>'; 
                    }

                 }
                 else{
                     $sql1 = "UPDATE reservation SET res_table_no = $res_table_id,res_status='Accepted' WHERE res_id= $res_id"; 
                $rs1 = $conn-> query($sql1);      
                if($rs1){
                    echo '<script>alert("Reservation has been updated!"); window.location.replace("view_reservation.php")</script>'; 

                 }
                }
                
                
             
      
          ?>