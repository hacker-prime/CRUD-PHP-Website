<?php

$sql = "SELECT * FROM aboutimage";
$result = mysqli_query($con,$sql);

if ($result){
    $rowcount = mysqli_num_rows($result);
      
      if($rowcount == 0){
          $fileName = "img/profilephotogif.gif";
      } else {
        //   $fileName = "testing";
          while($row = mysqli_fetch_array($result)){
//   It didn't run due to this line if(file_exists("img/" . $row['name'] ." ") ){ } which wrapped aroundthe code directly below this comment              
                $fileName = "img/" . $row['name'] ." ";
        }
      }
      
      
      
}
