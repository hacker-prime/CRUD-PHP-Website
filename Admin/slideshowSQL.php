<?php

include("includes/config.php");


function rowCount($con) {     
    
    $sql = "SELECT * FROM contractor_profile_photo";

    if ($result = mysqli_query($con,$sql)){
        // https://www.tutorialspoint.com/php/php_mysqli_num_rows.htm        
        $rowcount = mysqli_num_rows($result);

        echo $rowcount; 

     
    } else {
        echo "ABORT";
    }
}
rowCount($con); 

?>