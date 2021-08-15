<?php
        //inspired by cartContent.php from thephynix application
        $result = mysqli_query($con,"SELECT * FROM team");
        // https://www.w3schools.com/Php/func_mysqli_fetch_all.asp
        $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);   
       
?>  